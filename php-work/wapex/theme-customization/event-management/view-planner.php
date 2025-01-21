<?php
include "./includes/connection.php";
$sql = "SELECT * FROM `planner`";
$res = mysqli_query($conn, $sql);

include "./includes/header.php";
include "./includes/sidebar.php";
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex flex-direction-row justify-content-between">
                    <h4>Planner Details</h4>
                    <a href="add-planner.php" class="btn btn-primary">Add Planner</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>DoB</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Description</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Experiance</th>
                            <th>Achievements</th>
                            <th>Skills</th>
                            <th>Address</th>
                            <th>Pic</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <td><?php echo $row["plannerFirstName"] . " " . $row["plannerLastName"] ?></td>
                            <td><?php echo $row["plannerEmail"] ?></td>
                            <td><?php echo $row["plannerDateOfBirth"] ?></td>
                            <td><?php echo $row["plannerGender"] ?></td>
                            <td><?php echo $row["plannerPhone"] ?></td>
                            <td><?php echo $row["plannerDescription"] ?></td>
                            <td><?php echo $row["plannerCountry"] ?></td>
                            <td><?php echo $row["plannerState"] ?></td>
                            <td><?php echo $row["plannerCity"] ?></td>
                            <td><?php echo $row["plannerExperiance"] ?></td>
                            <td><?php echo $row["plannerAchievements"] ?></td>
                            <td><?php echo $row["plannerSkills"] ?></td>
                            <td><?php echo $row["plannerAddress"] ?></td>
                            <td><img width="50" src="./uploads/planners/<?php echo $row["plannerPic"] ?>" alt=""></td>
                            <td><a href="update-planner.php?id=<?php echo $row["plannerId"] ?>" class="btn btn-success">Update</a></td>
                            <td><a href="delete-planner.php?id=<?php echo $row["plannerId"] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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