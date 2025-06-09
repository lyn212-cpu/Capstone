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
    <title>Contact us</title>

    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("../../Assets/BACKGROUND/blur_1.jpg");
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
                            <a style="color: #190960" class="nav-link fw-bold" href="FindCourse.php">Courses</a>
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

    <section class="container mt-5">
        <div class="card bg-transparent p-3 mb-4 rounded col-lg-12">
            <div class="card-body">
                <h5 class="card-title fw-bold text-primary mb-3" style="color: #ffffff;">Connect with Us!</h5>

                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-instagram me-2 text-primary"></i>
                    <a href="mailto:ncfinder01@gmail.com"
                        class="text-decoration-none text-dark fw-semibold">ncfinder01@gmail.com</a>
                </div>

                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-geo-alt-fill me-2 text-primary"></i>
                    <span>PUP Sta. Mesa, Manila</span>
                </div>

                <div class="d-flex align-items-center">
                    <i class="bi bi-facebook me-2 text-primary"></i>
                    <span class="fw-semibold">Nc Finder</span>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5 mt-5">
        <h3 class="fw-bold text-white mb-4">Our Team:</h3>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4 justify-content-center">

            <!-- Team Member Cards -->
            <div class="col text-center">
                <img src="../../Assets/FORMAL_PICTURES/Ramon,%20Jefte.jpeg" class="rounded-circle img-fluid mb-2"
                    style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
                <h6 class="mb-0 text-white">Ramon, Jefte Jr.</h6>
                <small class="text-white-100">Project Manager</small>
            </div>

            <div class="col text-center">
                <img src="../../Assets/FORMAL_PICTURES/De%20Asis,%20Rhea%20Lyn.jpg"
                    class="rounded-circle img-fluid mb-2" style="width: 50px; height: 50px; object-fit: cover;"
                    alt="avatar">
                <h6 class="mb-0 text-white">De Asis, Rhea Lyn</h6>
                <small class="text-white-100">Back-end Developer</small>
            </div>

            <div class="col text-center">
                <img src="../../Assets/FORMAL_PICTURES/Cadorna,%20Jade.jpg" class="rounded-circle img-fluid mb-2"
                    style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
                <h6 class="mb-0 text-white">Cadorna, Jade</h6>
                <small class="text-white-100">Front-end Developer</small>
            </div>

            <div class="col text-center">
                <img src="../../Assets/FORMAL_PICTURES/Cruz,%20Ronn.jpg" class="rounded-circle img-fluid mb-2"
                    style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
                <h6 class="mb-0 text-white">Cruz, Ronn Andrei</h6>
                <small class="text-white-100">Front-end Developer</small>
            </div>

            <div class="col text-center">
                <img src="../../Assets/FORMAL_PICTURES/Malasaga,Merlyn.jpg" class="rounded-circle img-fluid mb-2"
                    style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
                <h6 class="mb-0 text-white">Malasaga, Merlyn</h6>
                <small class="text-white-100">Front-end Developer</small>
            </div>

            <div class="col text-center">
                <img src="../../Assets/FORMAL_PICTURES/Potolin,%20Shahad.JPG" class="rounded-circle img-fluid mb-2"
                    style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
                <h6 class="mb-0 text-white">Potolin, Shahad</h6>
                <small class="text-white-100">Coordinator</small>
            </div>

            <div class="col text-center">
                <img src="../../Assets/FORMAL_PICTURES/Donato,%20Hans.jpg" class="rounded-circle img-fluid mb-2"
                    style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
                <h6 class="mb-0 text-white">Donato, Kenneth Hans</h6>
                <small class="text-white-100">Coordinator</small>
            </div>

            <div class="col text-center">
                <img src="../../Assets/FORMAL_PICTURES/Rayo,%20Kim.jpg" class="rounded-circle img-fluid mb-2"
                    style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
                <h6 class="mb-0 text-white">Rayo, Kimberly</h6>
                <small class="text-white-100">Quality Assurance</small>
            </div>

        </div>
    </div>



    <div>
        <?php
        include_once '../../include/footer.php'
            ?>
    </div>
</body>

</html>