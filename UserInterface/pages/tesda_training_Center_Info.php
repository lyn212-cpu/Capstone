<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institute Details</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container py-5">
        <div class="card shadow-sm p-4 mx-auto" style="max-width: 1140px;">
            <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap">
                <!-- Logo and Title -->
                <div class="d-flex align-items-center mb-2">
                    <img src="logo.png" alt="Institute Logo" width="80" class="me-3">
                    <div>
                        <h4 class="fw-bold text-primary mb-1">Asian Institute of Computer Studies</h4>
                        <p class="mb-0 text-muted">Location: Quezon City</p>
                    </div>
                </div>
                <!-- Back Button -->
                <a href="../Explore_Our_Categories/DECET.php" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to List
                </a>
            </div>

            <!-- Main Content -->
            <div class="row g-4">
                <!-- Left Info -->
                <div class="col-lg-8">
                    <div class="mb-3">
                        <p class="mb-1"><strong>Phone Number:</strong> 09579473231</p>
                        <p class="mb-1"><strong>Email Address:</strong> asianinstituteofcomputerstudies@gmail.com</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="fw-bold text-secondary">REQUIREMENTS:</h6>
                        <ul class="mb-2">
                            <li>At least 18 years old</li>
                            <li>At least High School Graduate</li>
                            <li>Photocopy of HS Transcript of Records (TOR) / Form 137 (photocopy)</li>
                            <li>Photocopy of PSA Birth Certificate</li>
                            <li>Photocopy PSA Marriage Certificate (if married)</li>
                            <li>2 pcs 1x1 picture</li>
                            <li>2 pcs passport size picture with white background and with name tag</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <h6 class="fw-bold text-secondary">Operating Hours:</h6>
                        <p class="mb-0">8:00 AM – 5:00 PM, Monday to Friday</p>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold text-secondary">Available Courses:</h6>
                        <div class="row">
                            <div class="col-8">
                                <p class="mb-1">Bookkeeping NC II</p>
                                <p class="mb-1">Front Office Services NC II</p>
                                <p class="mb-1">Events Management NC II</p>
                            </div>
                            <div class="col-4 text-end">
                                <p class="mb-1">6</p>
                                <p class="mb-1">4</p>
                                <p class="mb-1">10</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button data-bs-target="#feedbackModal" data-bs-toggle="modal" class="btn btn-info text-white">
                            <i class="fas fa-comment-dots me-2"></i> Share Your Experience
                        </button>
                        <a href="#" class="btn btn-outline-primary">Visit Website</a>
                    </div>
                </div>

                <!-- Right Map -->
                <div class="col-lg-4">
                    <div class="ratio ratio-4x3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85152.37260823984!2d121.00677914861758!3d14.678761900000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b9ff787f76f5%3A0x85cc803d83902f16!2sAsian%20Institute%20of%20Computer%20Studies%20-%20Commonwealth!5e1!3m2!1sen!2sph!4v1747357476410!5m2!1sen!2sph"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" title="AICS Location"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feedback Modal -->
    <div class="modal fade" id="feedbackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #20006b; border-radius: 15px;">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white fw-bold" id="feedbackModalLabel">Send us some feedback!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    <p class="mb-3">Do you have any feedback from this training center?<br>Let us know in the field
                        below.</p>
                    <textarea class="form-control" placeholder="Type a message..." rows="6"
                        style="resize: none; border-radius: 10px;"></textarea>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn"
                        style="background-color: #33c9ff; color: white; font-weight: 600; border-radius: 8px; padding: 10px 30px;">
                        Send Feedback
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>