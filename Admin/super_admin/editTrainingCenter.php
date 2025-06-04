<?php
include '../../Backend/connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $center_id = $_POST['center_id'] ?? '';
    $center_name = $_POST['center_name'] ?? '';
    $location = $_POST['location'] ?? '';
    $contact_info = $_POST['contact_info'] ?? '';
    $requirements = $_POST['requirements'] ?? '';
    $operation_hours = $_POST['operation_hours'] ?? '';
    $available_courses = $_POST['available_courses'] ?? '';
    $student_slot = $_POST['student_slot'] ?? '';

    if (!$center_id) {
        echo json_encode(['success' => false, 'message' => 'Missing center ID.']);
        exit;
    }

    $stmt = $conn->prepare("UPDATE training_center SET center_name=?, location=?, contact_info=?, requirements=?, operation_hours=?, available_courses=?, student_slot=? WHERE center_id=?");
    $stmt->bind_param("ssssssii", $center_name, $location, $contact_info, $requirements, $operation_hours, $available_courses, $student_slot, $center_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Training center updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Update failed.']);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>