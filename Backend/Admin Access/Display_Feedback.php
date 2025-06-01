<?php
require_once '../connect.php'; // Use a shared DB connection file

$sql = "SELECT f.feedback_id, f.username, c.course_name, f.feedback, f.created_at
        FROM Feedback f
        LEFT JOIN NC_Course c ON f.course_id = c.course_id
        ORDER BY f.created_at DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Username</th><th>Course</th><th>Feedback</th><th>Created At</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['username']}</td>
            <td>{$row['course_name']}</td>
            <td>{$row['feedback']}</td>
            <td>{$row['created_at']}</td>
            <td><a href='admin_delete_feedback.php?id={$row['feedback_id']}' onclick='return confirm(\"Are you sure?\");'>Delete</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No feedback found.";
}

$conn->close();
?>
