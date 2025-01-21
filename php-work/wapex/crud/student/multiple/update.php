<?php 
include "config.php";
$id = $_GET["uid"];
$sql = "SELECT * FROM `multi_student` WHERE `studentId` = $id;";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

if (isset($_POST["update"])) {
    $studentFirstName = mysqli_real_escape_string($conn, $_POST["studentFirstName"]);
    $studentLastName = mysqli_real_escape_string($conn, $_POST["studentLastName"]);
    $studentPhone = mysqli_real_escape_string($conn, $_POST["studentPhone"]);
    $studentEmail = mysqli_real_escape_string($conn, $_POST["studentEmail"]);
    $studentCNIC = mysqli_real_escape_string($conn, $_POST["studentCNIC"]);
    if (isset($_FILES["studentPic"]["name"][0])) {
        $studentPic = $_FILES["studentPic"]["name"];
        $studentPicNewNames = [];
        $checkExt = true;
        foreach ($studentPic as $value0) {
            $ext = pathinfo($value0, PATHINFO_EXTENSION);
            $allowedExt = ["jpg","jpeg","png"];
            if (in_array($ext, $allowedExt)) {
                $studentPicNewNames[] = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
            } else {
                $checkExt = false;
                break;
            }
        }
        if ($checkExt) {
            $studentPicNames = serialize($studentPicNewNames);
                $sql2 = "UPDATE `multi_student` SET `studentFirstName`='$studentFirstName',`studentLastName`='$studentLastName',`studentPhone`='$studentPhone',`studentEmail`='$studentEmail',`studentCNIC`='$studentCNIC',`studentPic`='$studentPicNames' WHERE `studentId`=$id";
                // die($studentPicNames);
                if (mysqli_query($conn, $sql2)) {
                    $oldImages = unserialize($row["studentPic"]);
                    foreach ($studentPicNewNames as $key => $value) {
                        $studentPicTmp = $_FILES["studentPic"]["tmp_name"][$key];
                        if (isset($oldImages[$key])) {
                            $oldImage = $oldImages[$key];
                            if (file_exists("./images/$oldImage")) {
                                unlink("./images/$oldImage");
                            }
                        }
                        move_uploaded_file($studentPicTmp, "./images/$value");
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
        $sql2 = "UPDATE `multi_student` SET `studentFirstName`='$studentFirstName',`studentLastName`='$studentLastName',`studentPhone`='$studentPhone',`studentEmail`='$studentEmail',`studentCNIC`='$studentCNIC' WHERE `studentId`=$id";
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
    <title>Multiple Student | Update</title>
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
                <h2>Multiple Student Update</h2>
            </div>
        </div>
    </div>
    <div class="container py-3 bg-primary">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="studentFirstName" class="col-4 col-form-label"><b>studentFirstName</b></label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["studentFirstName"] ?>" class="form-control" name="studentFirstName" id="studentFirstName" placeholder="studentFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentLastName" class="col-4 col-form-label"><b>studentLastName</b></label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["studentLastName"] ?>" class="form-control" name="studentLastName" id="studentLastName" placeholder="studentLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentPhone" class="col-4 col-form-label"><b>studentPhone</b></label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["studentPhone"] ?>" class="form-control" name="studentPhone" id="studentPhone" placeholder="studentPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentEmail" class="col-4 col-form-label"><b>studentEmail</b></label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["studentEmail"] ?>" class="form-control" name="studentEmail" id="studentEmail" placeholder="studentEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentCNIC" class="col-4 col-form-label"><b>studentCNIC</b></label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["studentCNIC"] ?>" class="form-control" name="studentCNIC" id="studentCNIC" placeholder="studentCNIC" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentPic" class="col-4 col-form-label"><b>studentPic</b></label>
                <div class="col-8">
                    <input type="file" multiple class="form-control" name="studentPic[]" id="studentPic" placeholder="studentPic" />
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