<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("DELETE FROM Sign_up WHERE username=?");
    $stmt->bind_param("s", $username);

    $username = $_POST['username'];
    $stmt->execute();

    echo "Record deleted successfully";
    $stmt->close();
}
?>
