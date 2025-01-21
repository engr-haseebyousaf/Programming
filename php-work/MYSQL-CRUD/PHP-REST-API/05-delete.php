<?php
header('Content-Type : Application/json');
header('Access-Control-Allow-Origin : *');
header('Access-Control-Allow-Methods : DELETE');
header('Access-Control-Allow-Headers : Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Origin, Authorization, X-Requested-With');
include('config.php');
$data = json_decode(file_get_contents('php://input'), true);
$student_id = $data["sid"];
$sql = "DELETE FROM students3 WHERE id = '{$student_id}';";
if (mysqli_query($conn ,$sql)) {
    echo json_encode(array("message" => "Deleted Successfully!", "status" => true), JSON_PRETTY_PRINT);
}else {
    echo json_encode(array("message" => "Deleted Unsuccessfully!", "status" => false), JSON_PRETTY_PRINT);
}