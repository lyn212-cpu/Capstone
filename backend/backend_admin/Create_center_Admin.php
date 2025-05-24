<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['training_center_name'];
    $location = $_POST['location'];
    $contactNumber = $_POST['contact_number'];
    $contactEmail = $_POST['contact_email'];
    $operationHours = $_POST['operation_hours'];
    $studentSlot = $_POST['student_slot'];

    $requirements = json_encode($_POST['requirements']);
    $availableCourses = json_encode($_POST['available_courses']);

    $stmt = $pdo->prepare("INSERT INTO TrainingCenter_Admin 
        (training_center_name, location, contact_number, contact_email, requirements, operation_hours, available_courses, student_slot) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([$name, $location, $contactNumber, $contactEmail, $requirements, $operationHours, $availableCourses, $studentSlot]);

    echo "Training Center created successfully.";
}
?>
