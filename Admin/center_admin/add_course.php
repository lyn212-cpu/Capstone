<?php
include '../../Backend/connect.php';

// Fetch form inputs safely
$course_name = $_POST['courseName'] ?? '';
$training_center_name = $_POST['centerName'] ?? '';
$duration = $_POST['duration'] ?? '';
$blockLot = $_POST['blockLot'] ?? '';
$street = $_POST['street'] ?? '';
$subdivision = $_POST['subdivision'] ?? '';
$barangay = $_POST['barangay'] ?? '';
$city = $_POST['city'] ?? '';
$province = $_POST['province'] ?? '';
$zipCode = $_POST['zipCode'] ?? '';
$slots_available = $_POST['slotAvailability'] ?? '';
$course_description = $_POST['courseDescription'] ?? '';
$start_date = $_POST['start_date'] ?? '';
$end_date = $_POST['end_date'] ?? '';

// Handle multiple requirements
$requirements = $_POST['requirements'] ?? [];
if (in_array('other', $requirements) && !empty($_POST['otherRequirement'])) {
    $requirements[] = $_POST['otherRequirement'];
}
$requirements = array_filter($requirements, fn($r) => $r !== 'other');
$requirements_str = implode(', ', $requirements);

// Handle multiple departments
$departments = $_POST['department'] ?? [];
$department_str = is_array($departments) ? implode(', ', $departments) : $departments;

// Combine email from form
$form_email = $_POST['email'] ?? '';
$contact_info = trim($form_email);

// Insert into database with status = pending, including start_date and end_date
$sql = "INSERT INTO nc_course 
    (course_name, training_center_name, department, duration, slots_available, blockLot, street, subdivision, barangay, city, province, zipCode, contact_info, course_description, requirements, status, start_date, end_date)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssssssssssssss",
    $course_name,
    $training_center_name,
    $department_str,
    $duration,
    $slots_available,
    $blockLot,
    $street,
    $subdivision,
    $barangay,
    $city,
    $province,
    $zipCode,
    $contact_info,
    $course_description,
    $requirements_str,
    $start_date,
    $end_date
);

if ($stmt->execute()) {
    header("Location: Courses.php?message=Post+submitted+for+approval");
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?>


