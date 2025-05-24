<?php
// admin_display_files.php
include 'db_connect.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    http_response_code(403);
    echo json_encode(["error" => "Access denied."]);
    exit;
}

$course_id = intval($_GET['course_id'] ?? 0);
if (!$course_id) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid course ID."]);
    exit;
}

$stmt = $conn->prepare("SELECT id, file_name, file_path, uploaded_by, uploaded_at FROM Course_Requirement_Files WHERE course_id = ? ORDER BY uploaded_at DESC");
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

$files = [];
while ($row = $result->fetch_assoc()) {
    $files[] = $row;
}

header('Content-Type: application/json');
echo json_encode($files);
