<?php
$host = "localhost";
$username = "NC_Admin";
$password = "AdminGroup3";
$database = "NC Finder";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
