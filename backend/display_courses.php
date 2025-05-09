<?php
include 'your_connection_file.php'; // Replace with your actual filename (e.g., db_connection.php)

$sql = "
    SELECT 
        d.dept_name,
        dc.year_level,
        c.course_name,
        c.nc_level
    FROM DepartmentCourses dc
    JOIN Departments d ON dc.dept_id = d.dept_id
    JOIN Courses c ON dc.course_id = c.course_id
    ORDER BY d.dept_name, dc.year_level, c.course_name;
";

$result = $conn->query($sql);

$current_dept = '';
$current_year = '';

if ($result->num_rows > 0) {
    echo "<h2>TESDA NC Courses by Department</h2>";
    echo "<div style='font-family: Arial, sans-serif;'>";

    while ($row = $result->fetch_assoc()) {
        if ($current_dept !== $row["dept_name"]) {
            if ($current_dept !== '') echo "</ul></div>"; // close previous section
            $current_dept = $row["dept_name"];
            echo "<div style='margin-top: 20px;'><h3>{$current_dept}</h3>";
            $current_year = ''; // reset year
        }

        if ($current_year !== $row["year_level"]) {
            if ($current_year !== '') echo "</ul>"; // close previous year
            $current_year = $row["year_level"];
            echo "<strong>Year Level {$current_year}</strong><ul>";
        }

        $course = $row["course_name"];
        $nc_level = $row["nc_level"] ? " ({$row["nc_level"]})" : "";
        echo "<li>{$course}{$nc_level}</li>";
    }

    echo "</ul></div></div>"; // close last section
} else {
    echo "No data found.";
}

$conn->close();
?>
