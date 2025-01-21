<?php
include "config.php";
$id = $_GET["did"];
$sql = "DELETE FROM `class_time` WHERE `classTimeId`=$id";
if (mysqli_query($conn, $sql)) {
    header("Refresh:1,./index.php");
}
