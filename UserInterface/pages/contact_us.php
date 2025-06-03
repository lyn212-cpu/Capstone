<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../../Assets/style.css">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <title>Contact Us</title>
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }

    body {
      display: flex;
      flex-direction: column;
      background-image: url("../../Assets/background/raw 2.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    main {
      flex: 1;
    }

    .navbar {
      background-color: #ffffff !important;
    }

    .card {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(3.3px);
      -webkit-backdrop-filter: blur(3.3px);
      border: 1px solid rgba(255, 255, 255, 0.07);
    }

    .team-member {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid white;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>
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
            <li class="nav-item"><a class="nav-link" href="FindCourse.php">Courses</a></li>
            <li class="nav-item"><a class="nav-link active" href="contact_us.php">Contact Us</a></li>
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
  </header>

  <main>
    <!-- Contact info -->
    <section class="container mt-5">
      <div class="card bg-white p-4 mb-5 rounded">
        <div class="card-body">
          <h3 class="card-title fw-bold text-primary mb-3">Connect with Us!</h3>
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-instagram me-2 text-primary"></i>
            <a href="mailto:ncfinder01@gmail.com" class="text-decoration-none text-dark fw-semibold">ncfinder01@gmail.com</a>
          </div>
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-geo-alt-fill me-2 text-primary"></i>
            <span>PUP Sta. Mesa, Manila</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-facebook me-2 text-primary"></i>
            <span class="fw-semibold">Nc Finder</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Team -->
    <section class="py-5">
      <div class="container text-center">
        <h3 class="fw-bold text-white mb-4">Our Team:</h3>
        <div class="row justify-content-center g-4">
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="../../Assets/FORMAL_PICTURES/Ramon,%20Jefte.jpeg" class="team-member" alt="Jefte">
            <h5 class="mt-2 text-white">Ramon, Jefte Jr.</h5>
            <h6 class="text-white">Project Manager</h6>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="../../Assets/FORMAL_PICTURES/De%20Asis,%20Rhea%20Lyn.jpg" class="team-member" alt="Rhea">
            <h5 class="mt-2 text-white">De Asis, Rhea Lyn</h5>
            <h6 class="text-white">Backend Developer</h6>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="../../Assets/FORMAL_PICTURES/Cadorna,%20Jade.jpg" class="team-member" alt="Jade">
            <h5 class="mt-2 text-white">Cadorna, Jade</h5>
            <h6 class="text-white">Front-end Developer</h6>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="../../Assets/FORMAL_PICTURES/Cruz,%20Ronn.jpg" class="team-member" alt="Ronn">
            <h5 class="mt-2 text-white">Cruz, Ronn Andrei</h5>
            <h6 class="text-white">Front-end Developer</h6>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="../../Assets/FORMAL_PICTURES/Malasaga,Merlyn.jpg" class="team-member" alt="Merlyn">
            <h5 class="mt-2 text-white">Malasaga, Merlyn</h5>
            <h6 class="text-white">Front-end Developer</h6>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="../../Assets/FORMAL_PICTURES/Potolin,%20Shahad.JPG" class="team-member" alt="Shahad">
            <h5 class="mt-2 text-white">Potolin, Shahad</h5>
            <h6 class="text-white">Coordinator</h6>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="../../Assets/FORMAL_PICTURES/Donato,%20Hans.jpg" class="team-member" alt="Hans">
            <h5 class="mt-2 text-white">Donato, Kenneth Hans</h5>
            <h6 class="text-white">Coordinator</h6>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <img src="../../Assets/FORMAL_PICTURES/Rayo,%20Kim.jpg" class="team-member" alt="Kimberly">
            <h5 class="mt-2 text-white">Rayo, Kimberly</h5>
            <h6 class="text-white">Quality Assurance</h6>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="w-100 mt-auto">
    <?php include_once '../../include/footer.php'; ?>
  </footer>
</body>
</html>
