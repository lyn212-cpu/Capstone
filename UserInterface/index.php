<?php
session_start();
include '../Backend/connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: Sign_in.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../Assets/nc_finder_logo_transparent.png" alt="avatar">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto justify-content-end  mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a style="color: #190960" class="nav-link fw-bold" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #190960" class="nav-link fw-bold" href="#">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #190960" class="nav-link fw-bold" href="./pages/contact_us.php">Contact
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #190960" class="nav-link fw-bold" href="#About_us">About us</a>
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
                                <li><a class="dropdown-item" href="./pages/userProfile.php"><i
                                            class="fa fa-user me-2"></i>Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="Sign_In.php"><i
                                            class="fa fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Hero Section -->
    <section id="hero_section"
        class="container-fluid d-flex align-items-center justify-content-center text-center text-white">
        <div class="p-4 p-lg-5">
            <h1 class="fw-bold display-5 display-md-4">
                Connecting You to <br>
                <span style="color: #190075;">Quality Education and Training Opportunities</span>
            </h1>
            <p class="mt-3 fs-5">
                Advance your career with TESDA's accredited courses. Gain the skills that matter.
            </p>
            <div class="mt-4 d-flex flex-column flex-sm-row justify-content-center gap-3">
                <a href="pages/FindCourse.php" class="btn btn-primary px-4 py-2 fw-semibold"
                    style="background-color: #190960; border: none;">
                    Find Course
                </a>
                <button class="btn btn-light px-4 py-2 fw-semibold">
                    Watch Video
                    <i class="fa-solid fa-play ms-2" style="color: #190960;"></i>
                </button>
            </div>
        </div>
    </section>

    <div class="text-center p-5">
        <h1 class="fw-bold">
            Explore
            Our Categories
        </h1>
    </div>
    <!-- categories Section  -->
    <section
        class="container-fluid category-section justify-content-center align-items-center row gap-3 text-center p-3">
        <!--  category card start  -->
        <a href="Explore_Our_Categories/DCET.php" class="card col-lg-2">
            <div class="p-2">
                <svg width="73" height="73" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="64" height="64" fill="url(#pattern0_133_20)" />
                    <defs>
                        <pattern id="pattern0_133_20" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_133_20" transform="scale(0.015625)" />
                        </pattern>
                        <image id="image0_133_20" width="64" height="64"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    Diploma in Computer Engineering Technology
                </h5>
            </div>
        </a>
        <!--  category card end  -->

        <!--  category card start  -->
        <a href="Explore_Our_Categories/DECET.php" class="card col-lg-2">
            <div class="p-2">
                <svg width="73" height="73" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="64" height="64" fill="url(#pattern0_133_23)" />
                    <defs>
                        <pattern id="pattern0_133_23" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_133_23" transform="scale(0.015625)" />
                        </pattern>
                        <image id="image0_133_23" width="64" height="64"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    Diploma in Electronics Engineering Technology
                </h5>
            </div>
        </a>
        <!--  category card end  -->

        <!--  category card start  -->
        <a href="Explore_Our_Categories/DIT.php" class="card col-lg-2">
            <div class="p-2">
                <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="73" height="73" fill="url(#pattern0_133_29)" />
                    <defs>
                        <pattern id="pattern0_133_29" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_133_29" transform="scale(0.015625)" />
                        </pattern>
                        <image id="image0_133_29" width="64" height="64"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    Diploma in Information Technology
                </h5>
            </div>
        </a>
        <!--  category card end  -->

        <!--  category card start  -->
        <a href="Explore_Our_Categories/DCVET.php" class="card col-lg-2">
            <div class="p-2">
                <svg width="73" height="73" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="73" height="73" fill="url(#pattern0_133_19)" />
                    <defs>
                        <pattern id="pattern0_133_19" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_133_19" transform="scale(0.015625)" />
                        </pattern>
                        <image id="image0_133_19" width="64" height="64"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    Diploma in Civil Engineering Technology
                </h5>
            </div>
            </>
            <!--  category card end  -->

            <!--  category card start  -->
            <a href="Explore_Our_Categories/DEET.php" class="card col-lg-2">
                <div class="p-2">
                    <svg width="73" height="73" viewBox="0 0 86 86" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="86" height="86" fill="url(#pattern0_133_26)" />
                        <defs>
                            <pattern id="pattern0_133_26" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_133_26" transform="scale(0.015625)" />
                            </pattern>
                            <image id="image0_133_26" width="64" height="64"
                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAACCVJREFUeJztmn2MVFcVwH/nzezShVqWeTMsCybgR61L2oiW0EqN2qSWViO0ln6IaLDIxzKz2wTbQqzihrQQ29DC7gwrUYGmJioqa21jsPUPTWz9RLCpldaqFIECO292l8XCzsc7/jHbZXbfmw+Y9wYa+SWT3XvOveeed2bufffjwCX+vxFvzOwKMDF5xUhxoLUfRL2x7S+GJ1bME8sJ2qmRT7j7057YrQHeBAAWjiqpfYdHdn2n+iEwpTNCxjgKBAukFpPsabzePlS1fZ+pLADhrkWoXE2aTQzGrLxsWzNkF6H2EpCrXVr9CdhB1vghA6v6ADC7p0F2LejTWO2/8uYRqqN8AMyuxSA7gQBwEkgAlwPLgMsq6OMk6FaQCQVtToM9/2IIQukAmPHrgBfIP7zXnCZHC/2xN87bghlvRbWeVNsWV31ky5XYwdVo7hFS7YfdqpSeBBvSL4GeKFEji8iPEVaAfR1izEaMT4K0gT4HFH8VKq/RHz1Usv/yrEHkoaJa27gFdCVi3FisSrCYAoDDq09jdm0EOp1K3U2W+xmI/dul5W+AOGaiBfS7wFxHDdEOD9YKgpT4FSvGsLboF13+NWgYO3B+k1/Dii1koM3t4c9iRf+ONfnjoPExmpNYsafL9l0DygfAZiGFc4XoE1ixjZV/e3flsGLtwJNA3/AnR2jrR8/DX88pPQQA0DUFhb0krQfPvRtRLJacezv/KR2ASGIWtn5wpKy6ETqyrnVDne9GjGtRrffMO4MhNLgXq/WIZzbH4B6AqdvGcyZ9K7auHZEJSaymn7nWD8eXo8SBOsSj/RUMzzy5NKGulaTadnhn+CzOOcBMrGUo04vIT4DZBc7shbtyjvpNj01A6QTq/HAQqEckzowdlSy6zhmXSVCvAca71H3d1UJ6wvuAcV465cJ4Bt96jx+GK98NapHhElSvdpRl+venH5eHksOgNmODIzRXZlJfJl1/I0bOOVwqxQ4EqM/8FrjKVW8mvgT2F4AmlCBmfA/KLlKx7Xl99zTE3oTykeGJZA1m/BOk6x5kcEWy0JQzAFZ0DWZ3J9i3g64CWoY1N0CHAR12SefV6BvbyXlhxvtd5VM6I2R0O0jh/mQewqcIdT6XX/Pn1qPcXaBvAVoYl+ljkK8WmnP/WVmtR7CicZSlhS4Ritx0fk/jIZlAGPfNmYFhTAZAtcm1rTLF2agUqejvgYMjZdFvVurnO4UyE4so6OMFgrmY8TVFq78DKb8UzmWfIlBXuBvcgBk/hhV70rW+6GTC8Q8QMNxXjJWQs4PYRLw6sy5F+QAE6m8bsxk0gJ2Eum4gZa10aXEVyqtkS8+VZanBw0PZIbCtDtVvuKpEljG12ZfVWS0pHYBJ6TkI762RLxeE0gHoa3sBkfsLJBny+/qfAlX+xi8Oys8ByegmQnFF9EMEdD0n2v8JQKhzJkcnDRHp9dtHX6ngQARIxR53ytpfyf+TqLSvfpQ9GPoqKilEQyAtKLcAV5Rt7ROVBaAq9E1EOkjW7YAVGae+ox4zvAxYB0z235/R+B2AFwkGb+d46+ij9UjicnLMJbXqeZA0FgnCXT2o9ABzfPZpFP5tZZX9BE/f7Hh4Ogxs/T6iv8RM/DW/s9sVINl2FGm4CfRl33xywa8ADFFn3MHxB/7r0JjhDcCC4dI1oNsxT8wHILl0ELiT/NumJvgUAPk2x1f9yyE2418ECvcSb4EuxIr1jEistgMo2/3xy4k/ATDY6ZCFEnOB7xRILGyZh9XmctBqO9v7hB8B6KU3un+UpDE+HdHdjDo7lEOIziaSmJU/aCkglfojMOCDbw58CIA4b2GDfB2IjBbqhxGewNZ9mOFjwzfRw3TYoP/x3jcnPgRAzzhEydgy0nVNqN6DsGeMdgDhXqzYH0aLpSbZJX4MAffD08EVSVJtP0JJF0hfQZhDMvZsxXYM+ih27Z4NpAAQo8/dNU05zXnPdMJdU101+Ylw/nCpB2m4nmTsNUe9xu4ZgLuN3ugxlNXAn4Es+U3ZXmAt/a0HATCy64Hngbev1A6h/AI1Hh1rzo+VoKCyEPecgo15h3UdVmxD0RvmYO7OEqkVkIptBjZjxt9AGE8yNnuUvve+fwA3E+q6D5HNwDpS7idYPq0DdC1Nj00YJQpv/QzCLOBzWG2PFH348PfehY4+uvYTvxZCzeQaNp8tdxio/XkMubZsYoSe2Qq4H2v7gJ97ga9gJh4GFWZMr8eQlfRG3e8XAegwCMUfBV3sm08u+Hyvpw9hJnroO9VMb/RU0WqRxPsJR55FeMBff5zU4DyABQTlVsKJHrB/DnKAjPZRFwih9kxgPrYuwL/r9ZLUIgAA9ajeDZK/rwvK8P3rhaf6IZC2a7JmB3/6qT4AA7GD5BcifvK7Ypme1eLBEBBFtn0WzWwArkcZnSQlNAETgCMozvW9cBn5Vd8plBNjdEOIvIiRKZ4NWiXezAHJFW8CX3bVmYmnQBejzCMV+5tDn89E2wfsIhVb6jTgL7VJb7mIqdVboBTHhv9+jHD8HmytMLVGJgLNKAeq6fzCB6A3egwzvhNYgvKDc8wztBH5VjXdX/gAAFjRewlv3Y3qzIrbKBkMfk0y+pdquvY/AGqfRgQMbSheSZQkzwDPeNq3GA2gIFr0mN3/SVBkHwA2yx2Hn37S+EQj6CIAcsGXilXzPw9j6rbxDGX3g14JHAJxngB5jgaBWUAjsB2r+Ou1NokokcQUVLeg3AZ4l01emhRCnGTdw+6XsnlqlInzNipM7G70vZu6cdnha7ZLXKIM/wPijZPq7uYklgAAAABJRU5ErkJggg==" />
                        </defs>
                    </svg>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        Diploma in Electrical Engineering Technology
                    </h5>
                </div>
            </a>
            <!--  category card end  -->

            <!--  category card start  -->
            <a href="Explore_Our_Categories/DMET.php" class="card col-lg-2">
                <div class="p-2">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="64" height="64" fill="url(#pattern0_133_32)" />
                        <defs>
                            <pattern id="pattern0_133_32" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_133_32" transform="scale(0.015625)" />
                            </pattern>
                            <image id="image0_133_32" width="64" height="64"
                                xlink:href="data:image/png;base64,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" />
                        </defs>
                    </svg>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        Diploma in Mechanical Engineering technology
                    </h5>
                </div>
            </a>
            <!--  category card end  -->

            <!--  category card start  -->
            <a href="Explore_Our_Categories/DOMT.php" class="card col-lg-2">
                <div class="p-2">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="64" height="64" fill="url(#pattern0_137_35)" />
                        <defs>
                            <pattern id="pattern0_137_35" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_137_35" transform="scale(0.015625)" />
                            </pattern>
                            <image id="image0_137_35" width="64" height="64"
                                xlink:href="data:image/png;base64,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" />
                        </defs>
                    </svg>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        Diploma in Office Management Technology
                    </h5>
                </div>
            </a>
            <!--  category card end  -->

            <!--  category card start  -->
            <a href="Explore_Our_Categories/DRET.php" class="card col-lg-2">
                <div class="p-2">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="64" height="64" fill="url(#pattern0_137_36)" />
                        <defs>
                            <pattern id="pattern0_137_36" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_137_36" transform="scale(0.015625)" />
                            </pattern>
                            <image id="image0_137_36" width="64" height="64"
                                xlink:href="data:image/png;base64,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" />
                        </defs>
                    </svg>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        Diploma in Railway Engineering Technology
                    </h5>
                </div>
            </a>
            <!--  category card end  -->
    </section>

    <!--  Training Center  -->
    <section id="topTraining"
        class="container-fluid d-flex flex-column justify-content-center align-items-center p-5 text-light">
        <h1 class="fw-bold">Training Center</h1>

        <div class="container row gap-3 mt-5 justify-content-center align-items-center">
            <!--    card start-->
            <div class="card col-lg-3 p-0">
                <img class="card-img-top" src="../Assets/tesda.jpg" alt="">
                <div class="card-body">
                    <h5 style="color: #190960" class="card-title fw-bold">
                        University of Ghana
                    </h5>
                    <p>
                        The University of Ghana is a premier institution offering a wide range of academic programs and
                        research opportunities.
                    </p>
                </div>
            </div>
            <!--    card end-->
            <!--    card start-->
            <div class="card col-lg-3 p-0">
                <img class="card-img-top" src="../Assets/tesda.jpg" alt="">
                <div class="card-body">
                    <h5 style="color: #190960" class="card-title fw-bold">
                        University of Ghana
                    </h5>
                    <p>
                        The University of Ghana is a premier institution offering a wide range of academic programs and
                        research opportunities.
                    </p>
                </div>
            </div>
            <!--    card end-->
            <!--    card start-->
            <div class="card col-lg-3 p-0">
                <img class="card-img-top" src="../Assets/tesda.jpg" alt="">
                <div class="card-body">
                    <h5 style="color: #190960" class="card-title fw-bold">
                        University of Ghana
                    </h5>
                    <p>
                        The University of Ghana is a premier institution offering a wide range of academic programs and
                        research opportunities.
                    </p>
                </div>
            </div>
            <!--    card end-->
        </div>

        <div class="container mt-5 d-flex flex-column justify-content-center align-items-center">
            <div>
                <h3>
                    Discover TESDA Opportunities
                    for PUP Students
                </h3>
                <p style="color: #c5bdbd" class="col-lg-6">
                    Bridging your skills to success! Explore TESDA programmes tailored for PUP students and take the
                    first step towards a brighter career.
                </p>

                <a href="#" class="container-fluid row gap-3">
                    <div class="col-lg-6 d-lg-flex gap-3">
                        <i class="fa-solid fs-1 text-light fa-book"></i>
                        <div>
                            <h5>Centralised Course Information</h5>
                            <p style="color: #c5bdbd">
                                TESDA Finder brings together all the necessary details about TESDA-accredited courses in
                                one convenient platform. You can easily search and explore courses by location,
                                specialisation, and schedule, all in one place.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 d-lg-flex gap-3 container-fluid-sm">
                        <i class="fa-solid fs-1 text-l  ight fa-comments"></i>
                        <div>
                            <h5>Student Feedback and Reviews</h5>
                            <p style="color: #c5bdbd">
                                We make it easier for you to make informed decisions. Check out real feedback from
                                fellow students about different training centres, helping you choose the right course
                                based on trusted experiences.
                            </p>
                        </div>
                    </div>


                    <div class="col-lg-6 d-lg-flex gap-3">
                        <i class="fa-solid text-light fs-1 fa-certificate"></i>
                        <div>
                            <h5>Course Legitimacy Verification</h5>
                            <p style="color: #c5bdbd">
                                To ensure the credibility of the training centres, we allow you to upload your
                                Certificate of Completion (COC). This provides a secure way to validate the legitimacy
                                of the courses and training centres you’re interested in.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
    </section>

    <section class="container-fluid p-5 mt-5">
        <div class="text-center">
            <h3>Students Feedback</h3>
            <p>Honest Review From Real Student</p>
        </div>
        <div class="row justify-content-center mt-5 g-4">
            <div class="col-lg-4">
                <div class="shadow-sm rounded-3 h-100 p-4 text-center bg-white">
                    <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png"
                        class="rounded-circle img-thumbnail mb-3" style="height: 50px; width: 50px;" alt="image">
                    <h5>John Doe</h5>
                    <p class="mt-3">
                        "I was able to find the perfect course for me with the help of TESDA Finder. I highly
                        recommend this platform to all students looking to enhance their skills."
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="shadow-sm rounded-3 h-100 p-4 text-center bg-white">
                    <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png"
                        class="rounded-circle img-thumbnail mb-3" style="height: 50px; width: 50px;" alt="image">
                    <h5>John Doe</h5>
                    <p class="mt-3">
                        "I was able to find the perfect course for me with the help of TESDA Finder. I highly
                        recommend this platform to all students looking to enhance their skills."
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="shadow-sm rounded-3 h-100 p-4 text-center bg-white">
                    <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png"
                        class="rounded-circle img-thumbnail mb-3" style="height: 50px; width: 50px;" alt="image">
                    <h5>John Doe</h5>
                    <p class="mt-3">
                        "I was able to find the perfect course for me with the help of TESDA Finder. I highly
                        recommend this platform to all students looking to enhance their skills."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--  About Page -->
    <section id="topTraining"
        class="container-fluid d-flex flex-column gap-3 justify-content-center align-items-center p-5">

        <h1 class="text-center fw-bold text-light">About Us</h1>
        <div id="About_us" class="container d-lg-flex justify-content-center align-items-center">
            <p style="color: #c5bdbd">
                Here is the transcribed text from the image:
                Welcome to TESDA Tracker, a dedicated platform created for PUP ITECH students to simplify the search for
                TESDA-accredited courses and training centers.
                We understand the challenges students face when navigating TESDA’s offerings, from scattered information
                to difficulty finding courses that fit their skills, interests, and location. Our website bridges this
                gap, providing a centralized, user-friendly solution designed with students’ needs in mind.
                TESDA Tracker offers comprehensive details about TESDA programs, including course duration,
                prerequisites, costs, and certification opportunities.
                With intuitive filters and a clean interface, students can efficiently explore courses based on their
                field of study, skill level, or location. We aim to support students in pursuing technical and
                vocational training, empowering them with the skills needed for personal growth and future employment.
            </p>
            <img class="img-fluid col-lg-6"
                src="https://www.tesdaguides.com/wp-content/uploads/2015/06/tesda-online.jpg" alt="image">
        </div>
    </section>


    <!-- Modal for login -->
    <div class="modal fade" id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>
    <div>
        <footer class="py-3 text-light" style="backdrop-filter: blur(8px); font-size: 12px; background-color: #190960">
            <div class="container text-center">
                <div class="row mb-2">
                    <div class="col-12">
                        <a href="" class="text-white text-decoration-underline mx-2">Contact Us</a>
                        <a href="/privacy-policy" class="text-white text-decoration-underline mx-2">Privacy Policy</a>
                        <a href="/terms-of-service" class="text-white text-decoration-underline mx-2">Terms of
                            Service</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        © 2025 NC Finder. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>