<?php
require_once '../connect.php';
session_start();
$email = $_SESSION['email'];

$stmt = $conn->prepare("SELECT * FROM Users WHERE email = ? AND role IN ('Admin', 'Administrator')");
$stmt->bind_param("s", $email);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

echo json_encode($data);
$stmt->close();
$conn->close();
?>
