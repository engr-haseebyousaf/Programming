<?php 
include "config.php";
$id = $_GET["did"];
$sql = "SELECT `studentPic` FROM `multi_student` WHERE `studentId`=$id";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$oldPics = unserialize($row["studentPic"]);

$del_sql = "DELETE FROM `multi_student` WHERE `studentId`=$id;";
if (mysqli_query($conn, $del_sql)) {
    foreach ($oldPics as $value) {
        if (file_exists("./images/$value")) {
            unlink("./images/$value");
        }
    }
    header("Location: ./index.php");
}