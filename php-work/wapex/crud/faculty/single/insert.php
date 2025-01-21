<?php
include "connect.php";
if (isset($_POST["facultyInsert"])) {
    $facultyFirstName = mysqli_real_escape_string($conn, $_POST["facultyFirstName"]);
    $facultyLastName = mysqli_real_escape_string($conn, $_POST["facultyLastName"]);
    $facultyPhone = mysqli_real_escape_string($conn, $_POST["facultyPhone"]);
    $facultyEmail = mysqli_real_escape_string($conn, $_POST["facultyEmail"]);
    $facultyCNIC = mysqli_real_escape_string($conn, $_POST["facultyCNIC"]);
    $facultyPic = $_FILES["facultyPic"]["name"];
    if (empty($facultyFirstName) || empty($facultyLastName) || empty($facultyEmail) || empty($facultyPhone) || empty($facultyCNIC) || empty($facultyPic)) {
        $msg = "<div class='alert alert-danger'>Please Fill All Values</div>";
    } else {
        $fileExt = pathinfo($facultyPic, PATHINFO_EXTENSION);
        $allowedExtensions = ["jpg","jpeg","png"];
        if (in_array($fileExt, $allowedExtensions)) {
            $facultyPicName = date("H-m-i") . "-" . random_int(100000, 999999) . "." . $fileExt;
            $insert_sql = "INSERT INTO `single_faculty` (`facultyFirstName`,`facultyLastName`,`facultyPhone`,`facultyEmail`,`facultyCNIC`,`facultyPic`) VALUES ('$facultyFirstName','$facultyLastName','$facultyPhone','$facultyEmail','$facultyCNIC','$facultyPicName')";
            if (mysqli_query($conn, $insert_sql)) {
                move_uploaded_file($_FILES["facultyPic"]["tmp_name"], "./images/$facultyPicName");
                $msg = "<div class='alert alert-success'>Student Data Inserted Successfully</div>";
                header("Refresh: 1,./index.php");
            }
        } else {
            $msg = "<div class='alert alert-warning'>Please Select Right Extension</div>";
        }
    }

    
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Single Faculty | Insert Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<div class="container bg-primary text-white">
    <div class="row">
        <div class="col-md-6"><?php echo @$msg ?></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center py-3">Faculty Insert</h2>
        </div>
    </div>
</div>
<body>
<div class="container bg-info py-3">
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="facultyFirstName" class="col-4 col-form-label"><b>facultyFirstName</b></label>
            <div class="col-8">
                <input type="text" class="form-control" name="facultyFirstName" id="facultyFirstName"
                    placeholder="facultyFirstName" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="facultyLastName" class="col-4 col-form-label"><b>facultyLastName</b></label>
            <div class="col-8">
                <input type="text" class="form-control" name="facultyLastName" id="facultyLastName"
                    placeholder="facultyLastName" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="facultyEmail" class="col-4 col-form-label"><b>facultyEmail</b></label>
            <div class="col-8">
                <input type="email" class="form-control" name="facultyEmail" id="facultyEmail"
                    placeholder="facultyEmail" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="facultyPhone" class="col-4 col-form-label"><b>facultyPhone</b></label>
            <div class="col-8">
                <input type="text" class="form-control" name="facultyPhone" id="facultyPhone"
                    placeholder="facultyPhone" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="facultyCNIC" class="col-4 col-form-label"><b>facultyCNIC</b></label>
            <div class="col-8">
                <input type="text" class="form-control" name="facultyCNIC" id="facultyCNIC"
                    placeholder="facultyCNIC" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="facultyPic" class="col-4 col-form-label"><b>facultyPic</b></label>
            <div class="col-8">
                <input type="file" class="form-control" name="facultyPic" id="facultyPic"
                    placeholder="facultyPic" />
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" name="facultyInsert" class="btn btn-primary">
                    Insert
                </button>
            </div>
        </div>
    </form>
</div>

</body>

</html>


<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1form5P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>