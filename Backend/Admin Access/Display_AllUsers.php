<?php
require_once 'connect.php';

$result = $conn->query("SELECT * FROM Users");
$users = [];

while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);
$conn->close();
?>
