<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $school_number = $_POST['school_number'];
    $full_name = $_POST['full_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO Users (school_number, full_name, course, year_level, email, password, role) VALUES (?, ?, ?, ?, ?, ?, 'Student')");
    $stmt->bind_param("ssssss", $school_number, $full_name, $course, $year_level, $email, $password);

    echo $stmt->execute() ? "Student registered." : "Error: " . $stmt->error;

    $stmt->close();
    $conn->close();
}
?>
