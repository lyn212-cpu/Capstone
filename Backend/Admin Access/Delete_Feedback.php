<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM Feedback WHERE feedback_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Feedback deleted successfully.";
    } else {
        echo "Error deleting feedback.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
