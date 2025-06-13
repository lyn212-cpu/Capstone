<?php
session_start();
include '../../Backend/connect.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/Dashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <title>Admin</title>
</head>

<body>
    <!-- Add the modals here -->

    <nav id="collapseExample" class="d-flex flex-column"
        style="background-color: #190960; min-width: 230px; min-height: 100vh; height: auto;">
        <div class="text-light d-flex flex-column justify-content-center align-items-center p-2 gap-3">
            <picture class="p-2 bg-light-subtle rounded-circle">
                <img width="50" height="50" src="https://img.icons8.com/ios/50/administrator-male--v1.png"
                    alt="administrator-male--v1" />
            </picture>
            <div>
                <h5 class="">Admin</h5>
            </div>
        </div>
        <!-- SideBar--------------------------------------------------------------->
        <?php
        include_once '../../include/admin_sideBar.php';
        ?>
        <!-- SideBar--------------------------------------------------------------->
        <div class="d-flex justify-content-evenly align-items-center p-2">
            <!-- Logout Button -->
            <button class="btn text-light bg-danger p-2 rounded-5 col-lg-9 text-center bg-opacity-75"
                data-bs-toggle="modal" data-bs-target="#logoutModal">
                Logout
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </button>
        </div>

        <!-- Logout Confirmation Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to log out?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="../../include/logout.php" class="btn btn-danger">Logout</a> <!-- Redirects to login.php -->
                    </div>
                </div>
            </div>
        </div>

    </nav>
    <main class="container-fluid d-flex flex-column gap-3 p-2">
        <header class="shadow-sm border-bottom border-2 rounded-3 p-2">
            <div class="d-flex gap-3">
                <button class="btn" type="button" id="btn_menu">
                    <img style="height: 20px; width: 20px" src="../../Assets/menu.png" alt="menu">
                </button>
                <h3 style="color: #190960" class="fw-bold">Manage Courses</h3>
            </div>
        </header>

        <nav class="container-fluid d-flex justify-content-between align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Course Management</li>
                </ol>
            </nav>
        </nav>

        <!-- User list table -->
        <div class="card mb-4 bg-transparent">
            <div style="background-color: #190960" class="card-header text-light">
                <i class="fas fa-table me-1"></i>
                Course List
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Training Center Name</th>
                            <th>Duration</th>
                            <th>Slots Available</th>
                            <th>Location</th>
                            <th>Contact Information</th>
                            <th>Course Description</th>
                            <th>Requirements</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch data from nc_course table
                        $sql = "SELECT course_id, course_name, training_center_name, duration, slots_available, blockLot, street, subdivision, barangay, city, province, zipCode, location, contact_info, course_description, requirements, status FROM nc_course";
                        $result = mysqli_query($conn, $sql);

                        // Check if there are records
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Merge location fields if they exist, otherwise use the 'location' column
                                if (
                                    isset($row['blockLot']) || isset($row['street']) || isset($row['subdivision']) ||
                                    isset($row['barangay']) || isset($row['city']) || isset($row['province']) || isset($row['zipCode'])
                                ) {
                                    $location_parts = [
                                        $row['blockLot'] ?? '',
                                        $row['street'] ?? '',
                                        $row['subdivision'] ?? '',
                                        $row['barangay'] ?? '',
                                        $row['city'] ?? '',
                                        $row['province'] ?? '',
                                        $row['zipCode'] ?? ''
                                    ];
                                    $location = implode(', ', array_filter($location_parts));
                                } else {
                                    $location = $row['location'] ?? '';
                                }

                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['training_center_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['slots_available']) . "</td>";
                                echo "<td>" . htmlspecialchars($location) . "</td>"; // Fixed Location Display
                                echo "<td>" . htmlspecialchars($row['contact_info']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['course_description']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['requirements']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                echo "<td>";

                                // Show Approve button only if status is "pending"

                                echo "<button class='btn btn-success btn-sm' onclick='approveCourse(\"" . $row['course_id'] . "\")'>Approve</button> ";
                                echo "<button class='btn btn-danger btn-sm' onclick='disapproveCourse(\"" . $row['course_id'] . "\")'>Disapprove</button>";


                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10' class='text-center'>No courses found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="/Capstone/JS_CSS_Admin/js_courses.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
</body>

</html>