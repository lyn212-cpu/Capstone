<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NC Finder - Course Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS & JS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome for icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../Assets/style.css">

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

        .course-box {
            background-color: #190960 !important;
            max-width: 1100px;
            margin: 0 auto;
        }

        .btn-light-blue {
            background-color: #add8e6;
            color: #190960;
            border: 1px solid #190960;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-light-blue:hover {
            background-color: #ffffff;
            color: #190960;
        }

        .course-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 0.75rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="../../Assets/nc_finder_logo_transparent.png" height="40" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="findcourse.php">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
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

<!-- Course Details Section -->
<div class="container py-5">
    <!-- Updated Button URL -->
    <a href="findcourse.php" class="btn btn-light-blue mb-4">← Back to Courses</a>

    <div class="course-box text-white shadow-lg rounded-4 p-4 p-md-5">
        <div class="row g-4 align-items-center">
            <!-- Left Column -->
            <div class="col-md-6">
                <h1 class="h4 fw-bold text-white">Computer System Servicing NC II</h1>
                <p class="fw-semibold mb-1">Mindtech Training and Development Institute Inc.</p>
                <p><strong>Duration:</strong> 3 months</p>
                <p><strong>Slots Available:</strong> 9</p>
                <p><strong>Location:</strong> 155 Dr. Sixto Antonio Ave., Pasig City, 1609 Metro Manila</p>
                <p><strong>Contact:</strong> 0992 375 6789 | MTDI@gmail.com</p>

                <h5 class="mt-4 fw-bold">Course Description:</h5>
                <p>
                    This course provides essential training in computer hardware,
                    software installation, troubleshooting, and basic networking. 
                    Students will learn how to assemble, maintain, and service 
                    computer systems and peripherals effectively.
                </p>

                <h5 class="mt-4 fw-bold">Requirements:</h5>
                <ul class="list-unstyled ps-3">
                    <li>• At least 18 years old</li>
                    <li>• High school graduate or equivalent</li>
                    <li>• Basic knowledge of computers</li>
                    <li>• Government-issued ID</li>
                </ul>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <img src="../css.jpg" alt="Course Image" class="img-fluid course-image shadow">
            </div>
        </div>
    </div>
</div>

</body>
</html>
