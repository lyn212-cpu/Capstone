<?php
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "nc_finder");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Fetch all courses under the department "Diploma in Office Management Technology"
    $sql = "SELECT course_id, course_name, training_center_name, department, duration, slots_available, blockLot, street, subdivision, barangay, city, province, zipCode, contact_info, course_description, requirements 
            FROM nc_course 
            WHERE department LIKE '%Diploma in Office Management Technology%' AND status = 'approved'";
    $result = $conn->query($sql);
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
    <title>Diploma in Office Management Technology Courses</title>
    <style>
        .course-card {
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            transition: box-shadow 0.2s;
        }
        .course-card:hover {
            box-shadow: 0 4px 24px rgba(25,9,96,0.08);
        }
        .course-title a {
            color: #190960;
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: none;
        }
        .course-meta {
            font-size: 0.95rem;
        }
        .course-label {
            font-weight: 500;
            color: #555;
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

    <div class="container py-4">
        <!-- Header and Search -->
        <div class="text-center mb-4">
            <div class="d-flex justify-content-center align-items-center mb-2">
                <i class="fas fa-briefcase fa-2x text-primary me-2"></i>
                <h2 class="fw-bold mb-0">Diploma in Office Management Technology Courses</h2>
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
            if ($result && $result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="card course-card shadow-sm h-100">
                    <div class="card-body">
                        <div class="course-title mb-2">
                            <a href="../pages/course_details.php?id=<?php echo urlencode($row['course_id']); ?>">
                                <?php echo htmlspecialchars($row['course_name']); ?>
                            </a>
                        </div>
                        <div class="course-meta mb-1">
                            <span class="course-label">Training Center:</span>
                            <?php echo htmlspecialchars($row['training_center_name']); ?>
                        </div>
                        <div class="course-meta mb-1">
                            <span class="course-label">Duration:</span>
                            <?php echo htmlspecialchars($row['duration']); ?> days
                        </div>
                        <div class="course-meta mb-1">
                            <span class="course-label">Slots Available:</span>
                            <?php echo htmlspecialchars($row['slots_available']); ?>
                        </div>
                        <div class="course-meta mb-1">
                            <span class="course-label"><i class="fas fa-map-marker-alt me-1"></i>Location:</span>
                            <?php
                                $location = [
                                    $row['blockLot'],
                                    $row['street'],
                                    $row['subdivision'],
                                    $row['barangay'],
                                    $row['city'],
                                    $row['province'],
                                    $row['zipCode']
                                ];
                                echo htmlspecialchars(implode(', ', array_filter($location)));
                            ?>
                        </div>
                        <div class="course-meta mb-1">
                            <span class="course-label"><i class="fas fa-phone me-1"></i>Contact:</span>
                            <?php echo htmlspecialchars($row['contact_info']); ?>
                        </div>
                        <div class="course-meta">
                            <span class="course-label">Description:</span>
                            <?php echo htmlspecialchars($row['course_description']); ?>
                        </div>
                        <div class="course-meta">
                            <span class="course-label">Requirements:</span>
                            <?php echo htmlspecialchars($row['requirements']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            else:
            ?>
            <div class="col-12">
                <div class="alert alert-warning">No courses found for this department.</div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>