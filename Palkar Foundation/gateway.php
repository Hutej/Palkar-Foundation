<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex flex-col justify-center items-center">
    <?php
    // Check if totalAmount and trans_id are passed through the POST request
    if(isset($_POST['totalAmount']) && isset($_POST['trans_id'])) {
        // Retrieve total amount and transaction ID
        $totalAmount = $_POST['totalAmount'];
        $trans_id = $_POST['trans_id'];

        // Database configuration
        require('db\db_config.php');
        // Update payment status to 'paid' in the reservations table
        $sql = "UPDATE reservations SET payment='paid' WHERE trans_id='$trans_id'";

        if ($conn->query($sql) === TRUE) {
            ?>
            <h1 class="text-3xl font-bold mb-4">Payment Successful</h1>
            <p class="text-lg mb-2">Transaction ID: <?php echo $trans_id; ?></p>
            <p class="text-lg mb-4">Total Amount: <?php echo $totalAmount; ?></p>
            <p class="text-lg mb-8">Payment status updated in the database.</p>
            <form action="printu.php" method="get" class="text-center">
                <input type="hidden" name="trans_id" value="<?php echo $trans_id; ?>">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Print Receipt</button>
            </form>
            <?php
            // Close connection
            $conn->close();

            // Close the session
            session_start();
            session_unset();
            session_destroy();
        } else {
            echo "<p class='text-red-500'>Error updating payment status: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='text-red-500'>Error: Total amount or transaction ID not provided</p>";
    }
    ?>
</body>
</html>
