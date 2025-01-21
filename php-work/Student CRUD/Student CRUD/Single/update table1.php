<?php
    include("./connection.php");
    $stu_id = $_GET["upid"];
    $sql= "SELECT * FROM `table1` WHERE `studentid`= '$stu_id' ";
    $result=mysqli_query($conn,$sql);
    $fet = mysqli_fetch_assoc($result);
    if(isset($_POST["submit"])){
        echo $studentname = mysqli_real_escape_string($conn,$_POST["studentname"]);
        echo $studentfname = mysqli_real_escape_string($conn,$_POST["studentfname"]);
        echo $studentemail = mysqli_real_escape_string($conn,$_POST["studentemail"]);
        echo $studentcontact = mysqli_real_escape_string($conn,$_POST["studentcontact"]);
        $studentpic = $_FILES['studentpic']['name'];

    
    if(empty($studentname) || empty($studentfname) || empty($studentemail) || empty($studentcontact) || empty($studentpic)){
            $msg = "please fill out the form carefully";
        }
    else{
        if(!empty ($studentpic)){

             $exe = pathinfo($studentpic, PATHINFO_EXTENSION);
             $array = array("png", "jpg","jpeg");
           
         if (in_array($exe, $array)) {
                  echo $file =date("h.i.s"). rand(0,100000)."." .$exe;

          if (file_exists("./image".$fet["studentpic"])){
                    unlink("./image".$fet["studentpic"]);
            }

            $sql = "UPDATE `table1` SET `studentname` = '$studentname', `studentfname` = '$studentfname', `studentemail` = '$studentemail', `studentcontact` = '$studentcontact', `studentpic` = '$file'  WHERE `studentid`='$stu_id'";
            $run = mysqli_query($conn, $sql);
            if($run){
                 move_uploaded_file($_FILES['studentpic']['tmp_name'],"./image/".$file);
                 $msg ="data is updated";
                header("Refresh: 3,url= ./view table 1.php");
                     }
            else{
                $msg = "data is not updated";
                }
           }
                    else{
                        $msg = "image is not correct";
         }       

    }
     else{
        $file= $fet["studentpic"];
        $sql= "UPDATE `table1` SET `studentname` = '$studentname',`studentfname`= $studentfname', 
        `studentemail`= '$studentemail', `studentcontact` = '$studentcontact',`studentpic`= '$file'  WHERE `studentid`='$stu_id'"; 
        $run = mysqli_query($conn,$sql);
        if($run){
                  $msg ="data is updated";
                 header("Refresh: 3,url= ./view table 1.php");
                }
         else{
              $msg = "data is not updated";
             }
        }
                 

}
    }
    
?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-info">
        <h1><?php echo @$msg; ?></h1>
        <form method = "post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">studentname</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentname" id="inputName" placeholder="Name"  Required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">studentfname</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentfname" id="inputName" placeholder="Name" Required  />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">studentemail</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="studentemail" id="inputName" placeholder="Name" Required  />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">studentcontact</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="studentcontact" id="inputName" placeholder="Name" Required />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">studentpic</label>
                <div class="col-8">
                <input type="file" name="studentpic">
                </div>
            </div>

           

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <input type ="submit"  value="submit"  class="btn btn-success" name="submit">
                </div>
            </div>
        </form>
    </div>






















    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
