<?php
include 'db_connect.php';

$sql = "SELECT * FROM Feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>ID</th><th>Training Feedback</th><th>Rating</th><th>Members</th><th>Website Feedback</th><th>Submitted At</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['feedback_id']}</td>
        <td>{$row['training_site_feed']}</td>
        <td>{$row['rating']}</td>
        <td>{$row['project_members']}</td>
        <td>{$row['website_feed']}</td>
        <td>{$row['submitted_at']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No feedback found.";
}
?>
