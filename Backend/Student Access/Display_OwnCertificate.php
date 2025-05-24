<?php
require_once 'connect.php';

// Get student email (should come from session ideally)
$email = isset($_GET['email']) ? $_GET['email'] : '';

if (empty($email)) {
    echo "No email provided.";
    exit;
}

$stmt = $conn->prepare("SELECT certificate_id, full_name, section_code, certificate_type, certificate_number, created_at 
                        FROM NC_Certificate 
                        WHERE email = ?
                        ORDER BY created_at DESC");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h3>Your Uploaded Certificates</h3>";
    echo "<table border='1'>
            <tr>
                <th>Full Name</th>
                <th>Section Code</th>
                <th>National Certificate</th>
                <th>Certificate No.</th>
                <th>Submitted On</th>
                <th>Action</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['full_name']}</td>
                <td>{$row['section_code']}</td>
                <td>{$row['certificate_type']}</td>
                <td>{$row['certificate_number']}</td>
                <td>{$row['created_at']}</td>
                <td>
                    <a href='student_edit_certificate_form.php?id={$row['certificate_id']}'>Edit</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "You have not uploaded any certificates.";
}

$stmt->close();
$conn->close();
?>
