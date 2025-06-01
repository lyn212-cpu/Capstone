<?php
require_once '../connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $center_name = $_POST['center_name'];
    $location = $_POST['location'];
    $contact_info = $_POST['contact_info'];
    $requirements = $_POST['requirements'];
    $operation_hours = $_POST['operation_hours'];
    $available_courses = $_POST['available_courses'];
    $student_slot = $_POST['student_slot'];

    $stmt = $conn->prepare("INSERT INTO Training_Center (center_name, location, contact_info, requirements, operation_hours, available_courses, student_slot) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $center_name, $location, $contact_info, $requirements, $operation_hours, $available_courses, $student_slot);

    if ($stmt->execute()) {
        echo "Training center created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
