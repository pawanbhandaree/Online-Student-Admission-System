<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles/admin_Dashboard.css">
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <h1>Online Student Admission System </h1>
        <a href="#">Home</a>
        <a href="#about">About</a>
        <a href="#manage">Manage</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>
            Manage student applications, update records, and oversee the admission process effortlessly. 
            Use the tools below to keep data organized and up-to-date.
        </p>
    </div>

    <!-- About Section -->
    <section id="about">
        <h2>About the Admin Dashboard</h2>
        <p>
            The Admin Dashboard is a centralized platform designed to simplify the admission process. With its intuitive tools, 
            administrators can efficiently manage student applications, monitor quotas, and ensure smooth operations.
        </p>
        <ul>
            <li>View and manage student applications.</li>
            <li>Update or delete admission records.</li>
            <li>Generate reports for analysis.</li>
            <li>Access a real-time overview of admissions.</li>
        </ul>
    </section>

    <!-- Manage Section -->
    <section id="manage">
        <h2>Manage Admission Records</h2>
        <p>
            The Manage section enables you to interact with the admission system's records. Perform tasks like:
        </p>
        <ul>
            <li>Review and verify student applications.</li>
            <li>Approve or reject applications based on criteria.</li>
            <li>Update records with accurate information.</li>
            <li>Monitor admission quotas and deadlines.</li>
        </ul>
    </section>
<!-- Admin can add notices -->
<section id="notice">
    <h2>Add New Notice</h2>
    <form action="add_notice.php" method="POST">
        <label for="notice_type">Notice Type:</label>
        <select name="notice_type" id="notice_type">
            <option value="Notice 1">Notice 1</option>
            <option value="Notice 2">Notice 2</option>
        </select>
        
        <label for="notice_content">Notice Content:</label>
        <textarea name="notice_content" id="notice_content" required></textarea>
        
        <button type="submit">Send Notice</button>
    </form>

    <h2>Stop Existing Notice</h2>
<form action="stop_notice.php" method="POST">
    <label for="stop_notice_type">Select Notice to Stop:</label>
    <select name="notice_id" id="stop_notice_type" required>
        <?php
        // Fetch all active notices
        include('connection.php');
        $query = "SELECT * FROM notices WHERE is_active = 1";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($notice = $result->fetch_assoc()) {
                echo "<option value='" . $notice['notice_id'] . "'>" . htmlspecialchars($notice['notice_type']) . "</option>";
            }
        } else {
            echo "<option value=''>No active notices</option>";
        }
        ?>
    </select>
    
    <button type="submit" name="stop_notice">Stop Notice</button>
</form>
    </section>

    <!-- Buttons Section -->
    <div class="buttons">
        <a href="admin_display.php">View/Update Records</a>
     
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2025 Online Student Admission System
    </footer>
</body>
</html>
