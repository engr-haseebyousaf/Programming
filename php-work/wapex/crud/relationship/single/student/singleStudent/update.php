<?php
include "connect.php";
$id = $_GET["uid"];
$show_sql = "SELECT * FROM `relationshipStudent` rs LEFT JOIN `relationshipTeacher` rt ON rs.`studentTeacher`=rt.`teacherId` LEFT JOIN `class_time` ct ON rs.`studentClass`=ct.`classTimeId`  WHERE `studentId` = '$id';";
$res = mysqli_query($conn, $show_sql);
$row = mysqli_fetch_assoc($res);
// echo "<pre>";
// print_r($row);
// echo "</pre>";


// Update Code
if (isset($_POST["update"])) {
    $studentFirstName = mysqli_real_escape_string($conn, $_POST["studentFirstName"]);
    $studentLastName = mysqli_real_escape_string($conn, $_POST["studentLastName"]);
    $studentTeacher = mysqli_real_escape_string($conn, $_POST["studentTeacher"]);
    $studentClass = mysqli_real_escape_string($conn, $_POST["studentClass"]);
    $studentPhone = mysqli_real_escape_string($conn, $_POST["studentPhone"]);
    $studentEmail = mysqli_real_escape_string($conn, $_POST["studentEmail"]);
    $studentCNIC = mysqli_real_escape_string($conn, $_POST["studentCNIC"]);
    if (!empty($studentFirstName) && !empty($studentLastName) && !empty($studentPhone) && !empty($studentEmail) && !empty($studentCNIC) && !empty($studentTeacher) && !empty($studentClass)) {
        if (!empty($_FILES["studentPic"]["name"])) {
            $studentPic = $_FILES["studentPic"]["name"];
            $ext = pathinfo($studentPic, PATHINFO_EXTENSION);
            $allowedExtensions = ["jpg","jpeg","png"];
            if (in_array($ext, $allowedExtensions)) {
                $oldImageName = $row["studentPic"];
                $studentPicName = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
                $studentPicTmpName = $_FILES["studentPic"]["tmp_name"];
                $sql = "UPDATE `relationshipStudent` SET `studentFirstName`='$studentFirstName',`studentLastName`='$studentLastName',`studentPhone`='$studentPhone',`studentEmail`='$studentEmail',`studentCNIC`='$studentCNIC',`studentPic`='$studentPicName' WHERE `studentId` = $id;";
                if (mysqli_query($conn, $sql)) {
                    if (file_exists("./images/$oldImageName")) {
                        unlink("./images/$oldImageName");
                    }
                    move_uploaded_file($studentPicTmpName, "./images/$studentPicName");
                    $msg = "<div class='alert alert-success'>Updated Successfully</div>";
                    header("Refresh: 1, ./index.php");
                }
            } else {
                $msg = "<div class='alert alert-warning'>Please Select the right Format</div>";
            }
        } else {
            $sql = "UPDATE `relationshipStudent` SET `studentFirstName`='$studentFirstName',`studentLastName`='$studentLastName',`studentTeacher`='$studentTeacher',`studentClass`='$studentClass',`studentPhone`='$studentPhone',`studentEmail`='$studentEmail',`studentCNIC`='$studentCNIC' WHERE `studentId` = $id;";
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
    <title>Single Student | Update Data</title>
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
                <h2 class="text-center">Student Update Data</h2>
            </div>
        </div>
    </div>
    <div class="container py-3 bg-info">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="studentFirstName" class="col-4 col-form-label"><b>studentFirstName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["studentFirstName"] ?>"
                        name="studentFirstName" id="studentFirstName" placeholder="studentFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentLastName" class="col-4 col-form-label"><b>studentLastName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["studentLastName"] ?>"
                        name="studentLastName" id="studentLastName" placeholder="studentLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentTeacher" class="col-form-label col-4"><b>studentTeacher</b></label>
                <div class="col-8">
                    <select class="form-select" name="studentTeacher" id="studentTeacher">
                        <?php
                        $teacher_sql = "SELECT `teacherId`, `teacherFirstName`, `teacherLastName` FROM `relationshipTeacher`";
                        $teacher_res = mysqli_query($conn, $teacher_sql);
                        while($teacher_row = mysqli_fetch_assoc($teacher_res)){
                            if ($teacher_row["teacherId"] == $row["studentTeacher"]) {
                                $teacher_selected = "selected";
                            } else {
                                $teacher_selected = "";
                            }
                        ?>
                        <option value="<?php echo $teacher_row["teacherId"] ?>" <?php echo $teacher_selected ?>>
                            <?php echo $teacher_row["teacherFirstName"] ?> <?php echo $teacher_row["teacherLastName"] ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-4 col-form-label"><b>studentClass</b></label>
                <div class="col-8">
                    <select class="form-select" name="studentClass" id="studentClass">
                        <?php
                        $class_sql = "SELECT * FROM `class_time`";
                        $class_res = mysqli_query($conn, $class_sql);
                        while ($class_row = mysqli_fetch_assoc($class_res)) {
                            if ($class_row["classTimeId"] == $row["studentClass"]) {
                                $class_selected = "selected";
                            } else {
                                $class_selected = "";
                            }
                        ?>
                        <option value="<?php echo $class_row["classTimeId"]; ?>" <?php echo $class_selected; ?> > <?php echo $class_row["classTime"]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                
            </div>

            <div class="mb-3 row">
                <label for="studentPhone" class="col-4 col-form-label"><b>studentPhone</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["studentPhone"] ?>"
                        name="studentPhone" id="studentPhone" placeholder="studentPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentEmail" class="col-4 col-form-label"><b>studentEmail</b></label>
                <div class="col-8">
                    <input type="email" class="form-control" value="<?php echo $row["studentEmail"] ?>"
                        name="studentEmail" id="studentEmail" placeholder="studentEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentCNIC" class="col-4 col-form-label"><b>studentCNIC</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["studentCNIC"] ?>" name="studentCNIC"
                        id="studentCNIC" placeholder="studentCNIC" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentPic" class="col-4 col-form-label"><b>studentPic</b></label>
                <div class="col-8">
                    <input type="file" class="form-control" name="studentPic" id="studentPic"
                        placeholder="studentPic" />
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