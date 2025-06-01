<?php
require_once '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    $stmt = $conn->prepare("DELETE FROM Users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);

    echo $stmt->execute() ? "User deleted." : "Error: " . $stmt->error;
    $stmt->close();
    $conn->close();
}
