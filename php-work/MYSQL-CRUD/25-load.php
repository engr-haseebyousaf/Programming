<?php
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("connection failed");
$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$Stu_age = $_POST["stu_age"];
$sql = "INSERT INTO students1 (fname,lname,age) VALUES ('".$fname."','".$lname."',".$Stu_age.");";
if (mysqli_query($conn, $sql)) {
    echo 1;
}else {
    echo 0;
}