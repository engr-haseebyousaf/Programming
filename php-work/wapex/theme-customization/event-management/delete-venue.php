<?php
include "./includes/connection.php";
$venueId = $_GET["id"];
$sql = "DELETE FROM `venue` WHERE `venueId`='$venueId'";
if (mysqli_query($conn, $sql)) {
    header("Location:./view-venue.php");
}