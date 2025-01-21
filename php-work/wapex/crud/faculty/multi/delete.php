<?php
include "connect.php";
$id = $_GET["did"];
$select_sql = "SELECT `staffPic` FROM `multi_staff` WHERE `staffId`=$id";
$res = mysqli_query($conn, $select_sql);
$row = mysqli_fetch_assoc($res);
$pics = unserialize($row["staffPic"]);

$sql = "DELETE FROM `multi_staff` WHERE `staffId`=$id";
if (mysqli_query($conn, $sql)) {
    foreach ($pics as $pic) {
        if (file_exists("./images/$pic")) {
            unlink("./images/$pic");
        }
    }
    header("Location:./index.php");
}
?>