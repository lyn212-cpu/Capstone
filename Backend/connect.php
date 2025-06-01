<?php
$host = "localhost";
$username = "NC_Admin";
$password = "AdminGroup3";
$database = "nc_finder";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>