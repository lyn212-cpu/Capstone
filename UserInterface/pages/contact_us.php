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
        body{
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("../../Assets/bg.jpg");
        }

        .navbar {
            background-color: #ffffff !important;
        }

        .card{
            /* From https://css.glass */
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(3.3px);
            -webkit-backdrop-filter: blur(3.3px);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }
        #our_team{
         background-color: #190960;
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
                        <li class="nav-item"><a class="nav-link" href="#">Courses</a></li>
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

<section class="container mt-5">
    <div class="card bg-transparent p-3 mb-4 rounded col-lg-12" >
        <div class="card-body">
            <h5 class="card-title fw-bold text-primary mb-3">Connect with Us!</h5>

            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-instagram me-2 text-primary"></i>
                <a href="mailto:ncfinder01@gmail.com" class="text-decoration-none text-dark fw-semibold">ncfinder01@gmail.com</a>
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
            <img src="../../Assets/FORMAL_PICTURES/Ramon,%20Jefte.jpeg" class="rounded-circle img-fluid mb-2" style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
            <h6 class="mb-0 text-white">Ramon, Jefte Jr.</h6>
            <small class="text-white-50">Project Manager</small>
        </div>

        <div class="col text-center">
            <img src="../../Assets/FORMAL_PICTURES/De%20Asis,%20Rhea%20Lyn.jpg" class="rounded-circle img-fluid mb-2" style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
            <h6 class="mb-0 text-white">De Asis, Rhea Lyn</h6>
            <small class="text-white-50">Back-end Developer</small>
        </div>

        <div class="col text-center">
            <img src="../../Assets/FORMAL_PICTURES/Cadorna,%20Jade.jpg" class="rounded-circle img-fluid mb-2" style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
            <h6 class="mb-0 text-white">Cadorna, Jade</h6>
            <small class="text-white-50">Front-end Developer</small>
        </div>

        <div class="col text-center">
            <img src="../../Assets/FORMAL_PICTURES/Cruz,%20Ronn.jpg" class="rounded-circle img-fluid mb-2" style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
            <h6 class="mb-0 text-white">Cruz, Ronn Andrei</h6>
            <small class="text-white-50">Front-end Developer</small>
        </div>

        <div class="col text-center">
            <img src="../../Assets/FORMAL_PICTURES/Malasaga,Merlyn.jpg" class="rounded-circle img-fluid mb-2" style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
            <h6 class="mb-0 text-white">Malasaga, Merlyn</h6>
            <small class="text-white-50">Front-end Developer</small>
        </div>

        <div class="col text-center">
            <img src="../../Assets/FORMAL_PICTURES/Potolin,%20Shahad.JPG" class="rounded-circle img-fluid mb-2" style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
            <h6 class="mb-0 text-white">Potolin, Shahad</h6>
            <small class="text-white-50">Coordinator</small>
        </div>

        <div class="col text-center">
            <img src="../../Assets/FORMAL_PICTURES/Donato,%20Hans.jpg" class="rounded-circle img-fluid mb-2" style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
            <h6 class="mb-0 text-white">Donato, Kenneth Hans</h6>
            <small class="text-white-50">Coordinator</small>
        </div>

        <div class="col text-center">
            <img src="../../Assets/FORMAL_PICTURES/Rayo,%20Kim.jpg" class="rounded-circle img-fluid mb-2" style="width: 50px; height: 50px; object-fit: cover;" alt="avatar">
            <h6 class="mb-0 text-white">Rayo, Kimberly</h6>
            <small class="text-white-50">Quality Assurance</small>
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