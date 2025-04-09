<?php
// Include database connection
include("connection.php");

// Start session
session_start();

// Check if the user is an admin
if ($_SESSION['role'] !== 'admin') {
    header('Location:logout.php'); // Redirect to the display page if not admin
    exit();
}

// Check if the admission_id is passed in the URL
if (isset($_GET['admission_id'])) {
    $admission_id = $_GET['admission_id'];

    // Update the admission record's status to 'rejected'
    $query = "UPDATE admission SET status = 'rejected' WHERE admission_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $admission_id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Redirect back to the admin display page with a success message
        header("Location: admin_display.php?status=rejected");
        exit();
    } else {
        // If the update failed, redirect with an error message
        header("Location: admin_display.php?status=error");
        exit();
    }
} else {
    // If no admission_id is provided, redirect to the admin display page
    header("Location: admin_display.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>