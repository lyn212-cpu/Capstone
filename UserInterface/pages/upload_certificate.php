<?php
session_start();
include '../../Backend/connect.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];
$certificate_name = $_POST['certificate_name'] ?? '';

if (isset($_FILES['certificate_file']) && $_FILES['certificate_file']['error'] === 0) {
    $file_tmp = $_FILES['certificate_file']['tmp_name'];
    $file_name = basename($_FILES['certificate_file']['name']);
    $upload_dir = '../../uploads/certificates/';
    $target_path = $upload_dir . time() . '_' . $file_name;

    // Ensure the upload directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move file and insert to DB
    if (move_uploaded_file($file_tmp, $target_path)) {
        $relative_path = str_replace('../../', '', $target_path);
        $stmt = $conn->prepare("INSERT INTO certificates (user_id, certificate_name, file_path) VALUES (?, ?, ?)");
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
    echo "Invalid file.";
}
