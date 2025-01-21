<?php
include "connect.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Multi Staff | Data Show</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Multi Teacher show</h2>
            </div>
            <div class="row my-3">
                <div class="col">
                <a href="insert.php" class="btn btn-primary">Insert</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-borderless table-success align-middle">
                        <thead class="table-light">
                            <caption>
                                Multi Staff Data
                            </caption>
                            <tr>
                                <th>staffFirstName</th>
                                <th>staffLastName</th>
                                <th>staffPhone</th>
                                <th>staffEmail</th>
                                <th>staffCNIC</th>
                                <th>staffPic</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $sql = "SELECT * FROM `multi_staff`";
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <tr class="table-warning">
                                <td scope="row"><?php echo $row["staffFirstName"] ?></td>
                                <td><?php echo $row["staffLastName"] ?></td>
                                <td><?php echo $row["staffPhone"] ?></td>
                                <td><?php echo $row["staffEmail"] ?></td>
                                <td><?php echo $row["staffCNIC"] ?></td>
                                <td>
                                    <?php
                                    $teacherPics = unserialize($row["staffPic"]);
                                    foreach ($teacherPics as $teacherPic) {
                                    ?>
                                    <img src="images/<?php echo $teacherPic ?>" width="50" alt="">
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><a href="update.php?uid=<?php echo $row["staffId"] ?>" class="btn btn-success">Update</a></td>
                                <td><a href="delete.php?did=<?php echo $row["staffId"] ?>" class="btn btn-danger">Delete</a></td>
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
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>