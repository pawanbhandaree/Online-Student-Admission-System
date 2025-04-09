<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khalti Payment Integration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../styles/check_out.css">
</head>

<body class="m-4">
    <?php
    session_start();
    if (isset($_SESSION['transaction_msg'])) {
        echo '<div class="alert alert-success">' . $_SESSION['transaction_msg'] . '</div>';
        unset($_SESSION['transaction_msg']);
    }

    if (isset($_SESSION['validate_msg'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['validate_msg'] . '</div>';
        unset($_SESSION['validate_msg']);
    }
    ?>
<div>
    <h1>Online Student Admission System</h1>
</div>   
    <div class="d-flex justify-content-center mt-3">
    
        <form class="row g-3 w-50 mt-4" action="payment-request.php" method="POST">
            <div class="col-12">
            <h3 class="text-center">Khalti Payment Dashboard</h3>
                <label for="inputAmount4" class="form-label">Total Payment Amount (According to your campus, course & level)</label>
                <input type="number" class="form-control" id="inputAmount4" name="inputAmount4" placeholder="Enter amount">
                <span id="amountError" class="error"></span>
            </div>
            <div class="col-12">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Enter your name">
                <span id="nameError" class="error"></span>
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Enter your email">
                <span id="emailError" class="error"></span>
            </div>
            <div class="col-md-6">
                <label for="inputPhone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Enter your phone">
                <span id="phoneError" class="error"></span>
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary w-100">Pay with Khalti</button>
            </div>
        </form>
    </div>
<script src ="check_out.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <footer>
    &copy; 2025 Online Student Admission System
  </footer>

</body>

</html>
