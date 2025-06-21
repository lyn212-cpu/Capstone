<?php
session_start();
include '../../Backend/connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$success = false;
$error = "";

if (isset($_POST['register']) && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];

    $check_sql = "SELECT COUNT(*) AS total FROM registrations WHERE user_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $user_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    $already_registered = $check_result->fetch_assoc()['total'];

    if ($already_registered > 0) {
        $error = "You have already registered to a training center.";
    } else {
        $sql = "SELECT slots_available FROM nc_course WHERE course_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $course_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $course_data = $result->fetch_assoc();

        if ($course_data && $course_data['slots_available'] > 0) {
            $new_slots = $course_data['slots_available'] - 1;

            $reg_sql = "INSERT INTO registrations (user_id, course_id, registered_at) VALUES (?, ?, NOW())";
            $reg_stmt = $conn->prepare($reg_sql);
            $reg_stmt->bind_param("ii", $user_id, $course_id);
            $reg_stmt->execute();

            $update_sql = "UPDATE nc_course SET slots_available = ? WHERE course_id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ii", $new_slots, $course_id);
            $update_stmt->execute();

            $success = true;
        } else {
            $error = "Sorry, no slots available.";
        }
    }
}

if (isset($_GET['id'])) {
    $course_id = $_GET['id'];
    $sql = "SELECT * FROM nc_course WHERE course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $course = $result->fetch_assoc();
        $status = ($course['slots_available'] <= 0) ? 'Completed' : 'Ongoing';
    } else {
        echo "Course not found.";
        exit;
    }
} else {
    echo "No course ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($course['course_name']); ?> - Course Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="findcourse.php">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact_us.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_us.php">About Us</a></li>
                </ul>
                <div class="d-flex align-items-center justify-content-end p-2">
                    <div class="dropdown">
                        <a class="btn btn-light d-flex align-items-center rounded-circle p-0 border-0" href="#"
                            role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false"
                            style="width: 44px; height: 44px;">
                            <i class="fa-solid fa-user-tie text-secondary m-auto"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2 shadow" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="userProfile.php"><i class="fa fa-user me-2"></i>Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="../../include/logout.php"><i class="fa fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="course-box text-white shadow-lg rounded-4 p-4 p-md-5">
            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <h1 class="h4 fw-bold text-white"><?php echo htmlspecialchars($course['course_name']); ?></h1>
                    <p class="fw-semibold mb-1"><?php echo htmlspecialchars($course['training_center_name']); ?></p>
                    <p><strong>Duration:</strong> <?php echo htmlspecialchars($course['duration']); ?></p>
                    <p>
                        <strong>Slots Available:</strong> <?php echo htmlspecialchars($course['slots_available']); ?><br>
                        <strong>Status:</strong>
                        <span class="badge bg-<?php echo ($status === 'Completed') ? 'danger' : 'success'; ?>">
                            <?php echo $status; ?>
                        </span>
                    </p>
                    <p><strong>Start Date:</strong> <?php echo htmlspecialchars($course['start_date']); ?></p>
                    <p><strong>End Date:</strong> <?php echo htmlspecialchars($course['end_date']); ?></p>
                    <?php
                    $location_parts = [];

                    if (!empty($course['blockLot'])) $location_parts[] = $course['blockLot'];
                    if (!empty($course['street'])) $location_parts[] = $course['street'];
                    if (!empty($course['subdivision'])) $location_parts[] = $course['subdivision'];
                    if (!empty($course['barangay'])) $location_parts[] = $course['barangay'];
                    if (!empty($course['city'])) $location_parts[] = $course['city'];
                    if (!empty($course['province'])) $location_parts[] = $course['province'];
                    if (!empty($course['zipCode'])) $location_parts[] = $course['zipCode'];

                    $location_display = !empty($location_parts)
                        ? implode(', ', $location_parts)
                        : ($course['location'] ?? '');
                    ?>

                    <p><strong>Location:</strong> <?php echo htmlspecialchars($location_display); ?></p>
                    <p><strong>Contact:</strong> <?php echo htmlspecialchars($course['contact_info']); ?></p>
                    <h5 class="mt-4 fw-bold">Course Description:</h5>
                    <p><?php echo nl2br(htmlspecialchars($course['course_description'])); ?></p>
                    <h5 class="mt-4 fw-bold">Requirements:</h5>
                    <ul class="list-unstyled ps-3">
                        <?php
                        $requirements = explode("\n", $course['requirements']);
                        foreach ($requirements as $req) {
                            echo '<li>• ' . htmlspecialchars(trim($req)) . '</li>';
                        }
                        ?>
                    </ul>
                    <?php if ($course['slots_available'] > 0): ?>
                        <form method="POST">
                            <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                            <button type="submit" name="register" class="btn btn-success mt-3">Register</button>
                        </form>
                    <?php else: ?>
                        <p class="mt-3 text-warning">No slots available</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo htmlspecialchars($course['image'] ?? '../css.jpg'); ?>" alt="Course Image" class="img-fluid course-image shadow">
                </div>
            </div>
        </div>
    </div>

    <?php if ($success): ?>
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="successModalLabel">Registration Successful</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        You have successfully registered for <strong><?php echo htmlspecialchars($course['course_name']); ?></strong> at <strong><?php echo htmlspecialchars($course['training_center_name']); ?></strong>.
                    </div>
                    <div class="modal-footer">
                        <a href="../index.php" class="btn btn-success">Go to Home</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const modal = new bootstrap.Modal(document.getElementById('successModal'));
            window.onload = () => modal.show();
        </script>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-danger">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="errorModalLabel">Registration Failed</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            window.onload = () => errorModal.show();
        </script>
    <?php endif; ?>
</body>

</html>