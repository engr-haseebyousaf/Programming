<?php
  include("./connection.php");

  $stuid = $_GET["delid"];
  $sql= "SELECT `studentpic` FROM `multitable1` WHERE `studentid`= '$stuid' ";
  $result=mysqli_query($conn,$sql);
  $fet = mysqli_fetch_assoc($result);
  $pic = unserialize($fet['studentpic']);
    foreach($pic as $p){
        if (file_exists("./image".$p)){
          unlink("./image".$p);
        }
    }
  $sqldel = "DELETE FROM `multitable1` WHERE `studentid`= '$stuid'";
  $resultdel=mysqli_query($conn,$sqldel);
  if ($resultdel){
    header("Location: ./view table 1.php");
  }





?>