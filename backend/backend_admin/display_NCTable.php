<?php
include_once 'db_connect.php'; 

$query = "SELECT * FROM NCTable_Admin ORDER BY uploaded_at DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . htmlspecialchars($row['id']) . "\n";
    echo "Full Name: " . htmlspecialchars($row['full_name']) . "\n";
    echo "Section Code: " . htmlspecialchars($row['section_code']) . "\n";
    echo "Email: " . htmlspecialchars($row['email']) . "\n";
    echo "Certificate Title: " . htmlspecialchars($row['certificate_title']) . "\n";
    echo "Certificate Number: " . htmlspecialchars($row['certificate_number']) . "\n";
    echo "Uploaded At: " . htmlspecialchars($row['uploaded_at']) . "\n";
    echo "-------------------------\n";
}

mysqli_free_result($result);
mysqli_close($conn);
?>
