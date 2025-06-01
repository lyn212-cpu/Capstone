<?php
include '../connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM department_courses WHERE id=$id");
}

header("Location: index.php");
?>
