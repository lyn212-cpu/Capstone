<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $requirement_name = $_POST['requirement_name'];
    $is_custom = isset($_POST['is_custom']) ? 1 : 0;

    $stmt = $conn->prepare("INSERT INTO NC_Requirements (requirement_name, is_custom) VALUES (?, ?)");
    $stmt->bind_param("si", $requirement_name, $is_custom);

    if ($stmt->execute()) {
        echo "Requirement type added.";
    } else {
        echo "Failed: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
