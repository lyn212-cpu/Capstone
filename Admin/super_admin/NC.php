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
    <script src="../../js/bootstrap.bundle.min.js"></script>
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
                <h3 style="color: #190960" class="fw-bold">Manage National Certificate Form</h3>
            </div>
        </header>

        <nav class="container-fluid d-flex justify-content-between align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">NC Management</li>
                </ol>
            </nav>
        </nav>

        <!--     User list table-->
        <div class="card mb-4 bg-transparent ">
            <div style="background-color: #190960" class="card-header text-light">
                <i class="fas fa-table me-1"></i>
                National Certificate Form List
            </div>
            <div class="card-body">
                <button id="toggleActionsBtn" class="btn btn-secondary mb-3">Toggle Action</button>

                <!-- Upload .xlsx Button Only (moved below toggle button) -->
                <div class="mb-3 d-flex justify-content-start">
                    <form action="upload_nc_excel.php" method="post" enctype="multipart/form-data"
                        class="d-flex align-items-center gap-2">
                        <input type="file" name="nc_excel" accept=".xlsx" class="form-control d-none" id="ncExcelInput"
                            required>
                        <button type="button" class="btn btn-primary"
                            onclick="document.getElementById('ncExcelInput').click();">
                            Upload .xlsx
                        </button>
                        <button type="submit" class="btn btn-success d-none" id="submitNcExcelBtn">Submit</button>
                    </form>
                </div>
                <script>
                    // Show submit button after file is selected
                    const fileInput = document.getElementById('ncExcelInput');
                    const submitBtn = document.getElementById('submitNcExcelBtn');
                    fileInput.addEventListener('change', function() {
                        if (fileInput.files.length > 0) {
                            submitBtn.classList.remove('d-none');
                        } else {
                            submitBtn.classList.add('d-none');
                        }
                    });
                </script>

                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Section Code</th>
                            <th>Email</th>
                            <th>National Certificate</th>
                            <th>Certificate No.</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- No sample data, only column headers remain -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="/Capstone/JS_CSS_Admin/js_nc.js"></script>
    <script>
        // Initialize the Simple-DataTables library for the table
        const table = document.querySelector('#datatablesSimple');
        const dataTable = new simpleDatatables.DataTable(table);
    </script>
</body>

</html>