<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("DELETE FROM Feedback WHERE feedback_id = ?");
    $stmt->bind_param("i", $feedback_id);

    $feedback_id = $_POST['feedback_id'];

    $stmt->execute();
    echo "Feedback deleted.";
    $stmt->close();
}
?>
