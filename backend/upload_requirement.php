<?php
// user_upload_file.php
include 'db_connect.php';
session_start();

if ($_SESSION['role'] !== 'user') {
    http_response_code(403);
    echo json_encode(["error" => "Access denied."]);
    exit;
}

$course_id = intval($_POST['course_id'] ?? 0);
if (!$course_id || !isset($_FILES['file'])) {
    http_response_code(400);
    echo json_encode(["error" => "Missing course ID or file."]);
    exit;
}

$upload_dir = __DIR__ . '/uploads/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

$file = $_FILES['file'];
if ($file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(500);
    echo json_encode(["error" => "Upload error: " . $file['error']]);
    exit;
}

// Optional: Validate file type/size
$original_name = basename($file['name']);
$sanitized_name = preg_replace("/[^a-zA-Z0-9_\.-]/", "_", $original_name);
$unique_name = uniqid() . "_" . $sanitized_name;
$target_path = $upload_dir . $unique_name;
$relative_path = 'uploads/' . $unique_name;

if (!move_uploaded_file($file['tmp_name'], $target_path)) {
    http_response_code(500);
    echo json_encode(["error" => "Failed to move uploaded file."]);
    exit;
}

// Save to DB
$stmt = $conn->prepare("INSERT INTO Course_Requirement_Files (course_id, file_name, file_path, uploaded_by) VALUES (?, ?, ?, 'user')");
$stmt->bind_param("iss", $course_id, $original_name, $relative_path);
$stmt->execute();

echo json_encode(["success" => true, "file_name" => $original_name]);
