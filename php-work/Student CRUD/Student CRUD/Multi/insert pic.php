<?php
    if (isset($_POST["submit"])) {
        $stupic1 = $_FILES["stupic1"]["name"];
        $file=array();
        foreach($stupic1 as $pic1){
        $exe = pathinfo($pic1, PATHINFO_EXTENSION);
        $array = array("png", "jpg","jpeg");

        if (in_array($exe, $array)) {
            echo $file[] = date("d/m/y"). date("h.i.s"). rand(0,100000)."." .$exe;
            $msg ="right";
        }
        else{
            $msg = "wrong";
            $file = array();
            break;
        }
    }
    if ($msg=="right"){
        echo " images are correctly selected ";
    }else{
        echo " images are not correctly select so select again";
    }

    }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        <form method="post" enctype="multipart/form-data" >

        <input type="file" name="stupic1[]" multiple required>
        <input type="submit" value ="submit" name ="submit">
</form>
</body>

</html>








<!-- <?php 
//   if(isset($_POST['sub'])){
//      $studentpic=$_FILES["studentpic"]["name"];
//      $exe=pathinfo($studentpic,PATHINFO_EXTENSION);
//      $arr=array("png","jpg","jpeg");
//      if(in_array($exe,$arr)){
//         echo $filename=date("d/m/Y").date("h-i-s").rand(1,100000).".".$exe;
//      }

//   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype='multipart/form-data'>
            <input type="file" name="studentpic" required />
           
            <input type="submit" value="submit" name="sub" />
    </form>
</body>
</html> -->