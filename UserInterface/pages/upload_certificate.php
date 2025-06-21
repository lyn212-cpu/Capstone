<?php
session_start();
include '../../Backend/connect.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];
$certificate_name = $_POST['certificate_name'] ?? '';

// Validate file upload
if (isset($_FILES['certificate_file']) && $_FILES['certificate_file']['error'] === 0) {
    $file_tmp  = $_FILES['certificate_file']['tmp_name'];
    $file_name = basename($_FILES['certificate_file']['name']);
    $file_size = $_FILES['certificate_file']['size'];
    $upload_dir = '../../uploads/certificates/';
    $max_size = 2 * 1024 * 1024; // 2MB max

    // MIME check (strict PDF)
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime  = finfo_file($finfo, $file_tmp);
    finfo_close($finfo);

    if ($mime !== 'application/pdf') {
        die("Error: Only PDF files are allowed.");
    }

    // Size check
    if ($file_size > $max_size) {
        die("Error: File size exceeds 2MB.");
    }

    // Create folder if needed
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Unique file name
    $new_name = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $file_name);
    $target_path = $upload_dir . $new_name;

    if (move_uploaded_file($file_tmp, $target_path)) {
        $relative_path = str_replace('../../', '', $target_path);

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO certificates (user_id, certificate_name, file_path, status, upload_date) VALUES (?, ?, ?, 'pending', NOW())");
        $stmt->bind_param("iss", $user_id, $certificate_name, $relative_path);

        if ($stmt->execute()) {
            header("Location: viewCertificates.php?upload=success");
            exit();
        } else {
            echo "Database error: " . $stmt->error;
        }
    } else {
        echo "File upload failed.";
    }
} else {
    echo "Invalid file upload.";
}
