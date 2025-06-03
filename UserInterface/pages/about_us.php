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
        content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../Assets/style.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>About Us</title>

    <style>
        body {
            background-image: url("../../Assets/background/raw 2.jpg");
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
            color:rgb(255, 255, 255);
            font-size: 1.1rem;
        }

        .navbar {
            background-color: #ffffff !important;
        }

        .navbar .nav-link {
            color: #000 !important;
        }

        .navbar .nav-link.active {
            font-weight: bold;
            color: #190960 !important;
        }
    </style>
</head>

<body>
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
                    </ul>
                    <div class="d-flex align-items-center">
                        <a class="btn btn-light rounded-circle p-0" href="#" style="width: 44px; height: 44px;">
                            <i class="fa-solid fa-user-tie text-secondary d-block m-auto"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- About Page -->
    <section id="topTraining" class="container">
    <h1 class="text-center fw-bold mb-5 display-4" style="letter-spacing: 2px; color:rgb(255, 255, 255);">ABOUT US</h1>
    
    <div class="card p-5">
        <form class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <p>
                    Welcome to <strong>NC Finder</strong>, a dedicated platform created for PUP ITECH students to simplify the search
                    for TESDA-accredited courses and training centers. We understand the challenges students face when
                    navigating TESDA’s offerings, from scattered information to difficulty finding courses that fit
                    their skills, interests, and location. Our website bridges this gap, providing a centralized,
                    user-friendly solution designed with students’ needs in mind.
                    <br><br>
                    NC Finder offers comprehensive details about TESDA programs, including course duration,
                    prerequisites, costs, and certification opportunities. With intuitive filters and a clean interface,
                    students can efficiently explore courses based on their field of study, skill level, or location. We
                    aim to support students in pursuing technical and vocational training, empowering them with the
                    skills needed for personal growth and future employment.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://www.tesdaguides.com/wp-content/uploads/2015/06/tesda-online.jpg"
                     alt="TESDA Training Image"
                     class="img-fluid rounded-4 shadow-lg"
                     style="max-height: 320px; object-fit: cover;">
            </div>
        </form>
    </div>
</section>

    <footer id="footer">
        <div class="container">
            <a href="contact_us.php">Contact Us</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <p class="mt-2">&copy; 2025 NC Finder. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
