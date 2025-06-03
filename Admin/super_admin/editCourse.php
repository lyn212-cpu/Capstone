<?php
include '../../Backend/connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data (sanitize as needed)
    $course_id = $_POST['course_id'] ?? null;
    $course_name = $_POST['course_name'] ?? '';
    $training_center_name = $_POST['training_center_name'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $slots_available = $_POST['slots_available'] ?? '';
    $location = $_POST['location'] ?? '';
    $contact_info = $_POST['contact_info'] ?? '';
    $course_description = $_POST['course_description'] ?? '';
    $requirements = $_POST['requirements'] ?? '';

    // Validate course_id
    if (!$course_id) {
        echo json_encode(['success' => false, 'message' => 'Missing course ID.']);
        exit;
    }

    // Prepare and execute update
    $stmt = $conn->prepare("UPDATE nc_course SET course_name=?, training_center_name=?, duration=?, slots_available=?, location=?, contact_info=?, course_description=?, requirements=? WHERE course_id=?");
    $stmt->bind_param("ssssssssi", $course_name, $training_center_name, $duration, $slots_available, $location, $contact_info, $course_description, $requirements, $course_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Course updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update course.']);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
