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

// Handle multiple requirements
$requirements = $_POST['requirements'] ?? [];
if (in_array('other', $requirements) && !empty($_POST['otherRequirement'])) {
    $requirements[] = $_POST['otherRequirement'];
}
$requirements = array_filter($requirements, fn($r) => $r !== 'other');
$requirements_str = implode(', ', $requirements);

// Insert into database with status = pending
$sql = "INSERT INTO nc_course 
    (course_name, training_center_name, department, duration, slots_available, blockLot, street, subdivision, barangay, city, province, zipCode, contact_info, course_description, requirements, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending')";

// Fetch contact info from the database for the training center
$center_contact = '';
$center_stmt = $conn->prepare("SELECT contact_info FROM nc_course WHERE training_center_name = ?");
$center_stmt->bind_param("s", $training_center_name);
$center_stmt->execute();
$center_stmt->bind_result($db_contact_info);
if ($center_stmt->fetch()) {
    $center_contact = $db_contact_info;
}
$center_stmt->close();

// Combine email from form with any existing contact info (if needed)
$form_email = $_POST['email'] ?? '';
$contact_info = trim($form_email);

// Fetch and handle multiple departments
$department = $_POST['department'] ?? [];
$department_str = is_array($department) ? implode(', ', $department) : $department;

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssssssssssss",
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
    $contact_info, // now just the email
    $course_description,
    $requirements_str
);

if ($stmt->execute()) {
    header("Location: Courses.php?message=Post+submitted+for+approval");
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?>


