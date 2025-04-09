<?php
session_start();
include "../connection.php"; // Adjust the path as needed

// Check if the form is submitted
if (isset($_POST['submit'])) {
  
    $amount = $_POST['inputAmount4']*100;
    $name = $_POST['inputName'];
    $email = $_POST['inputEmail'];
    $phone = $_POST['inputPhone'];

    // Validate the data
    if (empty($amount) || empty($name) || empty($email) || empty($phone)) {
        $_SESSION["validate_msg"] = '<script>
            Swal.fire({
                icon: "error",
                title: "All fields are required",
                showConfirmButton: false,
                timer: 1500
            });
        </script>';
        header("Location: checkout.php");
        exit();
    }

    // Validate if the amount is a number
    if (!is_numeric($amount)) {
        $_SESSION["validate_msg"] = '<script>
            Swal.fire({
                icon: "error",
                title: "Amount must be a number",
                showConfirmButton: false,
                timer: 1500
            });
        </script>';
        header("Location: checkout.php");
        exit();
    }

    // Validate if the phone number is a number
    if (!is_numeric($phone)) {
        $_SESSION["validate_msg"] = '<script>
            Swal.fire({
                icon: "error",
                title: "Phone must be a number",
                showConfirmButton: false,
                timer: 1500
            });
        </script>';
        header("Location: checkout.php");
        exit();
    }

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["validate_msg"] = '<script>
            Swal.fire({
                icon: "error",
                title: "Email is not valid",
                showConfirmButton: false,
                timer: 1500
            });
        </script>';
        header("Location: checkout.php");
        exit();
    }

    // Get the user_id from the users table
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        $_SESSION["validate_msg"] = '<script>
            Swal.fire({
                icon: "error",
                title: "User not found",
                showConfirmButton: false,
                timer: 1500
            });
        </script>';
        header("Location: checkout.php");
        exit();
    }

    $user_id = $user['user_id']; // Get user_id

    // Get the admission_id from the admission table using user_id
    $stmt = $conn->prepare("SELECT admission_id FROM admission WHERE user_id = ? ORDER BY admission_id DESC LIMIT 1");

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $admission = $result->fetch_assoc();

    if (!$admission) {
        $_SESSION["validate_msg"] = '<script>
            Swal.fire({
                icon: "error",
                title: "No admission record found",
                showConfirmButton: false,
                timer: 1500
            });
        </script>';
        header("Location: checkout.php");
        exit();
    }

    $admission_id = $admission['admission_id']; // Get the admission_id
    $id = uniqid('fee_', true); // Generate a unique ID for the payment
    $purchase_order_name = "Payment for goods"; // Optional description for the order

    // Insert data into the database with admission_id and user_id as foreign keys
    $sql = "INSERT INTO payments (id, admission_id, user_id, name, phone, amount, status, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, 'pending', NOW())";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siissd", $id, $admission_id, $user_id, $name, $phone, $amount);
    
    if (!$stmt->execute()) {
        $_SESSION["validate_msg"] = '<script>
            Swal.fire({
                icon: "error",
                title: "Database error. Try again!",
                showConfirmButton: false,
                timer: 1500
            });
        </script>';
        header("Location: checkout.php");
        exit();
    }

    // Prepare the data for the payment request
    $postFields = array(
        "return_url" => "http://localhost/form/khalti-payment/payment-response.php",
        "website_url" => "http://localhost/khalti-payment/",
        "amount" => $amount,
        "purchase_order_id" => $id, 
        "purchase_order_name" => $purchase_order_name, 
        "customer_info" => array(
            "name" => $name,
            "email" => $email,
            "phone" => $phone
        )
    );

    // Convert the data to JSON format
    $jsonData = json_encode($postFields);

    // Initialize cURL request
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $jsonData,
        CURLOPT_HTTPHEADER => array(
            'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
            'Content-Type: application/json',
        ),
    ));

    // Execute the cURL request
    $response = curl_exec($curl);

    // Check for cURL errors
    if (curl_errno($curl)) {
        echo 'Error:' . curl_error($curl);
    } else {
        // Decode the response from JSON
        $responseArray = json_decode($response, true);

        // Check if the response contains an error
        if (isset($responseArray['error'])) {
            echo 'Error: ' . $responseArray['error'];
        } elseif (isset($responseArray['payment_url'])) {
            // Redirect the user to the Khalti payment page
            header('Location: ' . $responseArray['payment_url']);
            exit();
        }
    }
}
?>
