<?php
session_start();
include '../../Backend/connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: Sign_in.php");
    exit();
}
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
    <title>Super Admin</title>
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
                <h5 class="">Super Admin</h5>
            </div>
        </div>

        <!-- SideBar--------------------------------------------------------------->
        <?php
        include_once '../../include/sideBar.php';
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
                        <!-- Redirects to login.php -->
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
                <h3 style="color: #190960" class="fw-bold">Dashboard</h3>
            </div>
        </header>

        <!-- Summary cards-->
        <section class="container-fluid  row gap-2 p-2">
            <div class="col-lg-3 col-md-10 col-sm-12">
                <div style="background-color: #190960" class="card text-light p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Available Courses</h5>
                            <h3>200</h3>
                        </div>
                        <i class="fa-solid fa-bookmark text-light"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-10 col-sm-12">
                <div style="background-color: #190960" class="card text-light p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Training Center</h5>
                            <h3>20</h3>
                        </div>
                        <i class="fa-solid fa-school-circle-check text-light"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-10 col-sm-12">
                <div style="background-color: #190960" class="card text-light p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Feedback</h5>
                            <h3>100</h3>
                        </div>
                        <i class="fa-solid fa-comment"></i>
                    </div>
                </div>
            </div>
        </section>

        <!--User list table-->
        <form id="deleteForm" action="deleteUser.php" method="POST">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <button type="button" class="btn btn-danger btn-sm" id="deleteButton">
                                Delete
                            </button>
                        </th>
                        <th>School Number</th>
                        <th>Full Name</th>
                        <th>Course</th>
                        <th>Year Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT user_id, school_number, full_name, course, year_level FROM users";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='delete_ids[]' value='" . htmlspecialchars($row['user_id'], ENT_QUOTES) . "'></td>";
                            echo "<td>" . htmlspecialchars($row['school_number']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['course']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['year_level']) . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>s
            </table>
        </form>
    </main>

    <!-- Modal for Delete Confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the selected user/s?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../../JS_CSS_Admin/js_dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

    <script>
        document.getElementById('deleteButton').addEventListener('click', function () {
            const checkboxes = document.querySelectorAll('input[name="delete_ids[]"]:checked');
            if (checkboxes.length > 0) {
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            } else {
                alert('Please select at least one user to delete.');
            }
        });

        document.getElementById('confirmDeleteButton').addEventListener('click', function () {
            document.getElementById('deleteForm').submit();
        });
    </script>
</body>

</html>