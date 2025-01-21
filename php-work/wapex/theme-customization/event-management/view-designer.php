<?php
include "./includes/connection.php";
$sql = "SELECT * FROM `designer`";
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
                  <div class="card-header d-flex justify-content-between">
                    <h4>Export Table</h4>
                    <a href="./add-designer.php" class="btn btn-primary">Add Designer</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Experiance</th>
                                <th>Ordered Design</th>
                                <th>Description</th>
                                <th>Company</th>
                                <th>Number of design</th>
                                <th>Address</th>
                                <th>Picture</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($res = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($res)>0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["designerFirstName"] ?></td>
                                            <td><?php echo $row["designerLastName"] ?></td>
                                            <td><?php echo $row["designerEmail"] ?></td>
                                            <td><?php echo $row["designerDateOfBirth"] ?></td>
                                            <td><?php echo $row["designerGender"] ?></td>
                                            <td><?php echo $row["designerPhone"] ?></td>
                                            <td><?php echo $row["designerCountry"] ?></td>
                                            <td><?php echo $row["designerState"] ?></td>
                                            <td><?php echo $row["designerCity"] ?></td>
                                            <td><?php echo $row["designerExperiance"] ?></td>
                                            <td><?php echo $row["designerOrderedDesign"] ?></td>
                                            <td><?php echo $row["designerDescription"] ?></td>
                                            <td><?php echo $row["designerCompany"] ?></td>
                                            <td><?php echo $row["designerNumberOfDesign"] ?></td>
                                            <td><?php echo $row["designerAddress"] ?></td>
                                            <td><img src="./uploads/designers/<?php echo $row["designerPicture"] ?>" width="50" ></td>
                                            <td><a href="./update-designer.php?id=<?php echo $row["designerId"] ?>" class="btn btn-success">Update</a></td>
                                            <td><a href="./delete-designer.php?id=<?php echo $row["designerId"] ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    echo "<tr>
                                            <td colspan='19'>Failed to load</td>
                                        </tr>";
                                }
                            } else {
                            ?>
                            <tr>
                                <td colspan='19'>Failed to load</td>
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


</html>b