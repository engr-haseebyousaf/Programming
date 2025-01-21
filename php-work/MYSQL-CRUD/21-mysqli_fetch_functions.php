<?php
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("connection error");
$query = "SELECT * FROM students1";
$result = mysqli_query($conn, $query) or die("Query Failed");
// $row = mysqli_fetch_assoc($result);
// echo "<pre>";
// print_r($row);
// echo "</pre>";

// $row = mysqli_fetch_array($result);
// echo "<pre>";
// print_r($row);
// echo "</pre>";

// $row = mysqli_fetch_all($result);
// echo "<pre>";
// print_r($row);
// echo "</pre>";

// $row = mysqli_fetch_row($result);
// echo "<pre>";
// print_r($row);
// echo "</pre>";

$row = mysqli_fetch_field($result);
echo "<pre>";
print_r($row);
echo "</pre>";
?>