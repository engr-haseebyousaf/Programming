<?php
include "./includes/connection.php";
$sql = "SELECT * FROM `volunteer`";
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
                  <div class="card-header">
                    <h4>View Volunteer</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Date Of Birth</th>
                            <th>Gender</th>
                            <th>Phone No</th>
                            <th>Description</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Type of Occassion</th>
                            <th>Experiance</th>
                            <th>Personal Skills</th>
                            <th>Address</th>
                            <th>Picture</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($res)>0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <tr>
                                <td><?php echo $row["volunteerFirstName"] ?></td>
                                <td><?php echo $row["volunteerLastName"] ?></td>
                                <td><?php echo $row["volunteerEmail"] ?></td>
                                <td><?php echo $row["volunteerDateOfBirth"] ?></td>
                                <td><?php echo $row["volunteerGender"] ?></td>
                                <td><?php echo $row["volunteerPhone"] ?></td>
                                <td><?php echo $row["volunteerDescription"] ?></td>
                                <td><?php echo $row["volunteerCountry"] ?></td>
                                <td><?php echo $row["volunteerState"] ?></td>
                                <td><?php echo $row["volunteerCity"] ?></td>
                                <td><?php echo $row["volunteerOccassion"] ?></td>
                                <td><?php echo $row["volunteerExperiance"] ?></td>
                                <td><?php echo $row["volunteerPersonalSkills"] ?></td>
                                <td><?php echo $row["volunteerAddress"] ?></td>
                                <td><img src="./uploads/volunteers/<?php echo $row["volunteerPicture"] ?>" width="50"></td>
                                <td><a href="./update-volunteer.php?id=<?php echo $row["volunteerId"] ?>" class="btn btn-success">Update</a></td>
                                <td><a href="./delete-volunteer.php?id=<?php echo $row["volunteerId"] ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                                }
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


</html>b