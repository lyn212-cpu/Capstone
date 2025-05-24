<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $certificate_id = $_POST['certificate_id'];
    $email = $_POST['email']; // Used for ownership verification
    $certificate_type = $_POST['certificate_type'];
    $certificate_number = $_POST['certificate_number'];

    $stmt = $conn->prepare("UPDATE NC_Certificate 
                            SET certificate_type = ?, certificate_number = ?
                            WHERE certificate_id = ? AND email = ?");
    $stmt->bind_param("ssis", $certificate_type, $certificate_number, $certificate_id, $email);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "Certificate updated successfully.";
    } else {
        echo "Update failed. Please check your email and certificate ID.";
    }

    $stmt->close();
}

$conn->close();
?>
