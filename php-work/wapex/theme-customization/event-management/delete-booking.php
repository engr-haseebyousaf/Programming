<?php
include "./includes/connection.php";
$bookingId = $_GET["id"];
$sql = "DELETE FROM `booking` WHERE `bookingId`='$bookingId'";
// die($sql);
if (mysqli_query($conn, $sql)) {
    header("Location:./view-booking.php");
}