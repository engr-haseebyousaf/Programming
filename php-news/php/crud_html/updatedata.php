<?php
$id = $_POST['sid'];
$name = $_POST['sname'];
$adress = $_POST['sadress'];
$class = $_POST['sclass'];
$phone = $_POST['sphone'];

$conn = mysqli_connect('localhost','root','','crud') or die("connection failed");
$sql = "UPDATE students SET sname='$name',sadress='$adress',sclass='$class',sphone=$phone WHERE sid='$id'" or die("query failed");
$result = mysqli_query($conn, $sql) or die("could not connect");
header("location: http://localhost/php/CRUD_HTML/index.php");
?>