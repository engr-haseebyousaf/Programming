<?php
header('Content-Type: application/json');
header('Allow-Application-Access-Control: *');
include("config.php");
$sql = "SELECT * FROM students3";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0) {
    $db_fetch_assoc = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($db_fetch_assoc, JSON_PRETTY_PRINT);
}else {
    echo json_encode(array("message" => "No Record Found!", "status" => false));
}