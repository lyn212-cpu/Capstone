<?php
include '../Backend/connect.php'; // adjust based on your actual connection file

$query = "
    SELECT 
        feedback.feedback_id, 
        users.full_name, 
        users.course, 
        feedback.feedback 
    FROM 
        feedback 
    INNER JOIN users ON feedback.user_id = users.user_id
    WHERE feedback.status = 'approved'
    ORDER BY feedback.created_at DESC
    LIMIT 3
";

$result = mysqli_query($conn, $query);
$feedbacks = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $feedbacks[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($feedbacks);
