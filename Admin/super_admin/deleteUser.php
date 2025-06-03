<?php
include '../../Backend/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_ids'])) {
    $deleteIds = $_POST['delete_ids'];

    if (!empty($deleteIds)) {
        $placeholders = implode(',', array_fill(0, count($deleteIds), '?'));
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id IN ($placeholders)");

        $stmt->bind_param(str_repeat('i', count($deleteIds)), ...$deleteIds);

        if ($stmt->execute()) {
            header('Location: Dashboard.php?success=Users deleted successfully');
        } else {
            header('Location: Dashboard.php?error=Failed to delete users');
        }

        $stmt->close();
    } else {
        header('Location: Dashboard.php?error=No users selected');
    }
} else {
    header('Location: Dashboard.php');
}
?>