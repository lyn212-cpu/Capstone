<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Assets/style.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Terms and Conditions</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Work+Sans:wght@300;400;500;600;700&display=swap");

        html, body {
            height: 100%;
            margin: 0;
            font-family: "Work Sans", sans-serif;
            background: url("../../Assets/BACKGROUND/raw_2.jpg") no-repeat center center / cover;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        footer {
            flex-shrink: 0;
        }

        .card {
            background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85));
            backdrop-filter: blur(4px);
            color: #1a1a1a;
            border-radius: 16px;
            padding: 40px;
            max-width: 800px;
            width: 100%;
            font-size: 1.1rem; /* Increased from 0.95rem */
        }

        h2 {
            font-weight: 700;
        }

        ol {
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
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
                    <ul class="navbar-nav me-auto justify-content-end mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link fw-bold" style="color: #190960;" href="../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold" style="color: #190960;" href="./FindCourse.php">Courses</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold" style="color: #190960;" href="contact_us.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link fw-bold" style="color: #190960;" href="./about_us.php">About Us</a></li>
                    </ul>
                    <div class="d-flex align-items-center justify-content-end p-2">
                        <div class="dropdown">
                            <a class="btn btn-light d-flex align-items-center rounded-circle p-0 border-0" href="#"
                                role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false"
                                style="width: 44px; height: 44px;">
                                <i class="fa-solid fa-user-tie text-secondary m-auto"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mt-2 shadow" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="./userProfile.php"><i class="fa fa-user me-2"></i>Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="fa fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="card">
            <h2 class="text-center mb-4">Terms and Conditions</h2>
            <ol>
                <li><strong>Acceptance of Terms:</strong> By accessing or using the NC Finder website, you agree to be bound by these Terms and Conditions and our Privacy Policy.</li>
                <li><strong>Use of the Website:</strong> You agree to use the website only for lawful purposes and in a way that does not infringe the rights of others or restrict their use of the site.</li>
                <li><strong>Intellectual Property:</strong> All content and materials on this website, including text, graphics, logos, and software, are the property of NC Finder and are protected by intellectual property laws.</li>
                <li><strong>Disclaimer:</strong> The content on this website is provided for general information purposes only. We do not guarantee the accuracy or completeness of any information on the site.</li>
                <li><strong>Changes to Terms:</strong> We reserve the right to modify these Terms and Conditions at any time. Any changes will be posted on this page, and your continued use of the site constitutes acceptance of those changes.</li>
            </ol>
        </div>
    </main>

    <footer>
        <?php include_once '../../include/footer.php'; ?>
    </footer>
</body>

</html>
