<?php
require 'db_connect.php'; // Ensure this file sets up $pdo as your PDO connection

try {
    $stmt = $pdo->query("
        SELECT 
            f.id, 
            u.name AS user_name, 
            c.title AS course_title, 
            f.feedback, 
            f.created_at
        FROM Feedback_Admin f
        LEFT JOIN Users u ON f.user_id = u.id
        LEFT JOIN Courses c ON f.course_id = c.id
        ORDER BY f.created_at DESC
    ");
    
    $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching feedback: " . $e->getMessage());
}
?>
