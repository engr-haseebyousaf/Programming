<?php
include "connect.php";
$id = $_GET["did"];


$data = "SELECT `facultyPic` FROM `single_faculty` WHERE `facultyId`=$id";
$res = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($res);
$oldImage = $row["facultyPic"];

$sql = "DELETE FROM `single_faculty` WHERE `facultyId` = $id;";
if (mysqli_query($conn, $sql)) {
    if (file_exists("./files/$oldImage")) {
        unlink("./files/$oldImage");
    }
    header("Location: ./index.php");
}
?>