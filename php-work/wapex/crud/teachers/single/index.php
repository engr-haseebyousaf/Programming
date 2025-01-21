<?php
include "connect.php";
$sql = "SELECT * FROM `single_teacher`";
$res = mysqli_query($conn, $sql);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Teachers Show Data</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container my-3">
        <div class="row">
            <div class="col">
                <a href="insert.php" class="btn btn-success">Insert</a>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-borderless table-success align-middle">
                        <thead class="table-light">
                            <caption>
                                Teacher Table Show Records
                            </caption>
                            <tr>
                                <th>teacherFirstName</th>
                                <th>teacherLastName</th>
                                <th>teacherPhone</th>
                                <th>teacherEmail</th>
                                <th>teacherPic</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <tr class="table-warning">
                                <td scope="row"><?php echo $row["teacherFirstName"] ?></td>
                                <td><?php echo $row["teacherLastName"] ?></td>
                                <td><?php echo $row["teacherPhone"] ?></td>
                                <td><?php echo $row["teacherEmail"] ?></td>
                                <td><img src="images/<?php echo $row["teacherPic"] ?>" width="100" alt="Image"></td>
                                <td><a class="btn btn-success" href="update.php?uid=<?php echo $row["teacherId"] ?>">Update</a></td>
                                <td><a class="btn btn-danger" href="delete.php?did=<?php echo $row["teacherId"] ?>">Delete</a></td>
                            </tr>
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
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkhoverVc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>