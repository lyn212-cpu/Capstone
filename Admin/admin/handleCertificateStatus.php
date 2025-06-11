<?php
include '../../Backend/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $certificateName = $_POST['certificate_name'] ?? '';
    $action = $_POST['action'] ?? '';

    if ($action === 'approve') {
        $stmt = $conn->prepare("UPDATE certificates SET status = 'approved' WHERE certificate_name = ?");
        $stmt->bind_param("s", $certificateName);
        $stmt->execute();
    } elseif ($action === 'disapprove') {
        // Delete certificate from database
        $stmt = $conn->prepare("DELETE FROM certificates WHERE certificate_name = ?");
        $stmt->bind_param("s", $certificateName);
        $stmt->execute();

        // Optionally delete the physical file
        $filePath = "../../uploads/certificates/" . basename($certificateName);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}

header("Location: NC.php"); // Replace with actual admin file name
exit();
