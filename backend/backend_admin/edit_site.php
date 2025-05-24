<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE NC_Sites SET site_contact_num=?, site_email=?, requirements=?, site_location=?, operating_hours=?, available_courses=?, slot=?, fb_page=? WHERE site_name=?");
    $stmt->bind_param("ssssssiss", $site_contact_num, $site_email, $requirements, $site_location, $operating_hours, $available_courses, $slot, $fb_page, $site_name);

    $site_contact_num = $_POST['site_contact_num'];
    $site_email = $_POST['site_email'];
    $requirements = $_POST['requirements'];
    $site_location = $_POST['site_location'];
    $operating_hours = $_POST['operating_hours'];
    $available_courses = $_POST['available_courses'];
    $slot = $_POST['slot'];
    $fb_page = $_POST['fb_page'];
    $site_name = $_POST['site_name'];

    $stmt->execute();
    echo "Site updated.";
    $stmt->close();
}
?>
