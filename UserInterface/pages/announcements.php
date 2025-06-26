<?php session_start();
include '../../Backend/connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:../Sign_in.php");
    exit();
} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../Assets/style.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Announcements</title>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background-image: url("../../Assets/background/raw_2.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .card {
            background: rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        #topTraining {
            padding-top: 100px;
            padding-bottom: 50px;
        }

        #footer {
            background-color: #190960;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }

        #footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        #footer a:hover {
            text-decoration: underline;
        }

        p {
            color: rgb(255, 255, 255);
            font-size: 1.1rem;
        }

        .navbar {
            background-color: #ffffff !important;
        }

        .navbar .nav-link.active {
            font-weight: bold;
            color: #190960 !important;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <!-- HEADER / NAVBAR -->
        <header>
            <nav class="navbar navbar-expand-lg sticky-top shadow-sm">
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
                            <li class="nav-item"><a class="nav-link" href="../pages/FindCourse.php">Courses</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact_us.php">Contact Us</a></li>
                            <li class="nav-item"><a class="nav-link active" href="about_us.php">About Us</a></li>
                            <li class="nav-item"><a class="nav-link active" href="./Announcements.php">Announcements</a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center justify-content-end p-2">
                            <div class="dropdown">
                                <a class="btn btn-light d-flex align-items-center rounded-circle p-0 border-0" href="#"
                                    role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="width: 44px; height: 44px;">
                                    <i class="fa-solid fa-user-tie text-secondary m-auto"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end mt-2 shadow" aria-labelledby="userMenu">
                                    <li><a class="dropdown-item" href="userProfile.php"><i
                                                class="fa fa-user me-2"></i>Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="../../include/logout.php"><i
                                                class="fa fa-sign-out-alt me-2"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container-fluid mt-5 px-3 px-md-5">
            <div class="row justify-content-center">
                <!-- Header Title -->
                <div class="col-12 col-md-10 mb-4">
                    <div class="bg-white p-4 rounded shadow-sm border text-center">
                        <h4 class="text-primary mb-0">Official Bulletin Board</h4>
                    </div>
                </div>

                <!-- Content Boxes -->
                <div class="col-12 col-md-10 d-flex flex-column flex-md-row justify-content-between gap-4">
                    <!-- Faculty (Scrollable) -->
                    <div class="bg-white p-4 rounded shadow-sm border flex-fill"
                        style="max-height: 500px; overflow-y: auto;">
                        <h5 class="text-danger fw-bold mb-3">Organizational Structure</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3"><strong>MANUEL M. MUHI, D.TECH</strong><br><small class="text-muted">ASEAN
                                    ENGR. UNIVERSITY PRESIDENT</small></li>
                            <li class="mb-3"><strong>ALBERTO C. GUILLO, MS (STAT)</strong><br><small
                                    class="text-muted">EXECUTIVE VICE PRESIDENT</small></li>
                            <li class="mb-3"><strong>EMMANUEL C. DE GUZMAN, Ph.D</strong><br><small
                                    class="text-muted">VICE PRESIDENT FOR ACADEMIC AFFAIRS</small></li>
                            <li class="mb-3"><strong>ENGR. RAMIR M. CRUZ, MSCM</strong><br><small
                                    class="text-muted">DEAN</small></li>
                            <li class="mb-3"><strong>ZENAIDA S. BONAOBRA</strong><br><small
                                    class="text-muted">CHAIRPERSON OMT DEPT.</small></li>
                            <li class="mb-3"><strong>JOMAR B. RUIZ</strong><br><small class="text-muted">LAB
                                    HEAD</small></li>
                            <li class="mb-3"><strong>KENNETH DAZON</strong><br><small class="text-muted">LAB
                                    TECH/FACULTY</small></li>
                            <li class="mb-3"><strong>ADAM V. RAMILO, MIR</strong><br><small class="text-muted">VICE
                                    PRESIDENT FOR ADMINNISTRATION</small></li>
                            <li class="mb-3"><strong>ANNA RUBY P. GAPASIN, DEM</strong><br><small
                                    class="text-muted">VICE PRESIDENT FOR RESEARCH EXTENSION AND DEVELOPMENT</small>
                            </li>
                            <li class="mb-3"><strong>PASCUALITO B. GATAN, MBA</strong><br><small class="text-muted">VICE
                                    PRESIDENT FOR CAMPUSES</small></li>
                            <li class="mb-3"><strong>TOMAS O. TESTOR, MPA</strong><br><small class="text-muted">VICE
                                    PRESIDENT FOR STUDENT AFFAIRS AND SERVICES</small></li>
                        </ul>
                    </div>

                    <!-- Announcements -->
                    <div class="bg-white p-4 rounded shadow-sm border flex-fill">
                        <h5 class="text-primary fw-semibold mb-3">Announcements</h5>
                        <h1>National Certificate</h1>
                        <h3>TYPES OF ASSESSMENT</h3>
                        <p class="text-muted">Computer Systems Servicing NC II</p>
                        <p class="text-muted">Visual Graphic Design NC III</p>
                        <p class="text-muted">Web Development NC III</p>
                        <p class="text-muted">Animation NC II</p>
                    </div>
                </div>
            </div>
        </main>


        <!-- FOOTER -->
        <footer id="footer">
            <?php include_once '../../include/footer.php'; ?>
        </footer>
    </div>
</body>

</html>