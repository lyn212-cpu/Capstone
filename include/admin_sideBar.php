<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>


<div class="d-flex flex-column justify-content-center mt-5">
    <ul class="">
        <li class="nav-item p-2 mb-2 d-flex align-items-center gap-2 <?php echo ($current_page === 'Dashboard.php') ? 'bg-light' : ''; ?>">
            <i class="fa-solid fa-gauge text-light"></i>
            <a class="nav-link <?php echo ($current_page === 'Dashboard.php') ? 'text-dark fw-bold' : 'text-light'; ?>" href="./Dashboard.php">Dashboard</a>
        </li>

        <li class="nav-item p-2 mb-2 d-flex align-items-center gap-2 <?php echo ($current_page === 'Courses.php') ? 'bg-light' : ''; ?>">
            <i class="fa-solid fa-bookmark text-light"></i>
            <a class="nav-link <?php echo ($current_page === 'Courses.php') ? 'text-dark fw-bold' : 'text-light'; ?>" href="./Courses.php">Manage Courses</a>
        </li>

        <li class="nav-item p-2 mb-2 d-flex align-items-center gap-2 <?php echo ($current_page === 'Feedback.php') ? 'bg-light' : ''; ?>">
            <i class="fa-solid fa-comment text-light"></i>
            <a class="nav-link <?php echo ($current_page === 'Feedback.php') ? 'text-dark fw-bold' : 'text-light'; ?>" href="./Feedback.php">Manage Feedback</a>
        </li>

        <li class="nav-item p-2 mb-2 d-flex align-items-center gap-2 <?php echo ($current_page === 'NC.php') ? 'bg-light' : ''; ?>">
            <i class="fa-solid fa-certificate text-light"></i>
            <a class="nav-link <?php echo ($current_page === 'NC.php') ? 'text-dark fw-bold' : 'text-light'; ?>" href="./NC.php">Manage National Certificates</a>
        </li>
    </ul>
</div>