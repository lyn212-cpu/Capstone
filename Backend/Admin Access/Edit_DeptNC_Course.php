<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM department_courses WHERE id=$id");
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $code = $_POST['department_code'];
    $name = $_POST['department_name'];
    $level = $_POST['year_level'];
    $course = $_POST['course_name'];

    $stmt = $conn->prepare("UPDATE department_courses SET department_code=?, department_name=?, year_level=?, course_name=? WHERE id=?");
    $stmt->bind_param("ssisi", $code, $name, $level, $course, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Update failed: " . $stmt->error;
    }
}
?>
