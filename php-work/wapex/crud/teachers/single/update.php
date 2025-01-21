<?php
include "connect.php";
$id = $_GET["uid"];
$show_sql = "SELECT * FROM `single_teacher` WHERE `teacherId` = '$id';";
$res = mysqli_query($conn, $show_sql);
$row = mysqli_fetch_assoc($res);



// Update Code
if (isset($_POST["update"])) {
    $teacherFirstName = mysqli_real_escape_string($conn, $_POST["teacherFirstName"]);
    $teacherLastName = mysqli_real_escape_string($conn, $_POST["teacherLastName"]);
    $teacherPhone = mysqli_real_escape_string($conn, $_POST["teacherPhone"]);
    $teacherEmail = mysqli_real_escape_string($conn, $_POST["teacherEmail"]);
    if (!empty($teacherFirstName) || !empty($teacherLastName) || !empty($teacherPhone) || !empty($teacherEmail)) {
        if (!empty($_FILES["teacherPic"]["name"])) {
            $teacherPic = $_FILES["teacherPic"]["name"];
            $ext = pathinfo($teacherPic, PATHINFO_EXTENSION);
            $allowedExtensions = ["jpg","jpeg","png"];
            if (in_array($ext, $allowedExtensions)) {
                $oldImageName = $row["teacherPic"];
                $teacherPicName = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
                $teacherPicTmpName = $_FILES["teacherPic"]["tmp_name"];
                $sql = "UPDATE `single_teacher` SET `teacherFirstName`='$teacherFirstName',`teacherLastName`='$teacherLastName',`teacherPhone`='$teacherPhone',`teacherEmail`='$teacherEmail',`teacherPic`='$teacherPicName' WHERE `teacherId` = $id;";
                if (mysqli_query($conn, $sql)) {
                    if (file_exists("./images/$oldImageName")) {
                        unlink("./images/$oldImageName");
                    }
                    move_uploaded_file($teacherPicTmpName, "./images/$teacherPicName");
                    $msg = "<div class='alert alert-success'>Updated Successfully</div>";
                    header("Refresh: 1, ./index.php");
                }
            } else {
                $msg = "<div class='alert alert-warning'>Please Select the right Format</div>";
            }
        } else {
            $sql = "UPDATE `single_teacher` SET `teacherFirstName`='$teacherFirstName',`teacherLastName`='$teacherLastName',`teacherPhone`='$teacherPhone',`teacherEmail`='$teacherEmail' WHERE `teacherId` = $id;";
                if (mysqli_query($conn, $sql)) {
                    $msg = "<div class='alert alert-success'>Updated Successfully</div>";
                    header("Refresh: 1, ./index.php");
                }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Please Fill All the values</div>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Single teacher | Update Data</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4 bg-primary">
        <div class="row">
            <div class="col">
                <?php echo @$msg ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="text-center">teacher Update Data</h2>
            </div>
        </div>
    </div>
    <div class="container py-3 bg-info">
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
                    <input type="file" class="form-control" name="teacherPic" id="teacherPic" placeholder="teacherPic" />
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name="update" class="btn btn-primary">
                        Update
                    </button>
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