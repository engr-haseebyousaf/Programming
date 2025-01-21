<?php
     include("./connection.php");

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
       <div
        class="container-fluid" >
            <div class="table-responsive" >
                <table class="table  mt-5 table-striped table-hover table-borderless table-primary align-middle">
                    <thead class="table-danger">
                       
                    <tr class="text-center">
                            <th>student name</th>
                            <th>Father name</th>
                            <th>Email</th>
                            <th>Contact PHone no.</th>
                            <th> PIC</th>
                            <th>Image View</th>
                            <th>Delete<th>
                                <th>Update</th>
                        </tr>

                    </thead>
                    <tbody class="table-group-divider">

                        <?php
                         $sql= "SELECT * FROM `table1`";
                         $run = mysqli_query($conn, $sql);
                        //  $fetch = mysqli_fetch_array($run, MYSQLI_ASSOC);
                         while ($row = mysqli_fetch_assoc($run)){
                       
                        ?>
                        <tr class="table-primary">
                            <td><?php echo  $row['studentname'] ?></td>
                            <td><?php echo  $row['studentfname'] ?></td>
                            <td><?php echo  $row['studentemail'] ?></td>
                            <td><?php echo  $row['studentcontact'] ?></td>
                            <td><?php echo  $row['studentpic'] ?></td>
                            <td><img src=" <?php echo "./image/" .$row['studentpic'] ?>" alt="" height="80p"x width= "80px" ></td>
                            <td><a href="./delete stu table1 .php?delid=<?php echo  $row['studentid']; ?>"  class="btn btn-dark">Delete</a></td>
                            <td> <a href="./update table1.php?upid=<?php echo $row['studentid'] ; ?>" class="btn btn-success"> Update</a> </td>

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
       
            





























        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
