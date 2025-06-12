<?php
include '../Backend/connect.php';

$school_number = $_POST['school_number'];
$feedback_text = $_POST['feedback'];

// Check if user already submitted feedback
$check = $conn->prepare("SELECT * FROM feedback WHERE school_number = ?");
$check->bind_param("s", $school_number);
$check->execute();
$result = $check->get_result();

if ($result->num_rows === 0) {
    $insert = $conn->prepare("INSERT INTO feedback (school_number, feedback, created_at) VALUES (?, ?, NOW())");
    $insert->bind_param("ss", $school_number, $feedback_text);
    $insert->execute();
    echo "Feedback submitted!";
} else {
    echo "You've already submitted feedback. Thank you!";
}
