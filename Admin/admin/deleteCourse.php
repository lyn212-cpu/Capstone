<?php
include '../../Backend/connect.php';

if (isset($_GET['course_name'])) {
    $course_name = mysqli_real_escape_string($conn, $_GET['course_name']);
    $sql = "DELETE FROM nc_course WHERE course_name = '$course_name'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Course has been removed from the database'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error removing course'); window.location.href='admin_dashboard.php';</script>";
    }
} else {
    echo "<script>alert('Invalid course selection'); window.location.href='admin_dashboard.php';</script>";
}
