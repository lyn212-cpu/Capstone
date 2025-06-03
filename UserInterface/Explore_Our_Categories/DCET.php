<?php
    // Place this PHP block before your HTML or at the top of the file
    $conn = new mysqli("localhost", "root", "", "nc_finder");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Fetch the first center_name as an example
    $sql = "SELECT center_name FROM training_center LIMIT 1";
    $result = $conn->query($sql);
    $center = $result && $result->num_rows > 0 ? $result->fetch_assoc() : null;
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
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <title>DCET</title>
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
                            <a style="color: #190960" class="nav-link fw-bold" href="../pages/FindCourse.php">Courses</a>
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
                                <li><a class="dropdown-item" href="./userProfile.php"><i
                                            class="fa fa-user me-2"></i>Profile</a></li>
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

    <div class="container-fluid py-4">
        <!-- Header and Search -->
        <div class="text-center mb-4">
            <div class="d-flex justify-content-center align-items-center mb-2">
                <i class="fas fa-desktop fa-2x text-primary me-2"></i>
                <h2 class="fw-bold mb-0">Diploma in Computer Engineering Technology</h2>
            </div>
            <div class="input-group mt-3 w-50 mx-auto">
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn btn-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <!-- Cards -->
        <div class="row g-3">
            <?php
            // Fetch all training centers from the database
            $sql = "SELECT center_name, available_courses, location, contact_info FROM Training_Center";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <a href="../pages/tesda_training_Center_Info.php" class="card-title text-primary fw-bold">
                            <?php echo htmlspecialchars($row['center_name']); ?>
                        </a>
                        <p class="mb-1 text-muted small">
                            <?php echo htmlspecialchars($row['available_courses']); ?>
                        </p>
                        <p class="mb-1">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <?php echo htmlspecialchars($row['location']); ?>
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-phone me-2"></i>
                            <?php echo htmlspecialchars($row['contact_info']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            else:
            ?>
            <div class="col-12">
                <div class="alert alert-warning">No training centers found.</div>
            </div>
            <?php endif; ?>
        </div>
    </div>




</body>

</html>