<?php
require 'db_connect.php';

$stmt = $pdo->query("SELECT * FROM TrainingCenter_Admin ORDER BY created_at DESC");
$centers = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($centers as &$center) {
    $center['requirements'] = json_decode($center['requirements'], true);
    $center['available_courses'] = json_decode($center['available_courses'], true);
}

echo json_encode($centers);
?>
