<?php 
include "config.php";
$id = $_GET["uid"];
$sql = "SELECT * FROM `relationshipmultiteacher` AS rmt INNER JOIN `relationshipmultistudent` AS rms ON rmt.`teacherStudent`=rms.`studentId` INNER JOIN `relationshipmulticlasstime` AS rmc ON rmt.`teacherClass`=rmc.`classTimeId` WHERE `teacherId` = $id;";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
// echo "<pre>";
// print_r($row);
// echo "</pre>";

if (isset($_POST["update"])) {
    $teacherFirstName = mysqli_real_escape_string($conn, $_POST["teacherFirstName"]);
    $teacherLastName = mysqli_real_escape_string($conn, $_POST["teacherLastName"]);
    $teacherStudent = mysqli_real_escape_string($conn, $_POST["teacherStudent"]);
    $teacherClass = mysqli_real_escape_string($conn, $_POST["teacherClass"]);
    $teacherPhone = mysqli_real_escape_string($conn, $_POST["teacherPhone"]);
    $teacherEmail = mysqli_real_escape_string($conn, $_POST["teacherEmail"]);
    if (!empty($_FILES["teacherPic"]["name"][0])) {
        $teacherPic = $_FILES["teacherPic"]["name"];
        $teacherPicNewNames = [];
        $checkExt = true;
        foreach ($teacherPic as $value0) {
            $ext = pathinfo($value0, PATHINFO_EXTENSION);
            $allowedExt = ["jpg","jpeg","png"];
            if (in_array($ext, $allowedExt)) {
                $teacherPicNewNames[] = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
            } else {
                $checkExt = false;
                break;
            }
        }
        if ($checkExt) {
            $teacherPicNames = serialize($teacherPicNewNames);
                $sql2 = "UPDATE `relationshipmultiteacher` SET `teacherFirstName`='$teacherFirstName',`teacherLastName`='$teacherLastName',`teacherStudent`='$teacherStudent',`teacherClass`='$teacherClass',`teacherPhone`='$teacherPhone',`teacherEmail`='$teacherEmail',`teacherPic`='$teacherPicNames' WHERE `teacherId`=$id";
                // die($teacherPicNames);
                if (mysqli_query($conn, $sql2)) {
                    $oldImages = unserialize($row["teacherPic"]);
                    foreach ($teacherPicNewNames as $key => $value) {
                        $teacherPicTmp = $_FILES["teacherPic"]["tmp_name"][$key];
                        if (isset($oldImages[$key])) {
                            $oldImage = $oldImages[$key];
                            if (file_exists("./images/$oldImage")) {
                                unlink("./images/$oldImage");
                            }
                        }
                        move_uploaded_file($teacherPicTmp, "./images/$value");
                    }
                    $msg = "<div class='alert alert-success'>Data Updated Successfully</div>";
                    header("Refresh:2,./index.php");
                } else {
                    $msg = "<div class='alert alert-success'>Could Not Update Record</div>";
                }
            } else {
            $msg = "<div class='alert alert-warning'>Please Select Right Image Format</div>";
        }
    } else {
        $sql2 = "UPDATE `relationshipmultiteacher` SET `teacherFirstName`='$teacherFirstName',`teacherLastName`='$teacherLastName',`teacherStudent`='$teacherStudent',`teacherClass`='$teacherClass',`teacherPhone`='$teacherPhone',`teacherEmail`='$teacherEmail' WHERE `teacherId`=$id";
        if (mysqli_query($conn, $sql2)) {
            $msg = "<div class='alert alert-success'>Updated Successfully</div>";
            header("Refresh:2,./index.php");
        }
    }
}   

?>
<!doctype html>
<html lang="en">

<head>
    <title>Multiple teacher | Update</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-info">
        <div class="row">
            <div class="col">
                <?php echo @$msg ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>Multiple teacher Update</h2>
            </div>
        </div>
    </div>
    <div class="container text-white py-3 bg-primary">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="teacherFirstName" class="col-4 col-form-label"><b>teacherFirstName</b></label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["teacherFirstName"] ?>" class="form-control" name="teacherFirstName" id="teacherFirstName" placeholder="teacherFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherLastName" class="col-4 col-form-label"><b>teacherLastName</b></label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["teacherLastName"] ?>" class="form-control" name="teacherLastName" id="teacherLastName" placeholder="teacherLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherStudent" class="col-4 col-form-label"><b>teacherStudent</b></label>
                <div class="col-8">
                    <select class="form-select" name="teacherStudent" id="teacherStudent">
                        <?php
                        $student_sql = "SELECT `studentId`,`studentFirstName`,`studentLastName` FROM `relationshipmultistudent`";
                        $student_res = mysqli_query($conn, $student_sql);
                        $previous_student = $row["teacherStudent"];
                        while ($student_row = mysqli_fetch_assoc($student_res)) {
                            if ($student_row["studentId"] == $previous_student) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                        ?>
                        <option <?php echo $selected ?> value="<?php echo $student_row["studentId"] ?>"><?php echo $student_row["studentFirstName"] ?> <?php echo $student_row["studentLastName"] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherTeacher" class="col-4 col-form-label"><b>teacherClass</b></label>
                <div class="col-8">
                    <select class="form-select" name="teacherClass" id="teacherClass">
                        <?php
                        $class_sql = "SELECT `classTimeId`,`classTime` FROM `relationshipmulticlasstime`";
                        $class_res = mysqli_query($conn, $class_sql);
                        $previous_time = $row["teacherClass"];
                        while ($class_row = mysqli_fetch_assoc($class_res)) {
                            if ($class_row["classTimeId"] == $previous_time) {
                                $class_selected = "selected";
                            } else {
                                $class_selected = "";
                            }
                        ?>
                        <option <?php echo $class_selected ?> value="<?php echo $class_row["classTimeId"] ?>"><?php echo $class_row["classTime"] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherPhone" class="col-4 col-form-label"><b>teacherPhone</b></label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["teacherPhone"] ?>" class="form-control" name="teacherPhone" id="teacherPhone" placeholder="teacherPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherEmail" class="col-4 col-form-label"><b>teacherEmail</b></label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["teacherEmail"] ?>" class="form-control" name="teacherEmail" id="teacherEmail" placeholder="teacherEmail" />
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="teacherPic" class="col-4 col-form-label"><b>teacherPic</b></label>
                <div class="col-8">
                    <input type="file" multiple class="form-control" name="teacherPic[]" id="teacherPic" placeholder="teacherPic" />
                </div>
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name="update" class="btn btn-success">
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