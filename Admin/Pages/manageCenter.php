<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/Dashboard.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <title>Center Management</title>
</head>
<body>
<nav id="collapseExample" class="d-flex flex-column" style="background-color: #190960; min-width: 230px; min-height: 100vh; height: auto;">
    <div class="text-light d-flex flex-column justify-content-center align-items-center p-2 gap-3">
        <picture class="p-2 bg-light-subtle rounded-circle">
            <img width="50" height="50" src="https://img.icons8.com/ios/50/administrator-male--v1.png" alt="administrator-male--v1"/>
        </picture>
        <div>
            <h5 class="">Admin</h5>
        </div>
    </div>
<!-- SideBar--------------------------------------------------------------->
    <?php
       include_once '../../include/sideBar.php';
    ?>
 <!-- SideBar--------------------------------------------------------------->
    <div class="d-flex justify-content-evenly  align-items-center p-2">
        <a href="#" class="nav-link active text-light bg-danger p-2 rounded-5 col-lg-9 text-center bg-opacity-75">
            Logout
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
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
                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Management Center</li>
            </ol>
        </nav>
        <button data-bs-target="#newTraining_modal" data-bs-toggle="modal" style="background-color: #190960" class="btn text-light">New Center</button>
    </nav>
    <!--     User list table-->
    <div class="card mb-4 bg-transparent ">
        <div style="background-color: #190960" class="card-header text-light">
            <i class="fas fa-table me-1"></i>
             Centers
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Center Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>johndoe</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal For adding New Course -->
<div class="modal fade" id="newTraining_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New Training Center</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="CenterName" placeholder="Center Name">
                    <label for="CenterName">Center Name</label>
                </div>


                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="Address" placeholder="Address">
                    <label for="Address">Address</label>
                </div>


                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="contact" placeholder="contact">
                    <label for="contact">Contact</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button  style="background-color: #190960"  type="button" class="btn text-light">Add Now</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</body>
</html>
<script>
    window.addEventListener('DOMContentLoaded', event => {
        const datatablesSimple = document.getElementById('datatablesSimple');
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
        }
    });

    const Nav = document.getElementById('collapseExample');
    const btn_menu = document.getElementById('btn_menu');

    btn_menu.addEventListener('click', () => {
        Nav.classList.toggle('d-none');
        Nav.classList.add('nav_active');
    });

    if (window.innerWidth < 768){
        Nav.classList.add('d-none');


    }
</script>