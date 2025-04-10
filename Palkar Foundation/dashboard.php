<?php
// Include the database configuration file
require_once('db\db_config.php');

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve data from the reservations table
$query = "SELECT * FROM reservations ORDER BY id DESC";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn)); // Display error message and stop script execution
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
    <title>Dashboard- Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DashBoard
            <div class="float-right">
                <button class="btn btn-danger" onclick="logout()">Logout</button>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search by Name, Transaction ID, Phone, or Email">
            </div>
            <table id="dataTable" class="table table-bordered">
                <!-- Table header goes here -->
                <tbody>
                    <?php
                    // Loop through each row in the result set and display it in the table
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['trans_id']}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['phone']}</td>";
                            echo "<td>{$row['email']}</td>";
                            // Format check-in date to dd-mm-yyyy
                            echo "<td>" . date('d-m-Y', strtotime($row['checkin_date'])) . "</td>";
                            // Format check-out date to dd-mm-yyyy
                            echo "<td>" . date('d-m-Y', strtotime($row['checkout_date'])) . "</td>";
                            echo "<td>{$row['adults']}</td>";
                            echo "<td>{$row['room_type']}</td>";
                            echo "<td>{$row['notes']}</td>";
                            echo "<td>{$row['totalAmount']}</td>";
                            echo "<td>{$row['payment']}</td>";
                            // Print button to redirect to print.php with specific entry details
                            echo "<td><a href='print.php?id={$row['id']}' class='btn btn-primary'>Print</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>No records found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer class="py-4 bg-light mt-auto">
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        function logout() {
            // Redirect to admin.php page
            window.location.href = "admin.php";
        }

        document.addEventListener('DOMContentLoaded', function () {
            const dataTable = new simpleDatatables.DataTable('#dataTable', {
                paging: true,
                paginationSize: 10, // Limiting to 10 rows per page
                searchable: false, // Disable SimpleDatatables' default search
            });

            // Custom search functionality
            document.getElementById('searchInput').addEventListener('input', function () {
                const searchString = this.value.toLowerCase();
                dataTable.search(searchString).draw();
            });
        });
    </script>
</body>
</html>
        