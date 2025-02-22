<?php
include "connect.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Single Faculty | Show Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row my-3">
            <div class="col-md-2 offset-sm-10">
                <a href="insert.php" class="btn btn-primary">Insert</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-borderless table-white align-middle">
                        <thead class="table-light">
                            <caption>
                                Single Faculty Data
                            </caption>
                            <tr>
                                <th>facultyFirstName</th>
                                <th>facultyLastName</th>
                                <th>facultyPhone</th>
                                <th>facultyEmail</th>
                                <th>facultyCNIC</th>
                                <th>facultyPic</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $sql = "SELECT * FROM `single_faculty`";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                
                            ?>
                            <tr class="table-white">
                                <td scope="row"><?php echo $row["facultyFirstName"] ?></td>
                                <td><?php echo $row["facultyLastName"] ?></td>
                                <td><?php echo $row["facultyPhone"] ?></td>
                                <td><?php echo $row["facultyEmail"] ?></td>
                                <td><?php echo $row["facultyCNIC"] ?></td>
                                <td><img src="images/<?php echo $row["facultyPic"] ?>" width="100" alt="Image"></td>
                                <td><a href="update.php?uid=<?php echo $row["facultyId"] ?>" class="btn btn-success">Update</a></td>
                                <td><a href="delete.php?did=<?php echo $row["facultyId"] ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <?php
                        }
                            ?>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>