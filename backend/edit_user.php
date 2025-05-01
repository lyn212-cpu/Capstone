<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE Sign_up SET first_name=?, last_name=?, contact_number=? WHERE username=?");
    $stmt->bind_param("ssss", $first_name, $last_name, $contact_number, $username);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $username = $_POST['username'];

    $stmt->execute();
    echo "Record updated successfully";
    $stmt->close();
}
?>
