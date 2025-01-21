<?php
include "./includes/connection.php";
$volunteerId = $_GET["id"];
$ssql = "SELECT * FROM `volunteer` WHERE `volunteerId`='$volunteerId'";
$sres = mysqli_query($conn, $ssql);
$srow = mysqli_fetch_assoc($sres);

// Code for updating the volunteer
if (isset($_POST["updateVolunteer"])) {
    $volunteerFirstName = mysqli_real_escape_string($conn, $_POST["volunteerFirstName"]);
    $volunteerLastName = mysqli_real_escape_string($conn, $_POST["volunteerLastName"]);
    $volunteerEmail = mysqli_real_escape_string($conn, $_POST["volunteerEmail"]);
    $volunteerDateOfBirth = mysqli_real_escape_string($conn, $_POST["volunteerDateOfBirth"]);
    $volunteerGender = mysqli_real_escape_string($conn, $_POST["volunteerGender"]);
    $volunteerPhone = mysqli_real_escape_string($conn, $_POST["volunteerPhone"]);
    $volunteerDescription = mysqli_real_escape_string($conn, $_POST["volunteerDescription"]);
    $volunteerCountry = mysqli_real_escape_string($conn, $_POST["volunteerCountry"]);
    $volunteerState = mysqli_real_escape_string($conn, $_POST["volunteerState"]);
    $volunteerCity = mysqli_real_escape_string($conn, $_POST["volunteerCity"]);
    $volunteerOccassion = mysqli_real_escape_string($conn, $_POST["volunteerOccassion"]);
    $volunteerExperiance = mysqli_real_escape_string($conn, $_POST["volunteerExperiance"]);
    $volunteerAchievements = mysqli_real_escape_string($conn, $_POST["volunteerAchievements"]);
    $volunteerPersonalSkills = mysqli_real_escape_string($conn, $_POST["volunteerPersonalSkills"]);
    $volunteerPassword = md5(mysqli_real_escape_string($conn, $_POST["volunteerPassword"]));
    $volunteerConfirmPassword = md5(mysqli_real_escape_string($conn, $_POST["volunteerConfirmPassword"]));
    $volunteerAddress = mysqli_real_escape_string($conn, $_POST["volunteerAddress"]);
    // checking if password matches
    if (!empty($volunteerPassword)) {
        if ($volunteerPassword === $volunteerConfirmPassword) {
            $volunteerPicture = $_FILES["volunteerPicture"];
            
            if (!empty($volunteerPicture["name"])) {
                $volunteerOldPictureName = $srow["volunteerPicture"];
                $ext = pathinfo($volunteerPicture["name"],PATHINFO_EXTENSION);
                $allowedExtensions = ["jpg","png","jpeg"];
                // checking image extension
                if (in_array($ext, $allowedExtensions)) {
                    $volunteerPictureName = date("Y-m-d") . "-" . random_int(100000, 999999) . "." . $ext;
                    $volunteerPictureTmpName = $volunteerPicture["tmp_name"];
                    $sql = "UPDATE `volunteer` SET 
                    `volunteerFirstName`='$volunteerFirstName',
                    `volunteerLastName`='$volunteerLastName',
                    `volunteerEmail`='$volunteerEmail',
                    `volunteerDateOfBirth`='$volunteerDateOfBirth',
                    `volunteerGender`='$volunteerGender',
                    `volunteerPhone`='$volunteerPhone',
                    `volunteerDescription`='$volunteerDescription',
                    `volunteerCountry`='$volunteerCountry',
                    `volunteerState`='$volunteerState',
                    `volunteerCity`='$volunteerCity',
                    `volunteerOccassion`='$volunteerOccassion',
                    `volunteerExperiance`='$volunteerExperiance',
                    `volunteerAchievements`='$volunteerAchievements',
                    `volunteerPersonalSkills`='$volunteerPersonalSkills',
                    `volunteerPassword`='$volunteerPassword',
                    `volunteerAddress`='$volunteerAddress',
                    `volunteerPicture`='$volunteerPictureName' 
                    WHERE `volunteerId`='$volunteerId';";
                    //  die($sql);
                    if (mysqli_query($conn, $sql)) {
                        move_uploaded_file($volunteerPictureTmpName, "./uploads/volunteers/$volunteerPictureName");
                        if (file_exists("./uploads/volunteers/$volunteerOldPictureName")) {
                            unlink("./uploads/volunteers/$volunteerOldPictureName");
                        }
                        echo "<script>alert('volunteer Updated successfully')</script>";
                        header("Refresh:2,./view-planner.php");
                    }
                } else {
                    echo "<script>alert('please select right image format')</script>";
                }
            } else {
                $sql = "UPDATE `volunteer` SET 
                `volunteerFirstName`='$volunteerFirstName',
                `volunteerLastName`='$volunteerLastName',
                `volunteerEmail`='$volunteerEmail',
                `volunteerDateOfBirth`='$volunteerDateOfBirth',
                `volunteerGender`='$volunteerGender',
                `volunteerPhone`='$volunteerPhone',
                `volunteerDescription`='$volunteerDescription',
                `volunteerCountry`='$volunteerCountry',
                `volunteerState`='$volunteerState',
                `volunteerCity`='$volunteerCity',
                `volunteerOccassion`='$volunteerOccassion',
                `volunteerExperiance`='$volunteerExperiance',
                `volunteerAchievements`='$volunteerAchievements',
                `volunteerPersonalSkills`='$volunteerPersonalSkills',
                `volunteerPassword`='$volunteerPassword',
                `volunteerAddress`='$volunteerAddress'
                WHERE `volunteerId`='$volunteerId';";
                    //  die($sql);
                    if (mysqli_query($conn, $sql)) {
                        
                        echo "<script>alert('volunteer Updated successfully')</script>";
                        header("Refresh:2,./view-planner.php");
                    }
            }
            
        } else {
            echo "<script>alert('passwords not match')</script>";
        }
    } else {
        if (!empty($volunteerPicture["name"])) {
            $volunteerOldPictureName = $srow["volunteerPicture"];
            $ext = pathinfo($volunteerPicture["name"],PATHINFO_EXTENSION);
            $allowedExtensions = ["jpg","png","jpeg"];
            // checking image extension
            if (in_array($ext, $allowedExtensions)) {
                $volunteerPictureName = date("Y-m-d") . "-" . random_int(100000, 999999) . "." . $ext;
                $volunteerPictureTmpName = $volunteerPicture["tmp_name"];
                $sql = "UPDATE `volunteer` SET 
                `volunteerFirstName`='$volunteerFirstName',
                `volunteerLastName`='$volunteerLastName',
                `volunteerEmail`='$volunteerEmail',
                `volunteerDateOfBirth`='$volunteerDateOfBirth',
                `volunteerGender`='$volunteerGender',
                `volunteerPhone`='$volunteerPhone',
                `volunteerDescription`='$volunteerDescription',
                `volunteerCountry`='$volunteerCountry',
                `volunteerState`='$volunteerState',
                `volunteerCity`='$volunteerCity',
                `volunteerOccassion`='$volunteerOccassion',
                `volunteerExperiance`='$volunteerExperiance',
                `volunteerAchievements`='$volunteerAchievements',
                `volunteerPersonalSkills`='$volunteerPersonalSkills',
                `volunteerAddress`='$volunteerAddress',
                `volunteerPicture`='$volunteerPictureName' 
                WHERE `volunteerId`='$volunteerId';";
                //  die($sql);
                if (mysqli_query($conn, $sql)) {
                    move_uploaded_file($volunteerPictureTmpName, "./uploads/volunteers/$volunteerPictureName");
                    if (file_exists("./uploads/volunteers/$volunteerOldPictureName")) {
                        unlink("./uploads/volunteers/$volunteerOldPictureName");
                    }
                    echo "<script>alert('volunteer updated successfully')</script>";
                    header("Refresh:2,./view-planner.php");
                }
            } else {
                echo "<script>alert('please select right image format')</script>";
            }
        } else {
            $sql = "UPDATE `volunteer` SET 
            `volunteerFirstName`='$volunteerFirstName',
            `volunteerLastName`='$volunteerLastName',
            `volunteerEmail`='$volunteerEmail',
            `volunteerDateOfBirth`='$volunteerDateOfBirth',
            `volunteerGender`='$volunteerGender',
            `volunteerPhone`='$volunteerPhone',
            `volunteerDescription`='$volunteerDescription',
            `volunteerCountry`='$volunteerCountry',
            `volunteerState`='$volunteerState',
            `volunteerCity`='$volunteerCity',
            `volunteerOccassion`='$volunteerOccassion',
            `volunteerExperiance`='$volunteerExperiance',
            `volunteerAchievements`='$volunteerAchievements',
            `volunteerPersonalSkills`='$volunteerPersonalSkills',
            `volunteerAddress`='$volunteerAddress'
             WHERE `volunteerId`='$volunteerId';";
                //  die($sql);
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('volunteer Updated successfully')</script>";
                    header("Refresh:2,./view-planner.php");
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
                                <h4>Default Validation</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="volunteerFirstName">First Name</label>
                                    <input type="text" value="<?php echo $srow["volunteerFirstName"] ?>"
                                        name="volunteerFirstName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerLastName">Last Name</label>
                                    <input type="text" value="<?php echo $srow["volunteerLastName"] ?>"
                                        name="volunteerLastName" id="volunteerLastName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerEmail">Email</label>
                                    <input type="email" value="<?php echo $srow["volunteerEmail"] ?>"
                                        name="volunteerEmail" id="volunteerEmail" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerDateOfBirth">Date Of Birth</label>
                                    <input type="date" value="<?php echo $srow["volunteerDateOfBirth"] ?>"
                                        name="volunteerDateOfBirth" id="volunteerDateOfBirth" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label><br>
                                    <?php
                        switch ($srow["volunteerGender"]) {
                          case 'male':
                        ?>
                                    <div class="form-check form-check-inline">
                                        <label for="male" class="form-check-label">Male</label>
                                        <input type="radio" value="male" checked name="volunteerGender" id="volunteerGender"
                                            class="form-check-input" required>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label for="female" class="form-check-label">Female</label>
                                        <input type="radio" value="female" name="volunteerGender" id="volunteerGender"
                                            class="form-check-input">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label for="other" class="form-check-label">Other</label>
                                        <input type="radio" value="other" name="volunteerGender" id="volunteerGender"
                                            class="form-check-input">
                                    </div>
                                    <?php
                        break;
                        case 'female':
                        ?>
                                    <div class="form-check form-check-inline">
                                        <label for="male" class="form-check-label">Male</label>
                                        <input type="radio" value="male" checked name="volunteerGender" id="volunteerGender"
                                            class="form-check-input" required>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label for="female" class="form-check-label">Female</label>
                                        <input type="radio" value="female" checked name="volunteerGender" id="volunteerGender"
                                            class="form-check-input">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label for="other" class="form-check-label">Other</label>
                                        <input type="radio" value="other" name="volunteerGender" id="volunteerGender"
                                            class="form-check-input">
                                    </div>
                                    <?php
                        break;
                        case "other":
                        ?>
                                    <div class="form-check form-check-inline">
                                        <label for="male" class="form-check-label">Male</label>
                                        <input type="radio" value="male" checked name="volunteerGender" id="volunteerGender"
                                            class="form-check-input" required>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label for="female" class="form-check-label">Female</label>
                                        <input type="radio" value="female" name="volunteerGender" id="volunteerGender"
                                            class="form-check-input">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label for="other" class="form-check-label">Other</label>
                                        <input type="radio" value="other" checked name="volunteerGender" id="volunteerGender"
                                            class="form-check-input">
                                    </div>
                                    <?php
                        break;
                        }
                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerPhone">Phone No</label>
                                    <input type="text" value="<?php echo $srow["volunteerPhone"] ?>"
                                        name="volunteerPhone" id="volunteerPhone" class="form-control" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="volunteerDescription">Description</label>
                                    <textarea class="form-control" name="volunteerDescription"
                                        required><?php echo $srow["volunteerDescription"] ?></textarea>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="volunteerCountry">Country</label>
                                            <input type="text" value="<?php echo $srow["volunteerCountry"] ?>"
                                                name="volunteerCountry" id="volunteerCountry" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="volunteerState">State</label>
                                            <input type="text" value="<?php echo $srow["volunteerState"] ?>"
                                                name="volunteerState" id="volunteerState" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="volunteerCity">City</label>
                                            <input type="text" value="<?php echo $srow["volunteerCity"] ?>"
                                                name="volunteerCity" id="volunteerCity" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerOccassion">Types of Occassions (You want to work)</label>
                                    <input type="text" value="<?php echo $srow["volunteerOccassion"] ?>"
                                        name="volunteerOccassion" id="volunteerOccassion" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerExperiance">Experiance</label>
                                    <input type="text" value="<?php echo $srow["volunteerExperiance"] ?>"
                                        name="volunteerExperiance" id="volunteerExperiance" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerAchievements">Achievements</label>
                                    <input type="text" value="<?php echo $srow["volunteerAchievements"] ?>"
                                        name="volunteerAchievements" id="volunteerAchievements" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerPersonalSkills">Personal Skills</label>
                                    <input type="text" value="<?php echo $srow["volunteerPersonalSkills"] ?>"
                                        name="volunteerPersonalSkills" id="volunteerPersonalSkills" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerPassword">Password</label>
                                    <input type="password" name="volunteerPassword" id="volunteerPassword"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="volunteerConfirmPassword">Confirm Password</label>
                                    <input type="password" name="volunteerConfirmPassword" id="volunteerConfirmPassword"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="volunteerAddress">Address</label>
                                    <textarea name="volunteerAddress" id="volunteerAddress" required
                                        class="form-control"><?php echo $srow["volunteerAddress"] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerPicture">Profile Picture</label>
                                    <input type="file" accept=".png,.jpg,.jpeg" name="volunteerPicture"
                                        id="volunteerPicture" class="form-control">
                                </div>
                            
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" value="Update" name="updateVolunteer" class="btn btn-primary">
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