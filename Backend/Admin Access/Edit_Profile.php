<?php
require_once 'connect.php';
session_start();
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_email = $_POST['new_email'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE Users SET email=?, role=? WHERE email=? AND role IN ('Admin', 'Administrator')");
    $stmt->bind_param("sss", $new_email, $role, $email);

    echo $stmt->execute() ? "Profile updated." : "Error: " . $stmt->error;
    $stmt->close();
    $conn->close();
}
?>
