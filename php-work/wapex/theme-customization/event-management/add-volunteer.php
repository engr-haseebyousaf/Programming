<?php
include "./includes/connection.php";
if (isset($_POST["addVolunteer"])) {
    // Accepting values from form and storing into variables
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
    if ($volunteerPassword === $volunteerConfirmPassword) {
        $volunteerPicture = $_FILES["volunteerPicture"];
        $ext = pathinfo($volunteerPicture["name"],PATHINFO_EXTENSION);
        $allowedExtensions = ["jpg","png","jpeg"];
        // checking image extension
        if (in_array($ext, $allowedExtensions)) {
            $volunteerPictureName = date("Y-m-d") . "-" . random_int(100000, 999999) . "." . $ext;
            $volunteerPictureTmpName = $volunteerPicture["tmp_name"];
            $sql = "INSERT INTO `volunteer` (`volunteerFirstName`,`volunteerLastName`,`volunteerEmail`,`volunteerDateOfBirth`,`volunteerGender`,`volunteerPhone`,`volunteerDescription`,`volunteerCountry`,`volunteerState`,`volunteerCity`,`volunteerOccassion`,`volunteerExperiance`,`volunteerAchievements`,`volunteerPersonalSkills`,`volunteerPassword`,`volunteerAddress`,`volunteerPicture`)
             VALUES 
             ('$volunteerFirstName','$volunteerLastName','$volunteerEmail','$volunteerDateOfBirth','$volunteerGender','$volunteerPhone','$volunteerDescription','$volunteerCountry','$volunteerState','$volunteerCity','$volunteerOccassion','$volunteerExperiance','$volunteerAchievements','$volunteerPersonalSkills','$volunteerPassword','$volunteerAddress','$volunteerPictureName')";
            //  die($sql);
             if (mysqli_query($conn, $sql)) {
                move_uploaded_file($volunteerPictureTmpName, "./uploads/volunteers/$volunteerPictureName");
                echo "<script>alert('volunteer inserted successfully')</script>";
             }
        } else {
            echo "<script>alert('please select right image format')</script>";
        }
    } else {
        echo "<script>alert('passwords not match')</script>";
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
                                <h4>Add Volunteer</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="volunteerFirstName">First Name</label>
                                    <input type="text" name="volunteerFirstName" id="volunteerFirstName"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerLastName">Last Name</label>
                                    <input type="text" name="volunteerLastName" id="volunteerLastName"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerEmail">Email</label>
                                    <input type="email" name="volunteerEmail" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerDateOfBirth">DOB</label>
                                    <input type="date" name="volunteerDateOfBirth" id="volunteerDateOfBirth"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="w-100">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <label for="male" class="form-check-label">Male</label>
                                        <input type="radio" class="form-check-input" name="volunteerGender" value="male"
                                            required id="male">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label for="female" class="form-check-label">Female</label>
                                        <input type="radio" class="form-check-input" name="volunteerGender"
                                            value="female" id="female">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label for="other" class="form-check-label">Other</label>
                                        <input type="radio" class="form-check-input" name="volunteerGender" id="other"
                                            value="other">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerPhone">Phone</label>
                                    <input type="text" class="form-control" name="volunteerPhone" id="volunteerPhone"
                                        required>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="volunteerDescription">Description</label>
                                    <textarea class="form-control" name="volunteerDescription" id="volunteerDescription"
                                        required></textarea>
                                </div>
                                <div class="row py-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="volunteerCountry">Country</label>
                                            <input type="text" name="volunteerCountry" id="volunteerCountry" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="volunteerState">State</label>
                                            <input type="text" name="volunteerState" id="volunteerState" required
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="volunteerCity">City</label>
                                            <input type="text" name="volunteerCity" id="volunteerCity" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerOccassion">Types of Occassions (You Want to Volunteer)</label>
                                    <input type="text" name="volunteerOccassion" id="volunteerOccassion" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="volunteerExperiance" class="form-label">Experiance</label>
                                    <select class="form-select" name="volunteerExperiance" id="volunteerExperiance"
                                        class="form-control">
                                        <option selected disabled hidden>Select Experiance</option>
                                        <option value="Eid-ul-Fitar">Eid-ul-Fitar</option>
                                        <option value="Qurbani">Qurbani</option>
                                        <option value="Moharam-Ul-Haram">Moharam-Ul-Haram</option>
                                        <option value="Public Party">Public Party</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerPersonalSkills">Personal Skills</label>
                                    <input type="text" name="volunteerPersonalSkills" id="volunteerPersonalSkills" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerPassword">Password</label>
                                    <div class="input-group">
                                    <input type="password" name="volunteerPassword" id="volunteerPassword" class="form-control" required>
                                    <button  type="button" id="PassControlBtn" class="input-group-text"><i id="volunteerPassword" class="far fa-eye-slash"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerConfirmPassword">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="volunteerConfirmPassword" id="volunteerConfirmPassword" class="form-control" required>
                                        <button type="button" class="input-group-text" id="confirmPassControlBtn"><i id="volunteerConfirmPasswordBtn" class="far fa-eye-slash"></i></button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerAddress">Address</label>
                                    <textarea name="volunteerAddress" id="volunteerAddress" required class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="volunteerPicture">Profile Picture</label>
                                    <input type="file" name="volunteerPicture" accept=".png, .jpg, .jpeg" id="volunteerPicture" class="form-control" required>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <input type="submit" name="addVolunteer" value="submit" class="btn btn-primary">
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