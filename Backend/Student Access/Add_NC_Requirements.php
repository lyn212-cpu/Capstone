<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['student_email'];
    $requirement_id = $_POST['requirement_id']; // expected to be an existing ID from NC_Requirements

    $stmt = $conn->prepare("INSERT INTO Student_Requirements (student_email, requirement_id) VALUES (?, ?)");
    $stmt->bind_param("si", $email, $requirement_id);

    if ($stmt->execute()) {
        echo "Requirement submitted.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
