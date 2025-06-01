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
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../Assets/style.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>About Us</title>

    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("../../Assets/bg.jpg");
        }

        .card {
            /* From https://css.glass */
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(3.3px);
            -webkit-backdrop-filter: blur(3.3px);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }

        #our_team {
            background-color: #190960;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../../Assets/nc_finder_logo_transparent.png" alt="avatar">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto justify-content-end  mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a style="color: #190960" class="nav-link fw-bold" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #190960" class="nav-link fw-bold" href="#">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #190960" class="nav-link fw-bold" href="contact_us.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #190960" class="nav-link fw-bold" href="about_us.php">About Us</a>
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
                                <li><a class="dropdown-item" href="#"><i class="fa fa-user me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-cog me-2"></i>Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#"><i
                                            class="fa fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!--  About Page -->
    <section id="topTraining"
        class="container-fluid d-flex flex-column gap-3 justify-content-center align-items-center p-5">

        <h1 class="text-center fw-bold text-light">About Us</h1>
        <div id="About_us" class="container d-lg-flex justify-content-center align-items-center">
            <p style="color: #c5bdbd">
                Here is the transcribed text from the image:
                Welcome to TESDA Tracker, a dedicated platform created for PUP ITECH students to simplify the search for
                TESDA-accredited courses and training centers.
                We understand the challenges students face when navigating TESDA’s offerings, from scattered information
                to difficulty finding courses that fit their skills, interests, and location. Our website bridges this
                gap, providing a centralized, user-friendly solution designed with students’ needs in mind.
                TESDA Tracker offers comprehensive details about TESDA programs, including course duration,
                prerequisites, costs, and certification opportunities.
                With intuitive filters and a clean interface, students can efficiently explore courses based on their
                field of study, skill level, or location. We aim to support students in pursuing technical and
                vocational training, empowering them with the skills needed for personal growth and future employment.
            </p>
            <img class="img-fluid col-lg-6"
                src="https://www.tesdaguides.com/wp-content/uploads/2015/06/tesda-online.jpg" alt="image">
        </div>
    </section>


    <div>
        <?php
        include_once '../../include/footer.php'
            ?>
    </div>
</body>

</html>