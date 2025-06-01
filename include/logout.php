<?php 
    require('../Backend/connect.php');
    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: ../UserInterface/Sign_in.php');
    }
    
    session_unset();
    session_destroy();
    header('Location: ../UserInterface/Sign_in.php');
?>