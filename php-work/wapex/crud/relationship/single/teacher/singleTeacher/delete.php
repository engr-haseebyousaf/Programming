<?php
include "connect.php";
$id = $_GET["did"];


$data = "SELECT `teacherPic`,`teacherId` FROM `relationshipTeacher` WHERE `teacherId`=$id";
$res = mysqli_query($conn, $data);
$row = mysqli_fetch_assoc($res);
// die($row["teacherStudent"]);
$oldImage = $row["teacherPic"];

$sql = "DELETE FROM `relationshipTeacher` WHERE `teacherId` = $id;";
if (mysqli_query($conn, $sql)) {
    if (file_exists("./files/$oldImage")) {
        unlink("./files/$oldImage");
    }
    $teacherId = $row["teacherId"];
    $teacher_sql = "UPDATE `relationshipStudent` SET `studentTeacher` = 0 WHERE `studentTeacher`=$teacherId";
    if (mysqli_query($conn, $teacher_sql)) {
        header("Location: ./index.php");
    }
    
}
?>