<?php
include '../../Backend/connect.php';

// Fetch courses from the database
$sql = "SELECT * FROM nc_course";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Find Courses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/find_course.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact_us.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_us.php">About Us</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    <a class="btn btn-light rounded-circle p-0" href="#" style="width: 44px; height: 44px;">
                        <i class="fa-solid fa-user-tie text-secondary d-block m-auto"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <div class="container mt-5">
        <!-- Header Row -->
        <div class="main-header">
            <h2>Find Courses</h2>
            <div class="search-bar">
                <input type="text" id="courseSearch" placeholder="Search courses...">
            </div>
        </div>

        <?php
        $courseAssets = [
            'Computer System Servicing NC II' => [
                'img' => '../../Assets/COURSE_BG/css.jpg',
                'details' => 'course_detailsCSS.php'
            ],
            'Technical Drafting NC II' => [
                'img' => '../../Assets/COURSE_BG/TD.jpg',
                'details' => 'course_detailsTD.php'
            ],
            'Electronics Products Assembly NC II' => [
                'img' => 'EPAS.jpg',
                'details' => 'course_detailsEPAS.php'
            ],
            'Java Programming NC III' => [
                'img' => 'JAVA.jpg',
                'details' => 'course_detailsJAVA.php'
            ],
            'Mechatronics Servicing NC III' => [
                'img' => 'MCS.jpg',
                'details' => 'course_detailsMS.php'
            ],
            'Automotive Servicing NC II' => [
                'img' => 'AMS.jpg',
                'details' => 'course_detailsAMS.php'
            ],
            'Shielded Metal Arc Welding NC II' => [
                'img' => 'SMAW.jpg',
                'details' => 'course_detailsSMAW.php'
            ],
            'Event Management Services NC III' => [
                'img' => 'EMS.jpg',
                'details' => 'course_detailsEMS.php'
            ],
            // Add more courses as needed
        ];
        ?>
        <!-- Course Section -->
        <div class="courses-wrapper">
            <h4>Courses</h4>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" id="coursesRow">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="../../Assets/COURSE_BG/css.jpg" class="card-img-top" alt="Course Image">
                                <div class="card-body">
                                    <div>
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['course_name']); ?></h5>
                                        <p><?php echo htmlspecialchars($row['training_center_name']); ?></p>
                                        <p>Duration: <?php echo htmlspecialchars($row['duration']); ?></p>
                                        <p>Slots available: <?php echo htmlspecialchars($row['slots_available']); ?></p>
                                    </div>
                                    <a href="course_detailsCSS.php?id=<?php echo $row['course_id']; ?>"
                                        class="btn btn-view btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col">
                        <div class="alert alert-info w-100">No courses found.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

</body>

</html>

<script>
    document.getElementById('courseSearch').addEventListener('input', function () {
        const search = this.value.toLowerCase();
        const cards = document.querySelectorAll('#coursesRow .col');
        cards.forEach(card => {
            const title = card.querySelector('.card-title').textContent.toLowerCase();
            if (title.includes(search)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>