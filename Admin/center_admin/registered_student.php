<?php
include '../../Backend/connect.php';
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../JS_CSS_Admin/courses.css">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <title>Training Center Admin</title>
</head>

<body>




    <nav id="collapseExample" class="d-flex flex-column"
        style="background-color: #190960; min-width: 230px; min-height: 100vh; height: auto;">
        <div class="text-light d-flex flex-column justify-content-center align-items-center p-2 gap-3">
            <picture class="p-2 bg-light-subtle rounded-circle">
                <img width="50" height="50" src="https://img.icons8.com/ios/50/administrator-male--v1.png"
                    alt="administrator-male--v1" />
            </picture>
            <div>
                <h5 class="">Training Center Admin</h5>
            </div>
        </div>
        <!-- SideBar--------------------------------------------------------------->
        <?php
        include_once '../../include/centerAdmin_sideBar.php';
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
                        <a href="../../include/logout.php" class="btn btn-danger">Logout</a>

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
                <h3 style="color: #190960" class="fw-bold">Registered Students</h3>
            </div>
        </header>

        <nav class="container-fluid d-flex justify-content-between align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Registered Students</li>
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
                            <th>Full Name</th>
                            <th>Training Center Name</th>
                            <th>Course Name</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "
    SELECT
        u.full_name AS student_name,
        c.training_center_name,
        c.course_name,
        r.registered_at
    FROM
        registrations r
    JOIN users u ON r.user_id = u.user_id
    JOIN nc_course c ON r.course_id = c.course_id
    ORDER BY r.registered_at DESC
";



                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['student_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['training_center_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No registered students found.</td></tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </main>



    <script src="/Capstone/JS_CSS_Admin/js_center_admin_registered.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
</body>

</html>