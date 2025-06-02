<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NC Finder - Course Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../Assets/style.css">
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
            <a class="navbar-brand" href="#">
                <img src="../../Assets/nc_finder_logo_transparent.png" height="40" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="courses.php">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    <a class="btn btn-light rounded-circle p-0" href="#" style="width: 44px; height: 44px;">
                        <i class="fa-solid fa-user-tie text-secondary d-block m-auto"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Course Details Section -->
    <div class="container py-5">
        <a href="FindCourse.php" class="btn btn-light-blue mb-4">← Back to Courses</a>

        <div class="course-box text-white shadow-lg rounded-4 p-4 p-md-5">
            <div class="row g-4 align-items-center">
                <!-- Left Column -->
                <div class="col-md-6">
                    <h1 class="h4 fw-bold text-white">Electronics Products Assembly and Servicing NC II</h1>
                    <p class="fw-semibold mb-1">TECHVOCH Skills Incorporated</p>
                    <p><strong>Duration:</strong> 2 months</p>
                    <p><strong>Slots Available:</strong> 7</p>
                    <p><strong>Location:</strong> 1789 Dimasalang St, 352, City Of Manila</p>
                    <p><strong>Contact:</strong> 0992 375 6789 | TECHVOCH@gmail.com</p>

                    <h5 class="mt-4 fw-bold">Course Description:</h5>
                    <p>
                        Trains learners to assemble, install, maintain, and repair electronic products using tools,
                        diagrams, safety procedures, and troubleshooting techniques.
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
                    <img src="../../Assets/COURSE_BG/epas.jpg" alt="Course Image" class="img-fluid course-image shadow">
                </div>
            </div>
        </div>
    </div>

</body>

</html>