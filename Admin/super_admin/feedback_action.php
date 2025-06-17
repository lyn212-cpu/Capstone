<?php
session_start();
include '../../Backend/connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $feedback_id = $_POST['feedback_id'];
    $action = $_POST['action'];

    if (in_array($action, ['approve', 'disapprove'])) {
        $status = $action === 'approve' ? 'approved' : 'disapproved';
        $update = "UPDATE feedback SET status = '$status' WHERE feedback_id = $feedback_id";
        mysqli_query($conn, $update);
    }
}

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
