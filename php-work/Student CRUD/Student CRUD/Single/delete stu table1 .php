<?php
  include("./connection.php");

  $stu_id = $_GET["delid"];
  $sql= "SELECT `studentpic` FROM `table1` WHERE `studentid`= '$stu_id' ";
  $result=mysqli_query($conn,$sql);
  $fet = mysqli_fetch_assoc($result);
  if (file_exists("./image".$fet["studentpic"])){
    unlink("./image".$fet["studentpic"]);
  }
  $sqldel = "DELETE FROM `table1` WHERE `studentid`= '$stu_id'";
  $resultdel=mysqli_query($conn,$sqldel);
  if ($resultdel){
    header("Location: ./view table 1.php");
  }





?>