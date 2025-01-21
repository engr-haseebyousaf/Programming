<?php
include "./includes/connection.php";
$id = $_GET["categoryId"];
$sql = "DELETE FROM `categories` WHERE `categoryId`='$id'";
if (mysqli_query($conn, $sql)) {
    header("Location:./categories.php");
}
?>