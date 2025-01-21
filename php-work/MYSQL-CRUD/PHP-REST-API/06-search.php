<?php
header('Content-Type : Application/json');
header('Access-Control-Allow-Origin : *');
header('Access-Control-Allow-Methods : PUT');
header('Access-Control-Allow-Headers : Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Origin, Authorization, X-Requested-With');
include('config.php');
$data = json_decode(file_get_contents('php://input'), true);
$student_fname = $data["sfname"];
$student_lname = $data["slname"];
$sql = "SELECT * FROM students3 WHERE fname LIKE '%{$student_fname}%' OR lname LIKE '%{$student_lname}%';";
$result = mysqli_query($conn ,$sql);
if (mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($row, JSON_PRETTY_PRINT);
}else {
    echo json_encode(array("message" => "No Record Found!", "status" => false));
}