<?php
session_start();
include '../../Backend/connect.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="nc_certificates_report.csv"');

$output = fopen('php://output', 'w');

// CSV Header
fputcsv($output, ['Full Name', 'Section Code', 'School Number', 'Certificate Name', 'Upload Date', 'Status']);

$sql = "SELECT 
            u.full_name, 
            u.school_number, 
            CONCAT(u.course, ' - ', u.year_level) AS section_code,
            c.certificate_name, 
            c.upload_date,
            c.status
        FROM users u
        LEFT JOIN certificates c ON u.user_id = c.user_id
        WHERE c.status IS NOT NULL
        ORDER BY u.full_name ASC";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, [
            $row['full_name'],
            $row['section_code'],
            $row['school_number'],
            $row['certificate_name'] ?? 'No certificate',
            $row['upload_date'] ?? '--',
            ucfirst($row['status'])
        ]);
    }
}

fclose($output);
exit;
