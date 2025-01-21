<?php
include "./includes/connection.php";
$designerId = $_GET['id'];
$sql = "SELECT `designerPicture` FROM `designer` WHERE `designerId`='$designerId'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$designerOldPicture = $row["designerPicture"];
$dsql = "DELETE FROM `designer` WHERE `designerId`='$designerId'";
if (mysqli_query($conn, $dsql)) {
    if (file_exists("./uploads/designers/$designerOldPicture")) {
        unlink("./uploads/designers/$designerOldPicture");
    }
    header("Location:./view-designer.php");
}