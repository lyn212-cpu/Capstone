<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/Dashboard.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <title>Admin</title>
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
                <h5 class="">Admin</h5>
            </div>
        </div>

        <!-- SideBar--------------------------------------------------------------->
        <?php
        include_once '../../include/sideBar.php';
        ?>
        <!-- SideBar--------------------------------------------------------------->
        <div class="d-flex justify-content-evenly  align-items-center p-2">
            <a href="#" class="nav-link active text-light bg-danger p-2 rounded-5 col-lg-9 text-center bg-opacity-75">
                Logout
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
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
        <form id="deleteForm" action="deleteUser.php" method="POST" onsubmit="return confirmDelete();">


            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th><button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete();">
                                Delete
                            </button></th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>First Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Contact Person</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Sample User Row -->
                    <tr>
                        <td><input type="checkbox" name="usernames[]" value="johndoe"></td>
                        <td>Doe</td>
                        <td>Hon</td>
                        <td>Johnny</td>
                        <td>johndoe</td>
                        <td>johndoe@example.com</td>
                        <td>123 Main St</td>
                        <td>555-1234</td>
                        <td>Jane Doe</td>
                    </tr>
                    <!-- Repeat for more users -->
                    <tr>
                        <td><input type="checkbox" name="usernames[]" value="johndoe"></td>
                        <td>Deds</td>
                        <td>Hon</td>
                        <td>John</td>
                        <td>johndoeabcdefgh</td>
                        <td>johndoe@example.com</td>
                        <td>123 Main St</td>
                        <td>555-1234</td>
                        <td>Jane Doe</td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" name="usernames[]" value="johndoe"></td>
                        <td>Hulo</td>
                        <td>Hon</td>
                        <td>John</td>
                        <td>johndoe</td>
                        <td>johndoe@example.com</td>
                        <td>123 Main St Dasdasan Marikina City Philippines</td>
                        <td>555-1234</td>
                        <td>Jane Doe</td>
                    </tr>
                </tbody>

            </table>
        </form>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>

    <script src="/Capstone/JavaScript_Admin/js_dashboard.js"></script>

</body>

</html>