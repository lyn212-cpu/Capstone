<?php
include '../../Backend/connect.php'; // your database connection file

// Fetch form inputs
$course_name = $_POST['courseName'];
$training_center_name = $_POST['centerName'];
$duration = $_POST['duration'];
$location = $_POST['location'];
$contact_info = $_POST['contactNumber'] . " / " . $_POST['email'];
$slots_available = $_POST['slotAvailability'];
$course_description = $_POST['courseDescription'];

// Handle multiple requirements
$requirements = $_POST['requirements'] ?? [];
if (in_array('other', $requirements)) {
    $requirements[] = $_POST['otherRequirement']; // Add custom input
}
$requirements_str = implode(', ', $requirements);

// Insert into database with status = pending
$sql = "INSERT INTO nc_course 
        (course_name, training_center_name, duration, slots_available, location, contact_info, course_description, requirements, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending')";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssssss",
    $course_name,
    $training_center_name,
    $duration,
    $slots_available,
    $location,
    $contact_info,
    $course_description,
    $requirements_str
);

if ($stmt->execute()) {
    header("Location: Courses.php?message=Post+submitted+for+approval");
} else {
    echo "Error: " . $stmt->error;
}
