<?php
// Include the database connection file
include 'connection.php';

if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']); // Sanitize input to prevent SQL injection

    // Start a transaction to ensure atomic deletion
    $conn->begin_transaction();

    try {
        // 1. Delete from the photo table (based on user_id)
        $query = "DELETE FROM photo WHERE user_id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->close();
        }

        // 2. Delete from the guardian table (based on user_id)
        $query = "DELETE FROM guardian WHERE user_id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->close();
        }

        // 3. Delete from the certificate table (based on user_id)
        $query = "DELETE FROM certificate WHERE user_id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->close();
        }

        // 4. Delete from the admission table (based on user_id)
        $query = "DELETE FROM admission WHERE user_id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->close();
        }

        // 5. Finally, delete the user record (if they have no other associated records)
        $query = "DELETE FROM users WHERE user_id = ? AND NOT EXISTS (SELECT 1 FROM admission WHERE user_id = ?)";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('ii', $user_id, $user_id);
            $stmt->execute();
            $stmt->close();
        }

        // Commit the transaction if all queries were successful
        $conn->commit();

        // Redirect after successful deletion
        echo "<script>alert('Record deleted successfully.'); window.location.href='userdetails.php';</script>";
    } catch (Exception $e) {
        // Rollback the transaction if any query fails
        $conn->rollback();
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='userdetails.php';</script>";
    }
} else {
    // If no user_id is provided, show an error and redirect
    echo "<script>alert('Invalid request.'); window.location.href='userdetails.php';</script>";
}

// Close the database connection
$conn->close();
?>
