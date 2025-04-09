<?php
// Include database connection
include('connection.php');

if (isset($_POST['stop_notice']) && isset($_POST['notice_id'])) {
    $notice_id = $_POST['notice_id'];

    // Mark the notice as inactive
    $query = "UPDATE notices SET is_active = 0 WHERE notice_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $notice_id);

    if ($stmt->execute()) {
        echo "<script>window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>window.location.href='admin_dashboard.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href='admin_dashboard.php';</script>";
}
?>
