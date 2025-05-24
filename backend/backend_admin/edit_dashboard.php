<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE Student_Dashboard SET certificates=?, student_feedback=?, student_course=? WHERE student_number=?");
    $stmt->bind_param("ssss", $certificates, $student_feedback, $student_course, $student_number);

    $certificates = $_POST['certificates'];
    $student_feedback = $_POST['student_feedback'];
    $student_course = $_POST['student_course'];
    $student_number = $_POST['student_number'];

    $stmt->execute();
    echo "Dashboard updated.";
    $stmt->close();
}
?>
