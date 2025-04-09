<?php
// Include database connection
include("connection.php");

// Start session
session_start();

// Check if the user is an admin
if ($_SESSION['role'] !== 'admin') {
    header('Location: logout.php'); // Redirect to the display page if not admin
    exit();
}

// Fetch users data
$query = "SELECT * FROM users";
$result = $conn->query($query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <script>
        function checkdelete() {
            return confirm('Do you want to delete this user?');
        }
    </script>
    <link rel ="stylesheet" href="styles/userdetails.css">
</head>
<body>
    <header> <a href="admin_display.php" class="back-button">&larr; Back to Display</a><h1>Online Student Admission System</h1></header>
    <h2>Admin Dashboard for Deletion</h2>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Phone No</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['middle_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['phone_no']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="delete.php?user_id=<?php echo $row['user_id']; ?>" onclick="return checkdelete();">
                        <button class="delete">Delete</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <footer>
    <p>&copy; 2025 Online Student Admission System</p>
  </footer>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
