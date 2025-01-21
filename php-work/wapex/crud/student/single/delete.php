<?php
include "connect.php";
$id = $_GET["did"];


$data = "SELECT `studentPic` FROM `single_student` WHERE `studentId`=$id";
$res = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($res);
$oldImage = $row["studentPic"];

$sql = "DELETE FROM `single_student` WHERE `studentId` = $id;";
if (mysqli_query($conn, $sql)) {
    if (file_exists("./files/$oldImage")) {
        unlink("./files/$oldImage");
    }
    header("Location: ./index.php");
}
?>