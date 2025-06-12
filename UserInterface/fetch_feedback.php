<?php
include '../Backend/connect.php';

// Subquery gets the latest feedback per user
$query = "
SELECT f1.feedback, f1.created_at, u.full_name
FROM feedback f1
JOIN (
    SELECT school_number, MAX(created_at) AS latest
    FROM feedback
    GROUP BY school_number
) f2 ON f1.school_number = f2.school_number AND f1.created_at = f2.latest
JOIN users u ON f1.school_number = u.school_number
ORDER BY RAND()
LIMIT 3
";

$result = $conn->query($query);
$feedbacks = [];

while ($row = $result->fetch_assoc()) {
    $feedbacks[] = $row;
}

echo json_encode($feedbacks);
