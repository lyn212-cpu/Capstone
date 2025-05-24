<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback_id = $_POST['feedback_id'];
    $username = $_POST['username']; // Must match original submitter
    $feedback = $_POST['feedback'];

    // Only allow update if username matches
    $stmt = $conn->prepare("UPDATE Feedback SET feedback = ? WHERE feedback_id = ? AND username = ?");
    $stmt->bind_param("sis", $feedback, $feedback_id, $username);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "Feedback updated successfully.";
    } else {
        echo "Update failed. Ensure you are the owner of the feedback.";
    }

    $stmt->close();
}

$conn->close();
?>
