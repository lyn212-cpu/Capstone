<?php
// user_delete_file.php
include 'db_connect.php';
session_start();

if ($_SESSION['role'] !== 'student') {
    http_response_code(403);
    echo json_encode(["error" => "Access denied."]);
    exit;
}

$file_id = intval($_POST['file_id'] ?? 0);
if (!$file_id) {
    http_response_code(400);
    echo json_encode(["error" => "Missing file ID."]);
    exit;
}

// Confirm file belongs to user
$stmt = $conn->prepare("SELECT file_path FROM Course_Requirement_Files WHERE id = ? AND uploaded_by = 'user'");
$stmt->bind_param("i", $file_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $filepath = __DIR__ . '/' . $row['file_path'];
    $stmt = $conn->prepare("DELETE FROM Course_Requirement_Files WHERE id = ?");
    $stmt->bind_param("i", $file_id);
    $stmt->execute();

    if (file_exists($filepath)) {
        unlink($filepath);
    }

    echo json_encode(["success" => true]);
} else {
    http_response_code(404);
    echo json_encode(["error" => "File not found or not allowed."]);
}
