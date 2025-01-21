<?php
header('Content-Type: application/json');
header('Allow-Application-Access-Control: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Requested-With');
include("config.php");
$data = json_decode(file_get_contents("php://input"), true);
$student_fname = $data["sfname"];
$student_lname = $data["slname"];
$student_age = $data["sage"];
$sql = "INSERT INTO students3 (fname, lname, age) VALUES ('{$student_fname}', '{$student_lname}', {$student_age})";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array("message" => "Records Inserted Successfully", "status" => true), JSON_PRETTY_PRINT);
}else {
    echo json_encode(array("message" => "No Record Inserted", "status" => false), JSON_PRETTY_PRINT);
}