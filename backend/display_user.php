<?php
include 'db_connect.php';

$sql = "SELECT * FROM Sign_up";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr>
    <th>Username</th><th>First Name</th><th>Last Name</th><th>Student Number</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['username']}</td>
        <td>{$row['first_name']}</td>
        <td>{$row['last_name']}</td>
        <td>{$row['student_number']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
