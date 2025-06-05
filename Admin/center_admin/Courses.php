<?php
include '../../Backend/connect.php';
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../JS_CSS_Admin/courses.css">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <title>Super Admin</title>
</head>

<body>
    <!-- Add the modals here -->
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editCourseId" name="course_id">
                        <div class="mb-3">
                            <label for="editCourseName" class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="editCourseName" name="course_name">
                        </div>
                        <div class="mb-3">
                            <label for="editTrainingCenterName" class="form-label">Training Center Name</label>
                            <input type="text" class="form-control" id="editTrainingCenterName"
                                name="training_center_name">
                        </div>
                        <div class="mb-3">
                            <label for="editDuration" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="editDuration" name="duration">
                        </div>
                        <div class="mb-3">
                            <label for="editSlotsAvailable" class="form-label">Slots Available</label>
                            <input type="number" class="form-control" id="editSlotsAvailable" name="slots_available">
                        </div>
                        <div class="mb-3">
                            <label for="editLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="editLocation" name="location">
                        </div>
                        <div class="mb-3">
                            <label for="editContactInfo" class="form-label">Contact Information</label>
                            <input type="text" class="form-control" id="editContactInfo" name="contact_info">
                        </div>
                        <div class="mb-3">
                            <label for="editCourseDescription" class="form-label">Course Description</label>
                            <input type="text" class="form-control" id="editCourseDescription"
                                name="course_description">
                        </div>
                        <div class="mb-3">
                            <label for="editRequirements" class="form-label">Requirements</label>
                            <input type="text" class="form-control" id="editRequirements" name="requirements">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this course?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <nav id="collapseExample" class="d-flex flex-column"
        style="background-color: #190960; min-width: 230px; min-height: 100vh; height: auto;">
        <div class="text-light d-flex flex-column justify-content-center align-items-center p-2 gap-3">
            <picture class="p-2 bg-light-subtle rounded-circle">
                <img width="50" height="50" src="https://img.icons8.com/ios/50/administrator-male--v1.png"
                    alt="administrator-male--v1" />
            </picture>
            <div>
                <h5 class="">Super Admin</h5>
            </div>
        </div>
        <!-- SideBar--------------------------------------------------------------->
        <?php
        include_once '../../include/centerAdmin_sideBar.php';
        ?>
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
                        <a href="../../include/logout.php" class="btn btn-danger">Logout</a>
                        <!-- Redirects to login.php -->
                    </div>
                </div>
            </div>
        </div>

    </nav>
    <main class="container-fluid d-flex flex-column gap-3 p-2">
        <header class="shadow-sm border-bottom border-2 rounded-3 p-2">
            <div class="d-flex gap-3">
                <button class="btn" type="button" id="btn_menu">
                    <img style="height: 20px; width: 20px" src="../../Assets/menu.png" alt="menu">
                </button>
                <h3 style="color: #190960" class="fw-bold">Manage Courses</h3>
            </div>
        </header>

        <nav class="container-fluid d-flex justify-content-between align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Course Management</li>
                </ol>
            </nav>
            <button data-bs-target="#newCenter_modal" data-bs-toggle="modal" style="background-color: #190960"
                class="btn text-light">New Course</button>
        </nav>

        <!-- User list table -->
        <div class="card mb-4 bg-transparent">
            <div style="background-color: #190960" class="card-header text-light">
                <i class="fas fa-table me-1"></i>
                Course List
            </div>
            <div class="card-body">
                <button id="toggleActionsBtn" class="btn btn-secondary mb-3">Toggle Actions</button>
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Training Center Name</th>
                            <th>Duration</th>
                            <th>Slots Available</th>
                            <th>Location</th>
                            <th>Contact Information</th>
                            <th>Course Description</th>
                            <th>Requirements</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM nc_course";
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['training_center_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['slots_available']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['contact_info']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['course_description']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['requirements']) . "</td>";
                                echo "<td>
            <button class='btn btn-primary btn-sm edit-btn'
    data-course_id='" . htmlspecialchars($row['course_id'], ENT_QUOTES) . "'
    data-course_name='" . htmlspecialchars($row['course_name'], ENT_QUOTES) . "'
    data-training_center_name='" . htmlspecialchars($row['training_center_name'], ENT_QUOTES) . "'
    data-duration='" . htmlspecialchars($row['duration'], ENT_QUOTES) . "'
    data-slots_available='" . htmlspecialchars($row['slots_available'], ENT_QUOTES) . "'
    data-location='" . htmlspecialchars($row['location'], ENT_QUOTES) . "'
    data-contact_info='" . htmlspecialchars($row['contact_info'], ENT_QUOTES) . "'
    data-course_description='" . htmlspecialchars($row['course_description'], ENT_QUOTES) . "'
    data-requirements='" . htmlspecialchars($row['requirements'], ENT_QUOTES) . "'
>Edit</button>
            <button class='btn btn-danger btn-sm delete-btn'>Delete</button>
        </td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal For adding New Course -->
    <div class="modal fade" id="newCenter_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">New Course</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body row g-3 px-3">
                    <!-- Course Name -->
                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="courseName" placeholder="Course Name">
                        <label for="courseName">Course Name</label>
                    </div>

                    <!-- Training Center Name -->
                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="centerName" placeholder="Training Center Name">
                        <label for="centerName">Training Center Name</label>
                    </div>

                    <!-- Duration -->
                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="duration" placeholder="Duration">
                        <label for="duration">Duration (e.g., 3 months)</label>
                    </div>

                    <!-- Location -->
                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="location" placeholder="Location">
                        <label for="location">Location</label>
                    </div>

                    <!-- Contact Number -->
                    <div class="form-floating col-md-6">
                        <input type="tel" class="form-control" id="contactNumber" placeholder="Contact Number">
                        <label for="contactNumber">Contact Number</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating col-md-6">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                        <label for="email">Email</label>
                    </div>

                    <!-- Slot Availability (typable) -->
                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="slotAvailability" placeholder="Slot Availability">
                        <label for="slotAvailability">Slot Availability</label>
                    </div>

                    <!-- Course Description -->
                    <div class="form-floating col-12">
                        <textarea class="form-control" placeholder="Leave a course description here"
                            id="courseDescription" style="height: 100px"></textarea>
                        <label for="courseDescription">Course Description</label>
                    </div>

                    <!-- Requirements -->
                    <div class="col-12">
                        <label class="form-label">Requirements</label>
                        <select multiple class="form-select" id="requirements" onchange="toggleOtherRequirement()">
                            <option value="form_137">Form 137</option>
                            <option value="birth_certificate">Birth Certificate</option>
                            <option value="barangay_clearance">Barangay Clearance</option>
                            <option value="nbi_clearance">NBI Clearance</option>
                            <option value="high_school_diploma">High School Diploma</option>
                            <option value="other">Other (specify below)</option>
                        </select>
                        <div class="form-text">Hold Ctrl (Windows) or Command (Mac) to select multiple.</div>

                        <!-- Other Requirement Field (hidden by default) -->
                        <div class="form-floating mt-2" id="otherRequirementDiv" style="display: none;">
                            <input type="text" class="form-control" id="otherRequirement"
                                placeholder="Other Requirement">
                            <label for="otherRequirement">Specify Other Requirement</label>
                        </div>
                        <div id="additionalRequirements"></div> <!-- Container for additional fields -->
                        <button type="button" class="btn btn-secondary mt-2" id="addRequirementBtn"
                            style="display: none;">Add Another Requirement</button>
                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="../../include/logout.php" class="btn btn-danger">Logout</a> <!-- Redirects to login.php -->

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button style="background-color: #190960" type="button" class="btn text-light">Add Now</button>

                </div>
            </div>
        </div>
    </div>

    <script src="/Capstone/JS_CSS_Admin/js_courses.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
</body>

</html>