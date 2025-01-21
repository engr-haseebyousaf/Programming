<?php
include "connect.php";
if (isset($_POST["insert"])) {
    $teacherFirstName = mysqli_real_escape_string($conn, $_POST["teacherFirstName"]);
    $teacherLastName = mysqli_real_escape_string($conn, $_POST["teacherLastName"]);
    $teacherPhone = mysqli_real_escape_string($conn, $_POST["teacherPhone"]);
    $teacherEmail = mysqli_real_escape_string($conn, $_POST["teacherEmail"]);
    $teacherPic = $_FILES["teacherPic"]["name"];
    if (empty($teacherFirstName) || empty($teacherLastName) || empty($teacherEmail) || empty($teacherPhone) || empty($teacherPic)) {
        $msg = "<div class='alert alert-danger'>Please Fill All Values</div>";
    } else {
        $fileExt = pathinfo($teacherPic, PATHINFO_EXTENSION);
        $allowedExtensions = ["jpg","jpeg","png"];
        if (in_array($fileExt, $allowedExtensions)) {
            $teacherPicName = date("H-m-i") . "-" . random_int(100000, 999999) . "." . $fileExt;
            $insert_sql = "INSERT INTO `single_teacher` (`teacherFirstName`,`teacherLastName`,`teacherPhone`,`teacherEmail`,`teacherPic`) VALUES ('$teacherFirstName','$teacherLastName','$teacherPhone','$teacherEmail','$teacherPicName')";
            if (mysqli_query($conn, $insert_sql)) {
                move_uploaded_file($_FILES["teacherPic"]["tmp_name"], "./images/$teacherPicName");
                $msg = "<div class='alert alert-success'>teacher Data Inserted Successfully</div>";
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
    <title>Teacher Insert Data</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-success text-white">
        <div class="row">
            <div class="col">
                <?php echo @$msg ?>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <h2>Teacher Insert Data</h2>
            </div>
        </div>
    </div>
    <div class="container py-3 bg-warning">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="teacherFirstName" class="col-4 col-form-label">teacherFirstName</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherFirstName" id="teacherFirstName" placeholder="teacherFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherLastName" class="col-4 col-form-label">teacherLastName</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherLastName" id="teacherLastName" placeholder="teacherLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherPhone" class="col-4 col-form-label">teacherPhone</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherPhone" id="teacherPhone" placeholder="teacherPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherEmail" class="col-4 col-form-label">teacherEmail</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="teacherEmail" id="teacherEmail" placeholder="teacherEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherPic" class="col-4 col-form-label">teacherPic</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="teacherPic" id="teacherPic" placeholder="teacherPic" />
                </div>
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <input type="submit" name="insert" value="insert" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>