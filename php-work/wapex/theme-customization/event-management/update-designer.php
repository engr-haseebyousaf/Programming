<?php
include "./includes/connection.php";
$designerId = $_GET["id"];
$ssql = "SELECT * FROM `designer` WHERE `designerId`='$designerId'";
$sres = mysqli_query($conn, $ssql);
$srow = mysqli_fetch_assoc($sres);
if (isset($_POST["designerUpdateFormSubmit"])) {
    $designerFirstName = mysqli_real_escape_string($conn, $_POST["designerFirstName"]);
    $designerLastName = mysqli_real_escape_string($conn, $_POST["designerLastName"]);
    $designerEmail = mysqli_real_escape_string($conn, $_POST["designerEmail"]);
    $designerDateOfBirth = mysqli_real_escape_string($conn, $_POST["designerDateOfBirth"]);
    $designerGender = mysqli_real_escape_string($conn, $_POST["designerGender"]);
    $designerPhone = mysqli_real_escape_string($conn, $_POST["designerPhone"]);
    $designerDescription = mysqli_real_escape_string($conn, $_POST["designerDescription"]);
    $designerCountry = mysqli_real_escape_string($conn, $_POST["designerCountry"]);
    $designerState = mysqli_real_escape_string($conn, $_POST["designerState"]);
    $designerCity = mysqli_real_escape_string($conn, $_POST["designerCity"]);
    $designerExperiance = mysqli_real_escape_string($conn, $_POST["designerExperiance"]);
    $designerOrderedDesign = mysqli_real_escape_string($conn, $_POST["designerOrderedDesign"]);
    $designerCompany = mysqli_real_escape_string($conn, $_POST["designerCompany"]);
    $designerNumberOfDesign = mysqli_real_escape_string($conn, $_POST["designerNumberOfDesign"]);
    $designerPassword = md5(mysqli_real_escape_string($conn, $_POST["designerPassword"]));
    $designerConfirmPassword = md5(mysqli_real_escape_string($conn, $_POST["designerConfirmPassword"]));
    $designerAddress = mysqli_real_escape_string($conn, $_POST["designerAddress"]);
    $designerPic = $_FILES["designerPic"];
    if (empty($designerFirstName) || empty($designerLastName) || empty($designerEmail) || empty($designerDateOfBirth) || empty($designerGender) || empty($designerPhone) || empty($designerDescription) || empty($designerCountry) || empty($designerState) || empty($designerCity) || empty($designerExperiance) || empty($designerOrderedDesign) || empty($designerAddress) || empty($designerPic["name"])) {
        echo "<script>alert('Fill all the values carefully')</script>";
    } else {
        if ($designerPassword != $designerConfirmPassword) {
            echo "<script>alert('Password Doesnot match')</script>";
        } else {
            $ext = pathinfo($designerPic["name"],PATHINFO_EXTENSION);
            $allowed_ext = ["png","jpg","jpeg"];
            if (in_array($ext, $allowed_ext)) {
                $designerPicName = random_int(100000, 999999) . "-" . date("Y-m-d") . "." . $ext;
                $sql = "UPDATE `designer` SET  
                `designerFirstName`='$designerFirstName', `designerLastName`='$designerLastName', `designerEmail`='$designerEmail', `designerDateOfBirth`='$designerDateOfBirth', `designerGender`='$designerGender', `designerPhone`='$designerPhone',`designerCountry`='$designerCountry', `designerState`='$designerState', `designerCity`='$designerCity',`designerExperiance`='$designerExperiance', `designerOrderedDesign`='$designerOrderedDesign', `designerDescription`='$designerDescription', `designerCompany`='$designerCompany', `designerNumberOfDesign`='$designerNumberOfDesign', `designerPassword`='$designerPassword', `designerAddress`='$designerAddress', `designerPicture`='$designerPicName' WHERE `designerId`='$designerId'";
                // die($sql);
                if (mysqli_query($conn, $sql)) {
                    move_uploaded_file($designerPic["tmp_name"], "./uploads/designers/$designerPicName");
                    $designerOldPicture = $srow["designerPicture"];
                    if (file_exists("./uploads/designers/$designerOldPicture")) {
                        unlink("./uploads/designers/$designerOldPicture");
                    }
                    header("Location:./view-designer.php");
                }
            } else {
                echo "<script>alert('File should be of type .jpg, .png, .jpeg')</script>";
            }
        }
}
}
include "./includes/header.php";
include "./includes/sidebar.php";
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <h4>Add designer</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="designerFirstName">First Name</label>
                                    <input type="text" value="<?php echo $srow["designerFirstName"] ?>" id="designerFirstName" name="designerFirstName"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="designerLastName">Last Name</label>
                                    <input type="text" value="<?php echo $srow["designerLastName"] ?>" id="designerLastName" name="designerLastName" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="designerEmail">Email</label>
                                    <input type="email" value="<?php echo $srow["designerEmail"] ?>" name="designerEmail" id="designerEmail" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="designerDateOfBirth">Date Of Birth</label>
                                    <input type="date" value="<?php echo $srow["designerDateOfBirth"] ?>" name="designerDateOfBirth" id="designerDateOfBirth"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label><br>
                                    <?php
                                    switch ($srow["designerGender"]) {
                                        case 'male':
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="designerGender" id="male"
                                            value="male" />
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="designerGender" id="female"
                                            value="female" />
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="designerGender" id="other"
                                            value="other" />
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                    <?php
                                    break;
                                    case "female":
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="designerGender" id="male"
                                            value="male" />
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="designerGender" id="female"
                                            value="female" />
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="designerGender" id="other"
                                            value="other" />
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                    <?php
                                    break;
                                    case "other":
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="designerGender" id="male"
                                            value="male" />
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="designerGender" id="female"
                                            value="female" />
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="designerGender" id="other"
                                            value="other" />
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                    <?php
                                    break;
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="designerPhone">Phone</label>
                                    <input type="text" value="<?php echo $srow["designerPhone"] ?>" id="designerPhone" name="designerPhone" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group mt-4">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="designerCountry">Select Country</label>
                                                <input type="text" value="<?php echo $srow["designerCountry"] ?>" id="designerCountry" name="designerCountry"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="designerState">Select State</label>
                                                <input type="text" value="<?php echo $srow["designerState"] ?>" id="designerState" name="designerState"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="designerCity">Select City</label>
                                                <input type="text" value="<?php echo $srow["designerCity"] ?>" id="designerCity" name="designerCity"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="designerExperiance">Experiance</label>
                                    <input type="text" value="<?php echo $srow["designerExperiance"] ?>" id="designerExperiance" name="designerExperiance"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="designerOrderedDesign">Ordered Design Off</label>
                                    <input type="text" value="<?php echo $srow["designerOrderedDesign"] ?>" id="designerOrderedDesign" name="designerOrderedDesign"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" value="<?php echo $srow["designerDescription"] ?>" name="designerDescription" required=""></textarea>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="designerCompany">Company</label>
                                    <input type="text" value="<?php echo $srow["designerCompany"] ?>" id="designerCompany" name="designerCompany"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="designerNumberOfDesign">Number Of Design</label>
                                    <input type="number" value="<?php echo $srow["designerNumberOfDesign"] ?>" id="designerNumberOfDesign" name="designerNumberOfDesign" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="designerPassword">Password</label>
                                    <input type="password" id="designerPassword" name="designerPassword"required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="designerConfirmPassword">Confirm Password</label>
                                    <input type="password" id="designerConfirmPassword" name="designerConfirmPassword" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="designerAddress">Address</label>
                                    <input type="text" value="<?php echo $srow["designerAddress"] ?>" id="designerAddress" name="designerAddress"
                                        class="form-control" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="designerPic" class="form-label">designer Pic</label>
                                    <input type="file" class="form-control" name="designerPic" id="designerPic"/>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" name="designerUpdateFormSubmit" value="Add designer" class="btn btn-primary">
                            </div>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>
<?php
  include "./includes/footer.php";
  ?>
</body>


</html>