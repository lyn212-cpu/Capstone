<?php
require 'db_connect.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Prepare and execute delete statement
        $stmt = $pdo->prepare("DELETE FROM Feedback_Admin WHERE id = ?");
        
        if ($stmt->execute([$id])) {
            echo "Feedback with ID $id deleted successfully.";
        } else {
            echo "Error deleting feedback.";
        }
    } else {
        echo "Missing feedback ID.";
    }
} else {
    echo "Invalid request method.";
}
?>
