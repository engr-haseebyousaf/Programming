<!doctype html>
<html lang="en">

<head>
    <title>Show Student | Foreign Key</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6"><a class="btn btn-primary" href="insert-student.php">Insert Student</a></div>
            <div class="col-md-6"><a class="btn btn-success" href="insert-teacher.php">Insert Teacher</a></div>
        </div>
    </div>
    <div class="containr">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-borderless table-primary align-middle">
                    <thead class="table-light">
                        <caption>
                            Show data with foreign key
                        </caption>
                        <tr>
                            <th>student_name</th>
                            <th>student_teacher</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM `primary_key_student` INNER JOIN `primary_key_teacher` ON `student_teacher`=`teacher_id`";
                        // $sql = "SELECT * FROM `primary_key_student` LEFT JOIN `primary_key_teacher` ON `student_teacher`=`teacher_id`";
                        // $sql = "SELECT * FROM `primary_key_student` RIGHT JOIN `primary_key_teacher` ON `student_teacher`=`teacher_id`";
                        $sql = "SELECT COUNT(*) FROM `primary_key_student`";

                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($res);
                        echo "<pre>";
                        print_r($row);
                        die();
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr class="table-primary">
                            <td scope="row"><?php echo $row["student_name"]." ".$row["student_id"] ?></td>
                            <td><?php echo $row["teacher_name"]." ".$row["teacher_id"] ?></td>
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

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>