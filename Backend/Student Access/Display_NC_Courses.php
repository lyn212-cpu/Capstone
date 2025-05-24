<?php
require_once 'connect.php';

$sql = "SELECT * FROM NC_Course ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Available Courses</h3>";
    echo "<table border='1'>
            <tr>
                <th>Course Name</th>
                <th>Training Center Name</th>
                <th>Duration</th>
                <th>Slots Available</th>
                <th>Location</th>
                <th>Contact Information</th>
                <th>Course Description</th>
                <th>Requirements</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['course_name']}</td>
                <td>{$row['training_center_name']}</td>
                <td>{$row['duration']}</td>
                <td>{$row['slots_available']}</td>
                <td>{$row['location']}</td>
                <td>{$row['contact_info']}</td>
                <td>{$row['course_description']}</td>
                <td>{$row['requirements']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No courses available.";
}

$conn->close();
?>
