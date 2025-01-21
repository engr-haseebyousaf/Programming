<?php
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("Connection failed");
$sql = "SELECT * FROM students1;";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $line = json_encode($row);
    echo $line;
}