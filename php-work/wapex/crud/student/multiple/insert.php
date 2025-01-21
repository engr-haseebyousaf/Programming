<?php
include "config.php";
if (isset($_POST["multi_insert"])) {
    $studentFirstName = mysqli_real_escape_string($conn, $_POST["studentFirstName"]);
    $studentLastName = mysqli_real_escape_string($conn, $_POST["studentLastName"]);
    $studentPhone = mysqli_real_escape_string($conn, $_POST["studentPhone"]);
    $studentEmail = mysqli_real_escape_string($conn, $_POST["studentEmail"]);
    $studentCNIC = mysqli_real_escape_string($conn, $_POST["studentCNIC"]);
    $studentPic = $_FILES["studentPic"]["name"];
    $studentPicTmp = $_FILES["studentPic"]["tmp_name"];
    if (empty($studentFirstName) || empty($studentLastName) || empty($studentPhone) || empty($studentEmail) || empty($studentCNIC) || empty($studentPic[0])) {
        $msg = "<div class='alert alert-danger'>Please Fill All values</div>";
    } else {
        $studentNewPics = [];
        $checkExt = true;
        foreach ($studentPic as $value) {
            $ext = pathinfo($value, PATHINFO_EXTENSION);
            $allowedExtensions = ["jpg","jpeg","png"];
            if (in_array($ext, $allowedExtensions)) {
                $studentNewPics[] = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
            } else {
                $msg = "<div class='alert alert-warning'>Please Select Right Image</div>";
                $checkExt = false;
                break;
            }
        }
        if ($checkExt) {
            $studentPicSerial = serialize($studentNewPics);
            $sql = "INSERT INTO `multi_student` (`studentFirstName`, `studentLastName`, `studentPhone`, `studentEmail`, `studentCNIC`, `studentPic`) VALUES ('$studentFirstName', '$studentLastName', '$studentPhone', '$studentEmail', '$studentCNIC', '$studentPicSerial');";
            if (mysqli_query($conn, $sql)) {
                foreach ($studentNewPics as $key1 => $value1) {
                    $picTmp = $studentPicTmp[$key1];
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
    <title>Students Multi | Insert Data</title>
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
                <h2>Student Multiple Images Form</h2>
            </div>
        </div>
    </div>
    <div class="container py-3 bg-primary text-white">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="studentFirstName" class="col-4 col-form-label">studentFirstName</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentFirstName" id="studentFirstName" placeholder="studentFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentFirstName" class="col-4 col-form-label">studentFirstName</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentFirstName" id="studentFirstName" placeholder="studentFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentLastName" class="col-4 col-form-label">studentLastName</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentLastName" id="studentLastName" placeholder="studentLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentPhone" class="col-4 col-form-label">studentPhone</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentPhone" id="studentPhone" placeholder="studentPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentEmail" class="col-4 col-form-label">studentEmail</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="studentEmail" id="studentEmail" placeholder="studentEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentCNIC" class="col-4 col-form-label">studentCNIC</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentCNIC" id="studentCNIC" placeholder="studentCNIC" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentPic" class="col-4 col-form-label">studentPic</label>
                <div class="col-8">
                    <input type="file" multiple class="form-control" name="studentPic[]" id="studentPic" placeholder="studentPic" />
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