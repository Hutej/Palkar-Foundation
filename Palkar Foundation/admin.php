<?php require('db\db_config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white rounded-lg shadow-md w-96">
        <form method="POST" class="p-8">
            <h4 class="bg-gray-800 text-white py-3 text-center rounded-t-lg">Admin Login Panel</h4>
            <div class="mt-4">
                <input name="admin_name" required type="text" class="form-input block w-full border-gray-300 shadow-sm focus:border-gray-400 focus:ring focus:ring-gray-200 rounded-md text-center" placeholder="Admin Name">
            </div>
            <div class="mt-4">
                <input name="admin_pass" required type="password" class="form-input block w-full border-gray-300 shadow-sm focus:border-gray-400 focus:ring focus:ring-gray-200 rounded-md text-center" placeholder="Password">
            </div>
            <button name="login" type="submit" class="mt-6 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">LOGIN</button>
        </form>
        <div class="text-center mt-4">
            <a href="index.html" class="text-blue-500 hover:underline">Go back to home page</a>
        </div>
    </div>

    <?php
    if(isset($_POST['login']))
    {
        $frm_data = filteration($_POST);
        $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
        $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
        $res = select($query, $values, "ss");
        
        if($res->num_rows == 1) {
            $row = mysqli_fetch_assoc($res);
            redirect('menu.php');
        } else {
            // Handle invalid login credentials here
        }
    }
    ?>
</body>
</html>
