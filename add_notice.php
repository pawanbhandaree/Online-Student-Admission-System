<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notice_type = $_POST['notice_type'];
    $notice_content = $_POST['notice_content'];

    // Insert the notice into the notices table
    $stmt = $conn->prepare("INSERT INTO notices (notice_type, notice_content) VALUES (?, ?)");
    $stmt->bind_param("ss", $notice_type, $notice_content);

    if ($stmt->execute()) {
        echo "<script> window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script> window.location.href='admin_dashboard.php';</script>";
    $stmt->close();
}
}
?>
