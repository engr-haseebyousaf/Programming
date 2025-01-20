<?php
echo $name = $_POST['sname'];
$adress = $_POST['saddress'];
$class = $_POST['class'];
$phone = $_POST['sphone'];

$conn = mysqli_connect('localhost','root','','crud') or die("connection failed");
$sql = "insert into students(sname,sadress,sphone,sclass) values ('$name','$adress','$phone','$class')" or die("query failed");
$result = mysqli_query($conn, $sql) or die("not");
header("location: http://localhost/php/CRUD_HTML/index.php");
mysqli_close($conn);
?>