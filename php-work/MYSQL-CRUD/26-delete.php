<?php
$stu_id = $_POST["id"];
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("connection failed");
$sql = "DELETE FROM students1 WHERE id=".$stu_id.";";
if (mysqli_query($conn, $sql)) {
    echo 1;
}else{
    echo 0;
}