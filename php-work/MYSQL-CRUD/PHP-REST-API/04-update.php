<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Application: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Requested-With');
include("config.php");
$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data["sid"];
$student_fname = $data["sfname"];
$student_lname = $data["slname"];
$student_age = $data["sage"];
$sql = "UPDATE students3 SET fname = '{$student_fname}', lname = '{$student_lname}', age = {$student_age} WHERE id = {$student_id}";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array("message" => "Records Updated Successfully", "status" => true), JSON_PRETTY_PRINT);
}else {
    echo json_encode(array("message" => "No Record Updated", "status" => false), JSON_PRETTY_PRINT);
}