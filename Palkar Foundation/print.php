<?php
// Include the database configuration file
require_once('db\db_config.php');

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query to retrieve data for the selected ID
    $query = "SELECT * FROM reservations WHERE id = $id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die("Error: " . mysqli_error($conn)); // Display error message and stop script execution
    }

    // Fetch the selected entry
    $row = mysqli_fetch_assoc($result);
} else {
    // If no ID is provided, redirect to the previous page or display an error message
    header("Location: admin.php"); // Redirect to admin.php
    exit; // Stop script execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Receipt</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .receipt-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .receipt-header h2 {
            margin: 0;
            color: #007bff;
        }
        .receipt-details {
            margin-bottom: 30px;
        }
        .receipt-details p {
            margin: 5px 0;
            color: #555;
        }
        .btn-print {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-print:hover {
            background-color: #0056b3;
        }
        .btn-back {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: #333;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-back:hover {
            background-color: #ddd;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h2>Reservation Receipt</h2>
        </div>
        <div class="receipt-details">
            <p><strong>Transaction ID:</strong> <?php echo $row['trans_id']; ?></p>
            <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
            <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Check-in Date:</strong> <?php echo date('d-m-Y', strtotime($row['checkin_date'])); ?></p>
            <p><strong>Check-out Date:</strong> <?php echo date('d-m-Y', strtotime($row['checkout_date'])); ?></p>
            <p><strong>Adults:</strong> <?php echo $row['adults']; ?></p>
            <p><strong>Room Type:</strong> <?php echo $row['room_type']; ?></p>
            <p><strong>Notes:</strong> <?php echo $row['notes']; ?></p>
            <p><strong>Total Amount:</strong> <?php echo $row['totalAmount']; ?></p>
            <p><strong>Payment Status:</strong> <?php echo $row['payment']; ?></p>
        </div>
        <button class="btn btn-primary" onclick="window.print()">Print Receipt</button>
        <a href="index.html" class="btn btn-secondary">Back to Home</a>
    </div>
</body>
</html>
