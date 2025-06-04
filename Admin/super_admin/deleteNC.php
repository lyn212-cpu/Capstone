<?php
include '../../Backend/connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $certificate_id = $_POST['certificate_id'] ?? '';
    if (!$certificate_id) {
        echo json_encode(['success' => false, 'message' => 'Missing certificate ID.']);
        exit;
    }
    $stmt = $conn->prepare("DELETE FROM nc_certificate WHERE certificate_id = ?");
    $stmt->bind_param("i", $certificate_id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Certificate deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Delete failed.']);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}