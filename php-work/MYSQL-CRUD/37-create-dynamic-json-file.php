<?php
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("Could not connect");
$sql = "SELECT * FROM students3;";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_all($result,MYSQLI_ASSOC);

$encoded_array = json_encode($row,JSON_PRETTY_PRINT);
$file_name = "json" . date("d-m-Y") . ".json";
if (file_put_contents("json/{$file_name}",$encoded_array)) {
    echo "{$file_name} created";
}

// echo "<pre>";
// print_r($row);
// echo "</pre>";


