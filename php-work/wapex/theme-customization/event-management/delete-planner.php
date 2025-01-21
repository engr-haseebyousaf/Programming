<?php
include "./includes/connection.php";
$id = $_GET["id"];
$ssql = "SELECT `plannerPic` FROM `planner` WHERE `plannerId`='$id'";
$sres = mysqli_query($conn, $ssql);
$srow = mysqli_fetch_assoc($sres);
$plannerOldPic = $srow["plannerPic"];
$sql = "DELETE FROM `planner` WHERE `plannerId`='$id'";
if (mysqli_query($conn, $sql)) {
    if (file_exists("./uploads/planners/$plannerOldPic")) {
        unlink("./uploads/planners/$plannerOldPic");
    }
    header("Location:./view-planner.php");
}
?>