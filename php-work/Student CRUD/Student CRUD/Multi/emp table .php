<?php
    include("./connection.php");
    if(isset($_POST["submit"])){
        echo $empname = mysqli_real_escape_string($conn,$_POST["emp-name"]);
        echo $empsalary = mysqli_real_escape_string($conn,$_POST["emp-salary"]);
        echo $empjob = mysqli_real_escape_string($conn,$_POST["emp-job"]);
        echo $empcity = mysqli_real_escape_string($conn,$_POST["emp-city"]);
        echo $empgrade = mysqli_real_escape_string($conn,$_POST["emp-grade"]);
    
        $sql= "INSERT INTO `employee table 2` (`emp-name`, `emp-salary`, `emp-job`, `emp-city`, `emp-grade`) 
        VALUES ('$empname', '$empsalary', '$empjob', '$empcity', '$empgrade')";
    
        $run = mysqli_query($conn,$sql);
        if($run){
            $msg ="data is inserted";
        }
        else{
            $msg = "data is not inserted";
        }
    }
    
?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-info">
        <h1><?php echo @$msg; ?></h1>
        <form method = "post">
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">emp name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="emp-name" id="inputName" placeholder="Name" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Salary</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="emp-salary" id="inputName" placeholder="Salary" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Designation</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="emp-job" id="inputName" placeholder="Job in company" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">City</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="emp-city" id="inputName" placeholder="City" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputName" class="col-4 col-form-label">Emp grade</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="emp-grade" id="inputName" placeholder="Grade(11,16..)" />
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <input type ="submit"  value="submit"  class="btn btn-success" name="submit">
                </div>
            </div>
        </form>
    </div>






















    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>