<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $center_id = $_POST['center_id'];
    $center_name = $_POST['center_name'];
    $location = $_POST['location'];
    $contact_info = $_POST['contact_info'];
    $requirements = $_POST['requirements'];
    $operation_hours = $_POST['operation_hours'];
    $available_courses = $_POST['available_courses'];
    $student_slot = $_POST['student_slot'];

    $stmt = $conn->prepare("UPDATE Training_Center SET center_name=?, location=?, contact_info=?, requirements=?, operation_hours=?, available_courses=?, student_slot=? WHERE center_id=?");
    $stmt->bind_param("ssssssii", $center_name, $location, $contact_info, $requirements, $operation_hours, $available_courses, $student_slot, $center_id);

    if ($stmt->execute()) {
        echo "Training center updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
