<?php
require_once 'connect.php';
session_start();

$email = $_SESSION['email'];

$stmt = $conn->prepare("DELETE FROM Users WHERE email = ? AND role = 'Student'");
$stmt->bind_param("s", $email);
echo $stmt->execute() ? "Student profile deleted." : "Error: " . $stmt->error;

$stmt->close();
$conn->close();
?>
