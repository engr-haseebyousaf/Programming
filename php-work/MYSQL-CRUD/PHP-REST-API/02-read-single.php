<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include("config.php");
$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data["sid"];
$sql = "SELECT * FROM students3 WHERE id = '{$student_id}'";
$result = mysqli_query($conn, $sql) or die("connection failed!");
if (mysqli_num_rows($result)>0) {
    $db_fetch_assoc = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($db_fetch_assoc, JSON_PRETTY_PRINT);
}else {
    echo json_encode(array("message" => "No Record Found!", "status" => false));
}