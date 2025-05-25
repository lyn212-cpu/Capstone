<?php
require_once 'connect.php';
session_start();
$email = $_SESSION['email'];

$stmt = $conn->prepare("DELETE FROM Users WHERE email = ? AND role IN ('Admin', 'Administrator')");
$stmt->bind_param("s", $email);
echo $stmt->execute() ? "Admin profile deleted." : "Error: " . $stmt->error;

$stmt->close();
$conn->close();
?>
