<?php
include "connect.php";
$id = $_GET["did"];


$data = "SELECT `teacherPic` FROM `single_teacher` WHERE `teacherId`=$id";
$res = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($res);
$oldImage = $row["teacherPic"];

$sql = "DELETE FROM `single_teacher` WHERE `teacherId` = $id;";
if (mysqli_query($conn, $sql)) {
    if (file_exists("./files/$oldImage")) {
        unlink("./files/$oldImage");
    }
    header("Location: ./index.php");
}
?>