<?php 
include "config.php";
$id = $_GET["did"];
$sql = "SELECT `teacherPic` FROM `relationshipmultiteacher` WHERE `teacherId`=$id";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$oldPics = unserialize($row["teacherPic"]);
$del_sql = "DELETE FROM `relationshipmultiteacher` WHERE `teacherId`=$id;";
if (mysqli_query($conn, $del_sql)) {
    foreach ($oldPics as $value) {
        if (file_exists("./images/$value")) {
            unlink("./images/$value");
        }
    } 
    $update_teacher_student_sql = "UPDATE `relationshipmultistudent` SET `studentTeacher`='0' WHERE `studentTeacher`='$id';";
    if (mysqli_query($conn, $update_teacher_student_sql)) {
        header("Location: ./index.php");
    }
    
}