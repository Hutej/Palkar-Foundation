<?php
$servername = "localhost"; // Remove the port number
$username = "root";
$password = ""; // Enter your database password if you have set one
$database = "plkrfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function filteration($data)
{
    foreach($data as $key => $value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);

        $data[$key]=$value;
    }
    return $data;
}

// function selectAll($table)
// {
//     $conn = $GLOBALS['conn'];
//     $res = mysqli_query($conn,"SELECT * FROM $table");
//     return $res;
// }



function select($sql, $values, $datatypes) 
{
    $conn = $GLOBALS['conn'];
    if($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if(mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query execution failed - " . mysqli_error($conn));
        }
    } else {
        die("Query cannot be prepared - " . mysqli_error($conn));
    }
}

function redirect($url)
{
    echo"<script>window.location.href='$url'</script>";
}
?>

