<?php
include "./includes/connection.php";
if (isset($_POST["addVenue"])) {
    $venueTitle = mysqli_real_escape_string($conn, $_POST["venueTitle"]);
    $venueDescription = mysqli_real_escape_string($conn, $_POST["venueDescription"]);
    if (empty($venueTitle) || empty($venueDescription)) {
        echo "<script>alert('Please Fill both values')</script>";
    } else {
        $sql = "INSERT INTO `venue` (`venueTitle`,`venueDescription`) VALUES ('$venueTitle','$venueDescription')";
        if (mysqli_query($conn, $sql)) {
            header("Refresh:2,./view-venue.php");
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
                  <form method="post">
                    <div class="card-header d-flex justify-content-between">
                      <h4>Add Venue</h4>
                      <a href="./view-venue.php" class="btn btn-primary">View Venue</a>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="venueTitle">Title</label>
                        <input type="text" name="venueTitle" id="venueTitle" class="form-control" required>
                      </div>
                      <div class="form-group mb-0">
                        <label for="venuDescription">Description</label>
                        <textarea name="venueDescription" id="venueDescription" class="form-control" required></textarea>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                        <input type="submit" name="addVenue" value="Insert" class="btn btn-primary">
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