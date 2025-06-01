<?php
require_once '../connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $course_name = $_POST['course_name'];
    $training_center_name = $_POST['training_center_name'];
    $duration = $_POST['duration'];
    $slots_available = $_POST['slots_available'];
    $location = $_POST['location'];
    $contact_info = $_POST['contact_info'];
    $course_description = $_POST['course_description'];
    $requirements = $_POST['requirements'];

    $stmt = $conn->prepare("INSERT INTO NC_Course 
        (course_name, training_center_name, duration, slots_available, location, contact_info, course_description, requirements) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissss", $course_name, $training_center_name, $duration, $slots_available, $location, $contact_info, $course_description, $requirements);

    if ($stmt->execute()) {
        echo "Course created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
