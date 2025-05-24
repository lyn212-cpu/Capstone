<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $course_id = $_POST['course_id'];
    $feedback = $_POST['feedback'];

    $stmt = $conn->prepare("INSERT INTO Feedback (username, course_id, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $username, $course_id, $feedback);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error submitting feedback.";
    }

    $stmt->close();
}

$conn->close();
?>
