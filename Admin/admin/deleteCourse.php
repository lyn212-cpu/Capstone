<?php
include '../../Backend/connect.php';

if (isset($_GET['course_id'])) {
    $course_id = mysqli_real_escape_string($conn, $_GET['course_id']);
    $sql = "DELETE FROM nc_course WHERE course_id = '$course_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Post has been disapproved'); window.location.href='Courses.php';</script>";
    } else {
        echo "<script>alert('Error removing course'); window.location.href='Courses.php';</script>";
    }
} else {
    echo "<script>alert('Invalid course selection'); window.location.href='Courses.php';</script>";
}
