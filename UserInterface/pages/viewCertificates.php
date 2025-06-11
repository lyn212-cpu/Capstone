<?php
session_start();
include '../../Backend/connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Sign_in.php");
    exit();
}

// Fetch user data once
$id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = ($result->num_rows > 0) ? $result->fetch_assoc() : null;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/Dashboard.css">
    <link rel="stylesheet" href="../../Assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <title>Profile</title>
</head>

<body>
    <nav id="collapseExample" class="d-flex flex-column"
        style="background-color: #190960; min-width: 230px; min-height: 100vh; height: auto;">
        <div class="text-light d-flex flex-column justify-content-center align-items-center p-2 gap-3">
            <picture class="p-2 bg-light-subtle rounded-circle">
                <img width="50" height="50" src="https://img.icons8.com/ios/50/administrator-male--v1.png"
                    alt="administrator-male--v1" />
            </picture>
            <div>
                <?php
                if ($user) {
                    echo "<h5 class=''>" . htmlspecialchars($user['full_name']) . "</h5>";
                } else {
                    echo "<h5 class=''>User not found</h5>";
                }
                ?>
            </div>
        </div>
        <!-- SideBar--------------------------------------------------------------->
        <div class="d-flex flex-column justify-content-center mt-5">
            <ul class="">
                <li class="nav-item  p-2 mb-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-gauge text-light"></i>
                    <a class="nav-link active  text-light" aria-current="page" href="./userProfile.php">Profile</a>
                </li>
                <li class="nav-item  p-2 mb-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-bookmark text-light"></i>
                    <a class="nav-link active  text-light" aria-current="page"
                        href="./viewCertificates.php">Certificates</a>
                </li>
                <li class="nav-item  p-2 mb-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-school-circle-check text-light"></i>
                    <a class="nav-link active text-light" aria-current="page" href="./centeAttended.php">Centers
                        Attended</a>
                </li>
                <li class="nav-item  p-2 mb-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-comment text-light"></i>
                    <a class="nav-link active  text-light" aria-current="page" href="./myFeedback.php">My FeedBack</a>
                </li>
            </ul>
        </div>
        <!-- SideBar--------------------------------------------------------------->
        <div class="d-flex justify-content-evenly align-items-center p-2">
            <!-- Logout Button -->
            <button class="btn text-light bg-danger p-2 rounded-5 col-lg-9 text-center bg-opacity-75"
                data-bs-toggle="modal" data-bs-target="#logoutModal">
                Logout
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </button>
        </div>


        <!-- Logout Confirmation Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to log out?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="login.php" class="btn btn-danger">Logout</a> <!-- Redirects to login.php -->
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="container-fluid d-flex flex-column gap-3 p-2">
        <header class="shadow-sm border-bottom border-2 rounded-3 p-2 d-flex gap-3  align-items-center">
            <div class="d-flex gap-3">
                <button class="btn" type="button" id="btn_menu">
                    <img style="height: 20px; width: 20px" src="../../Assets/menu.png" alt="menu">
                </button>

                <nav class="navbar navbar-expand-lg bg-transparent sticky-top">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
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
                                    <a style="color: #190960" class="nav-link fw-bold" href="./contact_us.php">Contact
                                        Us</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: #190960" class="nav-link fw-bold" href="about_us.php">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>


        <div class="card p-4 shadow-sm mb-4">
            <h5 class="card-title mb-3">Upload New Certificate</h5>
            <form action="upload_certificate.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="certificate_name" class="form-label">Certificate Name</label>
                    <input type="text" name="certificate_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="certificate_file" class="form-label">Upload Certificate (Image or PDF)</label>
                    <input type="file" name="certificate_file" class="form-control" accept=".jpg, .jpeg, .png, .pdf" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>


        <?php
        $stmt = $conn->prepare("SELECT * FROM certificates WHERE user_id = ?");
        $stmt->bind_param("i", $id); // Fixed this line
        $stmt->execute();
        $certificates = $stmt->get_result();

        if ($certificates->num_rows > 0): ?>
            <div class="row g-4">
                <?php while ($cert = $certificates->fetch_assoc()):
                    $file_path = "../../" . $cert['file_path'];
                    $is_image = preg_match('/\.(jpg|jpeg|png)$/i', $file_path);
                ?>
                    <div class="col-md-4 col-lg-3">
                        <div class="card shadow-sm h-100">
                            <?php if ($is_image): ?>
                                <a href="<?php echo htmlspecialchars($file_path); ?>" target="_blank">
                                    <img src="<?php echo htmlspecialchars($file_path); ?>"
                                        class="card-img-top img-fluid"
                                        alt="<?php echo htmlspecialchars($cert['certificate_name']); ?>"
                                        style="height: 200px; object-fit: cover;">
                                </a>

                            <?php else: ?>
                                <div class="card-body d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <a href="<?php echo htmlspecialchars($file_path); ?>" target="_blank" class="btn btn-outline-primary">
                                        View PDF
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="card-body text-center">
                                <h6 class="card-title mb-1"><?php echo htmlspecialchars($cert['certificate_name']); ?></h6>
                                <span class="badge bg-secondary"><?php echo ucfirst($cert['status']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-muted text-center">No certificates uploaded yet.</p>
        <?php endif; ?>


        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>

    <script src="../../JS_CSS_Admin/js_dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>