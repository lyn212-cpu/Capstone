<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $training_center_name = $_POST['training_center_name'];
    $duration = $_POST['duration'];
    $slots_available = $_POST['slots_available'];
    $location = $_POST['location'];
    $contact_info = $_POST['contact_info'];
    $course_description = $_POST['course_description'];
    $requirements = $_POST['requirements'];

    $stmt = $conn->prepare("UPDATE NC_Course SET 
        course_name=?, training_center_name=?, duration=?, slots_available=?, location=?, contact_info=?, course_description=?, requirements=? 
        WHERE course_id=?");
    $stmt->bind_param("sssissssi", $course_name, $training_center_name, $duration, $slots_available, $location, $contact_info, $course_description, $requirements, $course_id);

    if ($stmt->execute()) {
        echo "Course updated successfully.";
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
