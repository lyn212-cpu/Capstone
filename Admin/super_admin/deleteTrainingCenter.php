<?php
include '../../Backend/connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $center_id = $_POST['center_id'] ?? '';

    if (!$center_id) {
        echo json_encode(['success' => false, 'message' => 'Missing center ID.']);
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM training_center WHERE center_id = ?");
    $stmt->bind_param("i", $center_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Training center deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Delete failed.']);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>