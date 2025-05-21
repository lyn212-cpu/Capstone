<?php
include 'db_connect.php';

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $pdo->prepare("DELETE FROM TrainingCenter_Admin WHERE id = ?");
    $stmt->execute([$id]);
    exit;
}

// Fetch all records
$stmt = $pdo->query("SELECT * FROM TrainingCenter_Admin ORDER BY created_at DESC");
$centers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
