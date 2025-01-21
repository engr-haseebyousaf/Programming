<?php
$EId = $_POST["edit_Id"];
$UFName = $_POST["updatedFName"];
$ULName = $_POST["updatedLName"];
$UAge = $_POST["updatedAge"];
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("connection error");
$query = "UPDATE students1 SET fname = '".$UFName."', lname = '".$ULName."', age = ".$UAge." WHERE id = ".$EId."";
if (mysqli_query($conn,$query)) {
    echo 1;
}else {
    echo 0;
}