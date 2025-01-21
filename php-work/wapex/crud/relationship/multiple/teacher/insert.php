<?php
include "config.php";
if (isset($_POST["multi_insert"])) {
    $teacherFirstName = mysqli_real_escape_string($conn, $_POST["teacherFirstName"]);
    $teacherLastName = mysqli_real_escape_string($conn, $_POST["teacherLastName"]);
    $teacherStudent = mysqli_real_escape_string($conn, $_POST["teacherStudent"]);
    $teacherClass = mysqli_real_escape_string($conn, $_POST["teacherClass"]);
    $teacherPhone = mysqli_real_escape_string($conn, $_POST["teacherPhone"]);
    $teacherEmail = mysqli_real_escape_string($conn, $_POST["teacherEmail"]);
    $teacherCNIC = mysqli_real_escape_string($conn, $_POST["teacherCNIC"]);
    $teacherPic = $_FILES["teacherPic"]["name"];
    $teacherPicTmp = $_FILES["teacherPic"]["tmp_name"];
    if (empty($teacherFirstName) || empty($teacherLastName) || empty($teacherPhone) || empty($teacherEmail) || empty($teacherCNIC) || empty($teacherPic[0])) {
        $msg = "<div class='alert alert-danger'>Please Fill All values</div>";
    } else {
        $teacherNewPics = [];
        $checkExt = true;
        foreach ($teacherPic as $value) {
            $ext = pathinfo($value, PATHINFO_EXTENSION);
            $allowedExtensions = ["jpg","jpeg","png"];
            if (in_array($ext, $allowedExtensions)) {
                $teacherNewPics[] = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
            } else {
                $msg = "<div class='alert alert-warning'>Please Select Right Image</div>";
                $checkExt = false;
                break;
            }
        }
        if ($checkExt) {
            $teacherPicSerial = serialize($teacherNewPics);
            $sql = "INSERT INTO `relationshipmultiteacher` (`teacherFirstName`, `teacherLastName`,`teacherStudent`,`teacherClass`, `teacherPhone`, `teacherEmail`, `teacherPic`) VALUES ('$teacherFirstName', '$teacherLastName','$teacherStudent','$teacherClass', '$teacherPhone', '$teacherEmail', '$teacherPicSerial');";
            if (mysqli_query($conn, $sql)) {
                foreach ($teacherNewPics as $key1 => $value1) {
                    $picTmp = $teacherPicTmp[$key1];
                    move_uploaded_file($picTmp, "./images/$value1");
                }
                $msg = "<div class='alert alert-success'>Record Successfully Inserted</div>";
                header("Refresh:1,./index.php");
            } else {
                $msg = "<div class='alert alert-danger'>Failed To upload</div>";
            }
            
        }

    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>teachers Multi | Insert Data</title>
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
                <h2>teacher Multiple Images Form</h2>
            </div>
        </div>
    </div>
    <div class="container py-3 bg-primary text-white">
        <form method="post" enctype="multipart/form-data">

            <div class="mb-3 row">
                <label for="teacherFirstName" class="col-4 col-form-label"><b>teacherFirstName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherFirstName" id="teacherFirstName"
                        placeholder="teacherFirstName" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="teacherLastName" class="col-4 col-form-label"><b>teacherLastName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherLastName" id="teacherLastName"
                        placeholder="teacherLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherStudent" class="col-4 col-form-label"><b>teacherStudent</b></label>
                <div class="col-8">
                    <select class="form-select" name="teacherStudent" id="teacherStudent">
                        <?php
                        $student_sql = "SELECT `studentId`,`studentFirstName`,`studentLastName` FROM `relationshipmultistudent`";
                        $student_res = mysqli_query($conn, $student_sql);
                        while ($student_row = mysqli_fetch_assoc($student_res)) {
                        ?>
                        <option value="<?php echo $student_row["studentId"] ?>"><?php echo $student_row["studentFirstName"] ?> <?php echo $student_row["studentLastName"] ?></option>
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
                        while ($class_row = mysqli_fetch_assoc($class_res)) {
                        ?>
                        <option value="<?php echo $class_row["classTimeId"] ?>"><?php echo $class_row["classTime"] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherPhone" class="col-4 col-form-label"><b>teacherPhone</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherPhone" id="teacherPhone"
                        placeholder="teacherPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherEmail" class="col-4 col-form-label"><b>teacherEmail</b></label>
                <div class="col-8">
                    <input type="email" class="form-control" name="teacherEmail" id="teacherEmail"
                        placeholder="teacherEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherCNIC" class="col-4 col-form-label"><b>teacherCNIC</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherCNIC" id="teacherCNIC"
                        placeholder="teacherCNIC" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherPic" class="col-4 col-form-label"><b>teacherPic</b></label>
                <div class="col-8">
                    <input type="file" multiple class="form-control" name="teacherPic[]" id="teacherPic"
                        placeholder="teacherPic" />
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name="multi_insert" class="btn btn-info">
                        Insert
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