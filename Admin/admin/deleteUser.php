<?php
include '../../Backend/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_ids'])) {
    $delete_ids = $_POST['delete_ids'];

    foreach ($delete_ids as $id) {
        // Use prepared statements to avoid SQL injection
        $stmt = $conn->prepare("DELETE FROM users WHERE school_number = ?");
        $stmt->bind_param("s", $id); // "s" means string, assuming school_number is stored as string
        $stmt->execute();
    }

    // Redirect back to dashboard after deletion
    header("Location: Dashboard.php");
    exit();
} else {
    // If someone tries to access this page directly without POST data
    header("Location: Dashboard.php");
    exit();
}
