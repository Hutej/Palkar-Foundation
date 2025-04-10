<?php
// Start or resume session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
// $servername = "localhost"; // Remove the port number
// $username = "root";
// $password = ""; // Enter your database password if you have set one
// $database = "plkrfo";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
require('db\db_config.php');

// Retrieve form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$checkin_date = $_POST['checkin_date'];
$checkout_date = $_POST['checkout_date'];
$adults = $_POST['adults'];
$room_type = $_POST['rooms'];
$notes = $_POST['message'];
$totalAmount = $_POST['totalAmount'];

echo "Room Type: " . $room_type . "<br>";
// Generate random alphanumeric transaction ID
$trans_id = 'TRANS_ID' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

// Insert data into database
$sql = "INSERT INTO reservations (trans_id, name, phone, email, checkin_date, checkout_date, adults, room_type, notes, totalAmount)
        VALUES ('$trans_id', '$name', '$phone', '$email', '$checkin_date', '$checkout_date', '$adults', '$room_type', '$notes', '$totalAmount')";


if ($conn->query($sql) === TRUE) {
    echo "Reservation saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

// Store transaction ID in session
$_SESSION['trans_id'] = $trans_id;
?>


<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex flex-col justify-center items-center">
    <?php
    // Retrieve total amount and transaction ID from session
    $totalAmount = $_POST['totalAmount'];
    $trans_id = $_SESSION['trans_id'];

    // Display total amount and transaction ID
    echo "<h1 class='text-3xl font-bold mb-4'>Total Amount: $totalAmount</h1>";
   // echo "<p class='text-lg mb-8'>Transaction ID: $trans_id</p>";
    ?>

    <!-- Pay Now button -->
    <form action="gateway.php" method="post" class="text-center">
        <input type="hidden" name="totalAmount" value="<?php echo $totalAmount; ?>">
        <input type="hidden" name="trans_id" value="<?php echo $trans_id; ?>"> <!-- Add hidden input for trans_id -->
        <button type="submit" name="payNow" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pay Now</button>
    </form>
</body>
</html>

