<?php
include '../Backend/connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback_id = $_POST['feedback_id'] ?? '';
    if (!$feedback_id) {
        echo json_encode(['success' => false, 'message' => 'Missing feedback ID.']);
        exit;
    }
    $stmt = $conn->prepare("DELETE FROM feedback WHERE feedback_id = ?");
    $stmt->bind_param("i", $feedback_id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Feedback deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Delete failed.']);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}