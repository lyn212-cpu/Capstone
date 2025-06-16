<?php
$current_page = basename($_SERVER['PHP_SELF']);
$is_active = fn($page) => strpos($current_page, $page) !== false;
?>



<div class="d-flex flex-column justify-content-center mt-5">
    <ul class="">
        <li class="nav-item p-2 mb-2 d-flex align-items-center gap-2 <?php echo $is_active('Courses.php') ? 'bg-light' : ''; ?>">
            <i class="fa-solid fa-bookmark <?php echo $is_active('Courses.php') ? 'text-dark' : 'text-light'; ?>"></i>
            <a class="nav-link <?php echo $is_active('Courses.php') ? 'text-dark fw-bold' : 'text-light'; ?>" href="./Courses.php">Dashboard</a>
        </li>
        <li class="nav-item p-2 mb-2 d-flex align-items-center gap-2 <?php echo $is_active('registered_student.php') ? 'bg-light' : ''; ?>">
            <i class="fa-solid fa-bookmark <?php echo $is_active('registered_student.php') ? 'text-dark' : 'text-light'; ?>"></i>
            <a class="nav-link <?php echo $is_active('registered_student.php') ? 'text-dark fw-bold' : 'text-light'; ?>" href="./registered_student.php">Registered Students</a>
        </li>
    </ul>
</div>