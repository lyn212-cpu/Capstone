<?php
require_once 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $full_name = $_POST['full_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];

    $stmt = $conn->prepare("UPDATE Users SET full_name=?, course=?, year_level=? WHERE email=? AND role='Student'");
    $stmt->bind_param("ssss", $full_name, $course, $year_level, $email);

    echo $stmt->execute() ? "Profile updated." : "Error: " . $stmt->error;

    $stmt->close();
    $conn->close();
}
?>
