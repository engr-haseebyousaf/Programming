<?php
include "config.php";

$id = $_GET["uid"];
$show_sql = "SELECT * FROM `multi_teacher` WHERE `teacherId`=$id";
$res = mysqli_query($conn, $show_sql);
$row = mysqli_fetch_array($res);




if (isset($_POST["update"])) {
    $teacherFirstName = mysqli_real_escape_string($conn, $_POST["teacherFirstName"]);
    $teacherLastName = mysqli_real_escape_string($conn, $_POST["teacherLastName"]);
    $teacherPhone = mysqli_real_escape_string($conn, $_POST["teacherPhone"]);
    $teacherEmail = mysqli_real_escape_string($conn, $_POST["teacherEmail"]);
    $teacherPicNames = $_FILES["teacherPic"]["name"];
    $teacherPicTmpNames = $_FILES["teacherPic"]["tmp_name"];
    if (empty($teacherFirstName) || empty($teacherLastName) || empty($teacherPhone) || empty($teacherEmail)) {
        $msg = "<div class='alert alert-danger'>Please Fill All Values Except Image</div>";
    } else {
        if (isset($_FILES["teacherPic"]["name"][0]) && !empty($_FILES["teacherPic"]["name"][0])) {
            $picNewNames = [];
            $checkExt = true;
            foreach ($teacherPicNames as $teacherPicName) {
                $ext = pathinfo($teacherPicName,PATHINFO_EXTENSION);
                $allowedExtensions = ["jpg","png","jpeg"];
                if (in_array($ext, $allowedExtensions)) {
                    $picNewNames[] = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
                } else {
                    $msg = "<div class='alert alert-warning'>Please Select Right Image Format</div>";
                    $picNewNames = [];
                    $checkExt = false;
                    break;
                }
            }
            $picsUpload = serialize($picNewNames);
            $sql = "UPDATE `multi_teacher` SET `teacherFirstName`='$teacherFirstName',`teacherLastName`='$teacherLastName',`teacherPhone`='$teacherPhone',`teacherEmail`='$teacherEmail',`teacherPic`='$picsUpload'  WHERE `teacherId`=$id";
            if (mysqli_query($conn, $sql)) {
                $oldPics = unserialize($row["teacherPic"]);
                foreach ($picNewNames as $index => $picName) {
                    $oldPic = $oldPics[$index];
                    if (file_exists("./images/$picName")) {
                        unlink("./images/$picName");
                    }
                    move_uploaded_file($teacherPicTmpNames[$index],"./images/$picName");
                }
                $msg = "<div class='alert alert-success'>Updated Successfully</div>";
                header("Refresh:1,./index.php");
            }
        } else {
            $sql = "UPDATE `multi_teacher` SET `teacherFirstName`='$teacherFirstName',`teacherLastName`='$teacherLastName',`teacherPhone`='$teacherPhone',`teacherEmail`='$teacherEmail' WHERE `teacherId`=$id";
            if (mysqli_query($conn, $sql)) {
                $msg = "<div class='alert alert-success'>Updated Successfully</div>";
                header("Refresh:1,./index.php");
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Multi Teachers | Update Values</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-warning mt-3">
        <div class="row">
            <div class="col">
                <h3>Teachers Update Data</h3>
            </div>
        </div>
        <div class="row">
            <?php echo @$msg ?>
        </div>
    </div>
    <div class="container bg-success py-3">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="teacherFirstName" class="col-4 col-form-label"><b>teacherFirstName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["teacherFirstName"] ?>" name="teacherFirstName" id="teacherFirstName" placeholder="teacherFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherLastName" class="col-4 col-form-label"><b>teacherLastName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["teacherLastName"] ?>" name="teacherLastName" id="teacherLastName" placeholder="teacherLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherPhone" class="col-4 col-form-label"><b>teacherPhone</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["teacherPhone"] ?>" name="teacherPhone" id="teacherPhone" placeholder="teacherPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherEmail" class="col-4 col-form-label"><b>teacherEmail</b></label>
                <div class="col-8">
                    <input type="email" class="form-control" value="<?php echo $row["teacherEmail"] ?>" name="teacherEmail" id="teacherEmail" placeholder="teacherEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherPic" class="col-4 col-form-label"><b>teacherPic</b></label>
                <div class="col-8">
                    <input type="file" class="form-control" name="teacherPic[]" multiple id="teacherPic" placeholder="teacherPic" />
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <input type="submit" value="Update" name="update" class="btn btn-primary">
                    
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