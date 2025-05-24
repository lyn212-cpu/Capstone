<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $stmt = $pdo->prepare("DELETE FROM TrainingCenter_Admin WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    echo "Training Center deleted successfully.";
}
?>
