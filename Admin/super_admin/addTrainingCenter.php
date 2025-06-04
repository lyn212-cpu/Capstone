<?php
include '../../Backend/connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $center_name = $_POST['center_name'] ?? '';
    $location = $_POST['location'] ?? '';
    $contact_info = $_POST['contact_info'] ?? '';
    $requirements = $_POST['requirements'] ?? '';
    $operation_hours = $_POST['operation_hours'] ?? '';
    $available_courses = $_POST['available_courses'] ?? '';
    $student_slot = $_POST['student_slot'] ?? '';

    $stmt = $conn->prepare("INSERT INTO training_center (center_name, location, contact_info, requirements, operation_hours, available_courses, student_slot) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $center_name, $location, $contact_info, $requirements, $operation_hours, $available_courses, $student_slot);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Training center added successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add training center.']);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}