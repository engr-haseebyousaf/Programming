<?php
include "config.php";

if (isset($_POST["insert"])) {
    $teacherFirstName = mysqli_real_escape_string($conn, $_POST["teacherFirstName"]);
    $teacherLastName = mysqli_real_escape_string($conn, $_POST["teacherLastName"]);
    $teacherPhone = mysqli_real_escape_string($conn, $_POST["teacherPhone"]);
    $teacherEmail = mysqli_real_escape_string($conn, $_POST["teacherEmail"]);
    $teacherPics = $_FILES["teacherPic"]["name"];
    $teacherPicTmps = $_FILES["teacherPic"]["tmp_name"];
    if (empty($teacherFirstName) || empty($teacherLastName) || empty($teacherPhone) || empty($teacherEmail) || empty($teacherPics[0])) {
        $msg = "<div class='alert alert-danger'>Please fill all values</div>";
    } else {
        $teacherPicsNewNames = [];
        $checkExt = true;
        foreach ($teacherPics as $teacherPic) {
            $ext = pathinfo($teacherPic,PATHINFO_EXTENSION);
            $allowedExtensions = ["jpg","png","jpeg"];
            if (in_array($ext, $allowedExtensions)) {
                $teacherPicsNewNames[] = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
            } else {
                $teacherPicsNewNames = [];
                $checkExt = false;
                $msg = "<div class='alert alert-warning'>Please Select Right File Format</div>";
                break;
            }
        }

        if ($checkExt) {
            $teacherPicNames = serialize($teacherPicsNewNames);
            $sql = "INSERT INTO `multi_teacher` (`teacherFirstName`,`teacherLastName`,`teacherPhone`,`teacherEmail`,`teacherPic`) VALUES ('$teacherFirstName','$teacherLastName','$teacherPhone','$teacherEmail','$teacherPicNames');";
            // die($sql);
            if (mysqli_query($conn, $sql)) {
                foreach ($teacherPicsNewNames as $key => $teacherPicsNewName) {
                    $teacherPicTmpName = $teacherPicTmps[$key];
                    move_uploaded_file($teacherPicTmpName, "./images/$teacherPicsNewName");
                }
                $msg = "<div class='alert alert-success'>Successfully Inserted Data In Teacher Table</div>";
                header("Refresh:1,./index.php");
            } else {
                $msg = "<div class='alert alert-danger'>Could Not Insert Data</div>";
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Multiple Teacher | Insert Date</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-success">
        <div class="row">
            <div class="col">
                <?php echo @$msg ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>Teacher Insert Data</h2>
            </div>
        </div>
    </div>
    <div class="container bg-warning">
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
                    <input type="text" class="form-control" name="teacherEmail" id="teacherEmail" placeholder="teacherEmail" />
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="teacherPic" class="col-4 col-form-label">teacherPic</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="teacherPic[]" multiple id="teacherPic" placeholder="teacherPic" />
                </div>
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <input type="submit" value="Insert" name="insert" class="btn btn-primary">
                        
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