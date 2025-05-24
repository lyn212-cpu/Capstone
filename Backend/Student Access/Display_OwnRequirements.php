<?php
require_once 'connect.php';

$email = $_GET['email'] ?? '';

if (empty($email)) {
    echo "No email provided.";
    exit;
}

$stmt = $conn->prepare("SELECT nr.requirement_name, nr.is_custom, sr.submission_date
                        FROM Student_Requirements sr
                        JOIN NC_Requirements nr ON sr.requirement_id = nr.requirement_id
                        WHERE sr.student_email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h3>Your Submitted Requirements</h3>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        $is_custom = $row['is_custom'] ? " (Custom)" : "";
        echo "<li>{$row['requirement_name']}{$is_custom} - Submitted on {$row['submission_date']}</li>";
    }
    echo "</ul>";
} else {
    echo "You haven't submitted any requirements.";
}

$stmt->close();
$conn->close();
?>
