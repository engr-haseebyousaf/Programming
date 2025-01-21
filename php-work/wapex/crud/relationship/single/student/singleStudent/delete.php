<?php
include "connect.php";
$id = $_GET["did"];


$data = "SELECT `studentPic`,`studentTeacher` FROM `relationshipStudent` WHERE `studentId`=$id";
$res = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($res);
$oldImage = $row["studentPic"];

$sql = "DELETE FROM `relationshipStudent` WHERE `studentId` = $id;";
if (mysqli_query($conn, $sql)) {
    if (file_exists("./files/$oldImage")) {
        unlink("./files/$oldImage");
    }
    $teacherId = $row["studentTeacher"];
    $teacher_sql = "UPDATE `relationshipTeacher` SET `teacherStudent` = 0 WHERE `teacherId`=$teacherId";
    if (mysqli_query($conn, $teacher_sql)) {
        header("Location: ./index.php");
    }
    
}
?>