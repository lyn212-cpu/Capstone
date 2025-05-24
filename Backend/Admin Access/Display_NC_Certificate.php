<?php
require_once 'connect.php';

$sql = "SELECT * FROM NC_Certificate ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Full Name</th>
                <th>Section Code</th>
                <th>Email</th>
                <th>National Certificate</th>
                <th>Certificate No.</th>
                <th>Submitted On</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['full_name']}</td>
                <td>{$row['section_code']}</td>
                <td>{$row['email']}</td>
                <td>{$row['certificate_type']}</td>
                <td>{$row['certificate_number']}</td>
                <td>{$row['created_at']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No certificate records found.";
}

$conn->close();
?>
