<?php
include '../../Backend/connect.php';

// Fetch courses from the database
$sql = "SELECT * FROM nc_course";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find Courses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/find_course.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-image: url("../../Assets/bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: white !important;
        }

        .navbar .nav-link {
            color: #190960 !important;
            font-weight: bold;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .main-header h2 {
            color: #190960;
            font-weight: bold;
        }

        .search-bar {
            width: 300px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px;
            border-radius: 25px;
            border: 1px solid #ccc;
            font-size: 14px;
            outline: none;
            box-sizing: border-box;
            height: 40px;
        }

        .courses-wrapper {
            background-color: #190960;
            padding: 40px 30px;
            border-radius: 15px;
        }

        .courses-wrapper h4 {
            color: white;
            margin-bottom: 30px;
            font-weight: bold;
            text-align: center;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1rem;
        }

        .card h5 {
            font-weight: 600;
            font-size: 1rem;
        }

        .card p {
            font-size: 0.85rem;
            margin-bottom: 0.3rem;
        }

        .btn-view {
            background-color: #00bfff;
            color: white;
            border: none;
            margin-top: auto;
            align-self: flex-start;
        }

        .btn-view:hover {
            background-color: #009fcd;
        }

        .card-img-top {
            height: 140px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../../Assets/nc_finder_logo_transparent.png" height="40" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="contact_us.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="about_us.php">About Us</a></li>
            </ul>
            <div class="d-flex align-items-center">
                <a class="btn btn-light rounded-circle p-0" href="#" style="width: 44px; height: 44px;">
                    <i class="fa-solid fa-user-tie text-secondary d-block m-auto"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Main -->
<div class="container mt-5">
    <!-- Header Row -->
    <div class="main-header">
        <h2>Find Courses</h2>
        <div class="search-bar">
            <input type="text" placeholder="Search courses...">
        </div>
    </div>

        <!-- Course Section -->
        <div class="courses-wrapper">
            <h4>Courses</h4>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" id="coursesRow">
                <!-- Card 1 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../../Assets/COURSE_BG/css.jpg" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Computer System Servicing NC II</h5>
                                <p>Mindtech Training and Development Institute Inc.</p>
                                <p>Duration: 3 months</p>
                                <p>Slots available: 9</p>
                            </div>
                            <a href="course_detailsCSS.php" class="btn btn-view btn-sm">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../../Assets/COURSE_BG/TD.jpg" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Technical Drafting NC II</h5>
                                <p>Pasay City Man Power Training Center</p>
                                <p>Duration: 1 month</p>
                                <p>Slots available: 6</p>
                            </div>
                            <a href="course_detailsTD.php" class="btn btn-view btn-sm">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../../Assets/COURSE_BG/EPAS.jpg" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Electronics Products Assembly NC II</h5>
                                <p>TECHVOCH Skills Incorporated</p>
                                <p>Duration: 2 months</p>
                                <p>Slots available: 7</p>
                            </div>
                            <a href="course_detailsEPAS.php" class="btn btn-view btn-sm">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../../Assets/COURSE_BG/JAVA.jpg" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Java Programming NC III</h5>
                                <p>Aureate Training and Assessment Center, Inc.</p>
                                <p>Duration: 3 months</p>
                                <p>Slots available: 12</p>
                            </div>
                            <a href="course_detailsJAVA.php" class="btn btn-view btn-sm">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../../Assets/COURSE_BG/MCS.jpg" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Mechatronics Servicing NC III</h5>
                                <p>St. Paul Technical Institute</p>
                                <p>Duration: 5 months</p>
                                <p>Slots available: 8</p>
                            </div>
                            <a href="course_detailsMS.php" class="btn btn-view btn-sm">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../../Assets/COURSE_BG/AMS.jpg" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Automotive Servicing NC II</h5>
                                <p>Mindtech Training and Development Institute Inc.</p>
                                <p>Duration: 2 months</p>
                                <p>Slots available: 6</p>
                            </div>
                            <a href="course_detailsAMS.php" class="btn btn-view btn-sm">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Card 7 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../../Assets/COURSE_BG/SMAW.jpg" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Shielded Metal Arc Welding NC II</h5>
                                <p>Asian College of Science and Technology Foundation, Inc.</p>
                                <p>Duration: 5 months</p>
                                <p>Slots available: 14</p>
                            </div>
                            <a href="course_detailsSMAW.php" class="btn btn-view btn-sm">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Card 8 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../../Assets/COURSE_BG/EMS.jpg" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Event Management Services NC III</h5>
                                <p>Mindtech Training and Development Institute Inc.</p>
                                <p>Duration: 2 months</p>
                                <p>Slots available: 6</p>
                            </div>
                            <a href="course_detailsEMS.php" class="btn btn-view btn-sm">View Details</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
