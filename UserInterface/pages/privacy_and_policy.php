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
    <title>Privacy Policy</title>

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
        }

        h2 {
            font-weight: 700;
        }
    </style>
</head>

<body>
    <header>
        <!-- your navbar code here (unchanged) -->
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
            <h2 class="text-center mb-4">Privacy Policy</h2>
            <p>
                At NC Finder, we prioritize your privacy and are committed to protecting your personal information. When
                you visit our website, we may collect data such as your name, email address, and phone number if you
                provide it through registration forms, inquiries, or feedback submissions.
            </p>

            <p>
                We also gather usage data like your IP address, browser type, and pages visited to improve our website’s
                performance. To enhance your browsing experience, we use cookies that remember your preferences.
            </p>

            <p>
                Your information is used solely to provide and improve our services, personalize your experience, and
                respond to inquiries. We implement security measures such as data encryption and regular audits to
                protect your information, but we also encourage you to maintain strong passwords for added safety.
            </p>

            <p>
                While we do not sell or rent your data, we may share it with trusted third-party services for analytics,
                hosting, or communication purposes. You have the right to access, update, or request the deletion of
                your data by contacting us.
            </p>

            <p>
                Our website may contain links to external sites, and we advise you to review their privacy policies as
                we are not responsible for their practices. We retain your data only as long as necessary and may update
                this Privacy Policy when needed.
            </p>
        </div>
    </main>

    <footer>
        <?php include_once '../../include/footer.php'; ?>
    </footer>
</body>

</html>
