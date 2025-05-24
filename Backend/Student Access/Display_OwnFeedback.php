<?php
require_once 'db_connection.php';

// Get student username (from session or request)
$username = isset($_GET['username']) ? $_GET['username'] : '';

if (empty($username)) {
    echo "No username provided.";
    exit;
}

// Prepare SQL to fetch only this user's feedback
$sql = "SELECT f.feedback_id, c.course_name, f.feedback, f.created_at
        FROM Feedback f
        LEFT JOIN NC_Course c ON f.course_id = c.course_id
        WHERE f.username = ?
        ORDER BY f.created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Display feedbacks
if ($result->num_rows > 0) {
    echo "<h3>Feedbacks by: $username</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Course</th><th>Feedback</th><th>Submitted On</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['course_name']}</td>
            <td>{$row['feedback']}</td>
            <td>{$row['created_at']}</td>
            <td>
                <a href='student_edit_feedback_form.php?id={$row['feedback_id']}'>Edit</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "You have not submitted any feedback.";
}

$stmt->close();
$conn->close();
?>
