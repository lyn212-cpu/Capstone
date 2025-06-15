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
    <title>Training Center Admin</title>
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
                <h5 class="">Training Center Admin</h5>
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
                <h3 style="color: #190960" class="fw-bold">Dashboard</h3>
            </div>
        </header>

        <nav class="container-fluid d-flex justify-content-between align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <button data-bs-target="#newCenter_modal" data-bs-toggle="modal" style="background-color: #190960"
                class="btn text-light">Post Course</button>
        </nav>

        <!-- User list table -->
        <div class="card mb-4 bg-transparent">
            <div style="background-color: #190960" class="card-header text-light">
                <i class="fas fa-table me-1"></i>
                Course List
            </div>
            <div class="card-body">




                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Training Center Name</th>
                            <th>Department</th> <!-- Added Department column -->
                            <th>Duration</th>
                            <th>Slots Available</th>
                            <th>Location</th>
                            <th>Contact Information</th>
                            <th>Course Description</th>
                            <th>Requirements</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM nc_course";
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Merge location fields if they exist, otherwise use the 'location' column
                                if (
                                    isset($row['blockLot']) || isset($row['street']) || isset($row['subdivision']) ||
                                    isset($row['barangay']) || isset($row['city']) || isset($row['province']) || isset($row['zipCode'])
                                ) {
                                    $location_parts = [
                                        $row['blockLot'] ?? '',
                                        $row['street'] ?? '',
                                        $row['subdivision'] ?? '',
                                        $row['barangay'] ?? '',
                                        $row['city'] ?? '',
                                        $row['province'] ?? '',
                                        $row['zipCode'] ?? ''
                                    ];
                                    $location = implode(', ', array_filter($location_parts));
                                } else {
                                    $location = $row['location'] ?? '';
                                }

                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['training_center_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['department']) . "</td>"; // Show department from DB
                                echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['slots_available']) . "</td>";
                                echo "<td>" . htmlspecialchars($location) . "</td>";
                                echo "<td>" . htmlspecialchars($row['contact_info']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['course_description']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['requirements']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal For adding New Post -->
    <div class="modal fade" id="newCenter_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Post a Course</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="add_course.php" id="courseForm">
                    <div class="modal-body row g-3 px-3">
                        <!-- Course Name -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Course Name" required>
                            <label for="courseName">Course Name</label>
                        </div>

                        <!-- Training Center Name -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="centerName" name="centerName" placeholder="Training Center Name" required>
                            <label for="centerName">Training Center Name</label>
                        </div>

                        <!-- Duration -->
                        <div class="form-floating col-md-6 d-flex align-items-center">
                            <select class="form-select" id="duration" name="duration" style="width:auto;" required>
                                <?php for ($i = 1; $i <= 100; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <label for="duration" class="ms-2 mb-0">Duration</label>
                            <span class="ms-2">Days</span>
                        </div>

                        <!-- Slot Availability (dropdown 1-50) -->
                        <div class="form-floating col-md-6">
                            <select class="form-select" id="slotAvailability" name="slotAvailability" required>
                                <?php for ($i = 1; $i <= 50; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <label for="slotAvailability">Slot Availability</label>
                        </div>

                        <!-- Start Date -->
                        <div class="form-floating col-md-6">
                            <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date" required>
                            <label for="start_date">Start Date</label>
                        </div>

                        <!-- End Date -->
                        <div class="form-floating col-md-6">
                            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date" required>
                            <label for="end_date">End Date</label>
                        </div>


                        <!-- Block and Lot Number -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="blockLot" name="blockLot" placeholder="Block and Lot Number" required>
                            <label for="blockLot">Block and/or Lot Number</label>
                        </div>

                        <!-- Street -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="street" name="street" placeholder="Street" required>
                            <label for="street">Street</label>
                        </div>

                        <!-- Subdivision Name -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="subdivision" name="subdivision" placeholder="Subdivision Name">
                            <label for="subdivision">Subdivision Name</label>
                        </div>

                        <!-- Barangay -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Barangay" required>
                            <label for="barangay">Barangay</label>
                        </div>

                        <!-- City/Municipal Name -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City/Municipal Name" required>
                            <label for="city">City/Municipal Name</label>
                        </div>

                        <!-- Province -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="province" name="province" placeholder="Province" required>
                            <label for="province">Province</label>
                        </div>

                        <!-- Postal Code -->
                        <div class="form-floating col-md-6">
                            <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="Zip Code" required>
                            <label for="zipCode">Postal Code</label>
                        </div>


                        <!-- Email -->
                        <div class="form-floating col-md-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            <label for="email">Email</label>
                        </div>

                        <!-- Department Dropdown (multiple select, enlarged box) -->
                        <div class="form-floating col-md-6">
                            <select class="form-select" id="department" name="department[]" multiple required size="8" style="min-height: 220px;">
                                <option value="Diploma in Information Technology">Diploma in Information Technology</option>
                                <option value="Diploma in Computer Engineering Technology">Diploma in Computer Engineering Technology</option>
                                <option value="Diploma in Office Management Technology">Diploma in Office Management Technology</option>
                                <option value="Diploma in Electronics Engineering Technology">Diploma in Electronics Engineering Technology</option>
                                <option value="Diploma in Electrical Engineering Technology">Diploma in Electrical Engineering Technology </option>
                                <option value="Diploma in Mechanical Engineering Technology">Diploma in Mechanical Engineering Technology</option>
                                <option value="Diploma in Civil Engineering Technology">Diploma in Civil Engineering Technology</option>
                                <option value="Diploma in Railway Engineering Technology">Diploma in Railway Engineering Technology</option>
                            </select>
                            <label for="department">Recommended Department</label>
                        </div>
                        <div class="form-text mb-3" style="margin-left:12px;">
                            Hold Ctrl (Windows) or Command (Mac) to select multiple.
                        </div>

                        <!-- Requirements -->
                        <div class="col-12">
                            <label class="form-label">Requirements</label>
                            <select multiple class="form-select" id="requirements" name="requirements[]" onchange="toggleOtherRequirement()" required>
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
                                <input type="text" class="form-control" id="otherRequirement" name="otherRequirement"
                                    placeholder="Other Requirement">
                                <label for="otherRequirement">Specify Other Requirement</label>
                            </div>
                            <div id="additionalRequirements"></div>
                            <button type="button" class="btn btn-secondary mt-2" id="addRequirementBtn"
                                style="display: none;">Add Another Requirement</button>
                        </div>

                        <!-- Course Description -->
                        <div class="form-floating col-12">
                            <textarea class="form-control" placeholder="Leave a course description here"
                                id="courseDescription" name="courseDescription" style="height: 100px" required></textarea>
                            <label for="courseDescription">Course Description</label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button style="background-color: #190960" type="submit" class="btn text-light">Post Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/Capstone/JS_CSS_Admin/js_center_admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
</body>

</html>