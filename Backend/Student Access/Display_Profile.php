<?php
require_once 'connect.php';

session_start();
$email = $_SESSION['email']; // Assuming login stores this

$stmt = $conn->prepare("SELECT * FROM Users WHERE email = ? AND role = 'Student'");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode($data);

$stmt->close();
$conn->close();
?>
