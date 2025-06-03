<?php
include '../../Backend/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    $stmt = $conn->prepare("DELETE FROM nc_course WHERE course_id = ?");
    $stmt->bind_param("i", $course_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Course deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete course.']);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
