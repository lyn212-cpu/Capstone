<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $course_id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM NC_Course WHERE course_id = ?");
    $stmt->bind_param("i", $course_id);

    if ($stmt->execute()) {
        echo "Course deleted successfully.";
    } else {
        echo "Failed to delete course.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
