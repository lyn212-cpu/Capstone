<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $center_id = $_POST['center_id'];

    $stmt = $conn->prepare("DELETE FROM Training_Center WHERE center_id = ?");
    $stmt->bind_param("i", $center_id);

    if ($stmt->execute()) {
        echo "Training center deleted.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
