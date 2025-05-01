<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO Sign_up (username, password, contact_number, first_name, last_name, mid_name, extension_name, address, birth_date, gender, student_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $username, $password, $contact_number, $first_name, $last_name, $mid_name, $extension_name, $address, $birth_date, $gender, $student_number);

    // Get values
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashed password
    $contact_number = $_POST['contact_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mid_name = $_POST['mid_name'];
    $extension_name = $_POST['extension_name'];
    $address = $_POST['address'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $student_number = $_POST['student_number'];

    $stmt->execute();
    echo "New record created successfully";
    $stmt->close();
}
?>
