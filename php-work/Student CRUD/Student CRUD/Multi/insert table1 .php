
<?php
    include("./connection.php");
    if(isset($_POST["submit"])){
        $studentname = mysqli_real_escape_string($conn,$_POST["studentname"]);
        $studentfname = mysqli_real_escape_string($conn,$_POST["studentfname"]);
        $studentemail = mysqli_real_escape_string($conn,$_POST["studentemail"]);
        $studentcontact = mysqli_real_escape_string($conn,$_POST["studentcontact"]);
        $studentpic = $_FILES['studentpic']['name'];
       
        if(empty($studentname) || empty($studentfname) || empty($studentemail) || empty($studentcontact) || empty($studentpic[0])){
            $msg = "Please fill out the form carefully";
        } else {
            $saved_images =array();  // To store the names of valid images
            foreach($studentpic as $index => $pic1){
                $exe = pathinfo($pic1, PATHINFO_EXTENSION);
                $allowed_ext = array("png", "jpg","jpeg");

                if (in_array($exe, $allowed_ext)) {
                    $new_filename = date("dmY"). date("His"). rand(0,100000)."." .$exe;
                    $saved_images[] = $new_filename;
                } else {
                    $msg = "Invalid image type. Please upload PNG, JPG, or JPEG images.";
                    $saved_images = [];  // Clear the array if any image is invalid
                    break;
                }
            }
            
            if (!empty($saved_images)) {
                $imgfile = serialize($saved_images);
                $sql= "INSERT INTO `multitable1` ( `studentname`, `studentfname`, `studentemail`, `studentcontact`,`studentpic`) 
                        VALUES ('$studentname', '$studentfname', '$studentemail', '$studentcontact' , '$imgfile')";
                
                $run = mysqli_query($conn,$sql);
                if($run){
                    foreach ($saved_images as $p => $key) {
                        move_uploaded_file($_FILES['studentpic']['tmp_name'][$p],"./image/".$key);
                    }
                    $msg = "Data is inserted successfully";
                } else {
                    $msg = "Failed to insert data";
                }
            } else {
                $msg = "Image is not correct";
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
<h1><?php echo @$msg; ?></h1>
    <div class="container bg-info mt-2">
       
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
                <input type="file" name="studentpic[]"  multiple required>
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

