<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "test";
$conn = mysqli_connect($hostname, $username, $password, $database);
if ($conn) {
    echo "Connection Successful";
} else {
    die("Your connection has error : " . mysqli_error_list($conn) . " : error no" . mysqli_errno($conn));
}
?>