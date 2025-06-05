<?php
session_start();
include '../../Backend/connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Sign_in.php");
    exit();
}
?>
<!-- Modern Contact Us Page -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Assets/style.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-image: url("../../Assets/BACKGROUND/blur_1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .team-avatar {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ffffff33;
            transition: transform 0.3s;
        }

        .team-avatar:hover {
            transform: scale(1.05);
        }

        .text-shadow-light {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        section.container {
            background-color: #fff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
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

<!-- CONTACT CARD -->
<section class="container my-5 py-5 rounded-4 shadow" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
    <div class="p-4 text-white">
        <h3 class="mb-4 fw-bold text-center text-shadow-light">Connect with Us!</h3>
        <div class="text-center fs-4">
            <p><i class="fa fa-envelope me-2 text-info"></i>
                <a href="mailto:ncfinder01@gmail.com" class="text-white text-decoration-none fs-4">ncfinder01@gmail.com</a>
            </p>
            <p><i class="fa fa-map-marker-alt me-2 text-danger fs-4"></i> PUP Sta. Mesa, Manila</p>
            <p><i class="fab fa-facebook me-2 text-primary fs-4"></i> Nc Finder</p>
        </div>
    </div>
</section>


<!-- OUR TEAM -->
<section class="container my-5 py-5 rounded-4 shadow" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
    <h2 class="text-center fw-bold text-white mb-5">Meet Our Team</h2>
    <div class="row justify-content-center g-5">

        <?php
        $team = [
            ['img' => 'Ramon,%20Jefte.jpeg', 'name' => 'Ramon, Jefte Jr.', 'role' => 'Project Manager'],
            ['img' => 'De%20Asis,%20Rhea%20Lyn.jpg', 'name' => 'De Asis, Rhea Lyn', 'role' => 'Back-end Developer'],
            ['img' => 'Cadorna,%20Jade.jpg', 'name' => 'Cadorna, Jade', 'role' => 'UI/UX'],
            ['img' => 'Cruz,%20Ronn.jpg', 'name' => 'Cruz, Ronn Andrei', 'role' => 'Front-end Developer'],
            ['img' => 'Malasaga,Merlyn.jpg', 'name' => 'Malasaga, Merlyn', 'role' => 'Front-end Developer'],
            ['img' => 'Potolin,%20Shahad.JPG', 'name' => 'Potolin, Shahad', 'role' => 'Dev OPS'],
            ['img' => 'Donato,%20Hans.jpg', 'name' => 'Donato, Kenneth Hans', 'role' => 'Back-end Developer'],
            ['img' => 'Rayo,%20Kim.jpg', 'name' => 'Rayo, Kimberly', 'role' => 'Quality Assurance'],
        ];

        foreach ($team as $member) {
            echo '
            <div class="col-6 col-sm-4 col-md-3 text-center">
                <img src="../../Assets/FORMAL_PICTURES/' . $member['img'] . '" 
                     class="rounded-circle mb-3 shadow" 
                     style="width: 120px; height: 120px; object-fit: cover; border: 3px solid rgba(255,255,255,0.3);" 
                     alt="' . $member['name'] . '">
                <h5 class="fw-semibold text-white mb-1">' . $member['name'] . '</h5>
                <p class="text-white-50 small mb-0">' . $member['role'] . '</p>
            </div>';
        }
        ?>

    </div>
</section>

<!-- FOOTER -->
<div>
    <?php include_once '../../include/footer.php'; ?>
</div>

</body>

</html>
