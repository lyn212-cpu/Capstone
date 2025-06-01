<?php
require_once '../connect.php';

$sql = "SELECT sr.student_email, nr.requirement_name, nr.is_custom, sr.submission_date
        FROM Student_Requirements sr
        JOIN NC_Requirements nr ON sr.requirement_id = nr.requirement_id
        ORDER BY sr.submission_date DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Submitted Requirements by Students</h3>";
    echo "<table border='1'>
            <tr>
                <th>Student Email</th>
                <th>Requirement Name</th>
                <th>Is Custom?</th>
                <th>Submission Date</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        $is_custom = $row['is_custom'] ? 'Yes' : 'No';
        echo "<tr>
                <td>{$row['student_email']}</td>
                <td>{$row['requirement_name']}</td>
                <td>{$is_custom}</td>
                <td>{$row['submission_date']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No submitted requirements found.";
}

$conn->close();
?>
