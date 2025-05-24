<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['student_email'];
    $requirement_ids = $_POST['requirement_ids']; // array of selected requirement_id(s)

    // Delete old entries
    $stmt = $conn->prepare("DELETE FROM Student_Requirements WHERE student_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    // Insert new entries
    $stmt = $conn->prepare("INSERT INTO Student_Requirements (student_email, requirement_id) VALUES (?, ?)");
    foreach ($requirement_ids as $rid) {
        $stmt->bind_param("si", $email, $rid);
        $stmt->execute();
    }
    $stmt->close();

    echo "Requirements updated.";
}
$conn->close();
?>
