<?php
include_once '../../include/db_connect.php'; // adjust path as needed

$query = "SELECT * FROM NCTable_Admin ORDER BY uploaded_at DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

mysqli_free_result($result);
mysqli_close($conn);
?>
