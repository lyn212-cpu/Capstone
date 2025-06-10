<?php
include '../../Backend/connect.php';

if (isset($_GET['course_id'])) {
    $course_id = mysqli_real_escape_string($conn, $_GET['course_id']);

    // Update status to "approved" for the selected course
    $sql = "UPDATE nc_course SET status = 'approved' WHERE course_id = '$course_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Course approved successfully'); window.location.href='courses.php';</script>";
    } else {
        echo "<script>alert('Error approving course: " . mysqli_error($conn) . "'); window.location.href='courses.php';</script>";
    }
} else {
    echo "<script>alert('Invalid course selection'); window.location.href='courses.php';</script>";
}
