<?php
session_start();
include '../../Backend/connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Sign_in.php");
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
    <title>Profile</title>
</head>

<body>
    <nav id="collapseExample" class="d-flex flex-column"
        style="background-color: #190960; min-width: 230px; min-height: 100vh; height: auto;">
        <div class="text-light d-flex flex-column justify-content-center align-items-center p-2 gap-3">
            <picture class="p-2 bg-light-subtle rounded-circle">
                <img width="50" height="50" src="https://img.icons8.com/ios/50/administrator-male--v1.png"
                    alt="administrator-male--v1" />
            </picture>
        </div>
        <!-- SideBar--------------------------------------------------------------->
        <div class="d-flex flex-column justify-content-center mt-5">
            <ul class="">
                <li class="nav-item  p-2 mb-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-gauge text-light"></i>
                    <a class="nav-link active  text-light" aria-current="page" href="./userProfile.php">Profile</a>
                </li>
                <li class="nav-item  p-2 mb-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-bookmark text-light"></i>
                    <a class="nav-link active  text-light" aria-current="page"
                        href="./viewCertificates.php">Certificates</a>
                </li>
                <li class="nav-item  p-2 mb-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-school-circle-check text-light"></i>
                    <a class="nav-link active text-light" aria-current="page" href="./centeAttended.php">Centers
                        Attended</a>
                </li>
                <li class="nav-item  p-2 mb-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-comment text-light"></i>
                    <a class="nav-link active  text-light" aria-current="page" href="./myFeedback.php">My FeedBack</a>
                </li>
            </ul>
        </div>
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
                        <a href="login.php" class="btn btn-danger">Logout</a> <!-- Redirects to login.php -->
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="container-fluid d-flex flex-column gap-3 p-2">
        <header class="shadow-sm border-bottom border-2 rounded-3 p-2 d-flex gap-3  align-items-center">
            <div class="d-flex gap-3">
                <button class="btn" type="button" id="btn_menu">
                    <img style="height: 20px; width: 20px" src="../../Assets/menu.png" alt="menu">
                </button>

                <nav class="navbar navbar-expand-lg navbar-light sticky-top">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav me-auto justify-content-end  mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a style="color: #190960" class="nav-link fw-bold" href="#">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: #190960" class="nav-link fw-bold" href="#">Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: #190960" class="nav-link fw-bold"
                                        href="./pages/contact_us.php">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: #190960" class="nav-link fw-bold" href="#">About us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>


        <div class="container my-5">
            <h4 class="fw-bold text-primary mb-4">My Feedbacks</h4>
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-white" style="background-color: #18015b;">
                    <thead class="text-white text-uppercase" style="background-color: #12004a;">
                        <tr>
                            <th scope="col">Date Submitted</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/10/2025</td>
                            <td>5/5</td>
                            <td>
                                "The instructors were amazing, and the course content was highly relevant. I feel more
                                confident in my skills now!"
                            </td>
                        </tr>
                        <tr>
                            <td>04/15/2025</td>
                            <td>4.5/5</td>
                            <td>
                                "The sessions were well-organized, but the seating arrangements could be more
                                comfortable for long lectures."
                            </td>
                        </tr>
                        <tr>
                            <td>06/26/2025</td>
                            <td>4/5</td>
                            <td>
                                "I appreciated the hands-on activities and the interactive teaching approach. It made
                                learning so much fun!"
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>

    <script src="../../JavaScript_Admin/js_dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>