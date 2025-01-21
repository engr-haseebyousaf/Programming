<?php
include "config.php";
$sql = "SELECT * FROM `multi_student`";
$res = mysqli_query($conn, $sql);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Multiple Images Student</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="insert.php" class="btn btn-primary">Insert</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-borderless table-primary align-middle">
                    <thead class="table-light">
                        <caption>
                            Multiple Students
                        </caption>
                        <tr>
                            <th>studentFirstName</th>
                            <th>studentLastName</th>
                            <th>studentPhone</th>
                            <th>studentEmail</th>
                            <th>studentCNIC</th>
                            <th>studentPic</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr class="table-primary">
                            <td scope="row"><?php echo $row["studentFirstName"] ?></td>
                            <td><?php echo $row["studentLastName"] ?></td>
                            <td><?php echo $row["studentPhone"] ?></td>
                            <td><?php echo $row["studentEmail"] ?></td>
                            <td><?php echo $row["studentCNIC"] ?></td>
                            <td>
                            <?php
                            $studentPics = unserialize($row["studentPic"]);
                            foreach ($studentPics as $value) {
                            ?>
                            <img src="images/<?php echo $value ?>" width="50" alt="Image">
                            <?php
                            }
                            ?>
                            </td>
                            <td><a class="btn btn-success" href="update.php?uid=<?php echo $row["studentId"] ?>">Update</a></td>
                            <td><a class="btn btn-danger" href="delete.php?did=<?php echo $row["studentId"] ?>">Delete</a></td>
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

<body>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>