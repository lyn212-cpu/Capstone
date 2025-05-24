<?php
require_once 'connect.php';

$sql = "SELECT * FROM Training_Center ORDER BY center_name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Available Training Centers</h3>";
    echo "<table border='1'>
            <tr>
                <th>Center Name</th>
                <th>Location</th>
                <th>Contact Info</th>
                <th>Requirements</th>
                <th>Operation Hours</th>
                <th>Available Courses</th>
                <th>Student Slots</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['center_name']}</td>
                <td>{$row['location']}</td>
                <td>{$row['contact_info']}</td>
                <td>{$row['requirements']}</td>
                <td>{$row['operation_hours']}</td>
                <td>{$row['available_courses']}</td>
                <td>{$row['student_slot']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No training centers found.";
}

$conn->close();
?>
