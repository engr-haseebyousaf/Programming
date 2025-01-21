<?php
$volunteerId = $_GET["id"];
$ssql = "SELECT `volunteerPicture` FROM `voluntter` WHERE `volunteerId`='$volunteerId'";
$sres = mysqli_query($conn, $ssql);
$srow = mysqli_fetch_assoc($sres);
$dsql = "DELETE FROM `volunteer` WHERE `volunteerId`='$volunteerId'";
$volunteerOldPicture = $dsql["volunteerPicture"];
if (mysqli_query($conn, $dsql)) {
    if (file_exists("./uploads/volunteers/$volunteerOldPicture")) {
        unlink("./uploads/volunteers/$volunteerOldPicture");
    }
    header("Refresh: 1, ./view-volunteer.php");
}