<?php
include '../Backend/connect.php'; // your DB connection

$query = "
SELECT f.feedback, f.created_at, u.full_name
FROM feedback f
JOIN users u ON f.school_number = u.school_number
ORDER BY f.created_at DESC
LIMIT 3
";

$result = $conn->query($query);
$feedbacks = [];

while ($row = $result->fetch_assoc()) {
    $feedbacks[] = $row;
}

echo json_encode($feedbacks);
