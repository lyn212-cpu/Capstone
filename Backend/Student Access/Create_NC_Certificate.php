<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $section_code = $_POST['section_code'];
    $email = $_POST['email'];
    $certificate_type = $_POST['certificate_type'];
    $certificate_number = $_POST['certificate_number'];

    $stmt = $conn->prepare("INSERT INTO NC_Certificate (full_name, section_code, email, certificate_type, certificate_number) 
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $section_code, $email, $certificate_type, $certificate_number);

    if ($stmt->execute()) {
        echo "Certificate submitted successfully.";
    } else {
        echo "Error submitting certificate.";
    }

    $stmt->close();
}

$conn->close();
?>
