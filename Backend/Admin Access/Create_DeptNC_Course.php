<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['department_code'];
    $name = $_POST['department_name'];
    $level = $_POST['year_level'];
    $course = $_POST['course_name'];

    $stmt = $conn->prepare("INSERT INTO department_courses (department_code, department_name, year_level, course_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $code, $name, $level, $course);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
