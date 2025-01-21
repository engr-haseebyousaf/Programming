<?php
    include "database.php";
    $obj = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #outer{
            margin-right: auto;
            margin-left: auto;
            width: 80%;
            border: 5px solid black;
            border-radius: 5px;
        }
        #inner{
            border: 2px solid black;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            padding: 0;
            position: absolute;
            bottom: 50px;
            right: 30%;
        }
        .pagination{
            display: block;
            list-style: none;
            padding: 0;
        }
        .pagination li{
            display: inline-block;
            margin: 0 5 0 5;
        }
        .pagination li a{
            padding: 10px;
        }
        .pagination li a:hover{
            background-color: red;
            color: white;
        }
        .active{
            background-color: blue;
            color: white;
        }
    </style>
    <title>Show Data</title>
</head>
<body>
    <div id="outer">
        <table border="1" width="100%">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Class</th>
            </tr>
            <?php
                $table = "students3";
                $select = "*";
                $join = "INNER JOIN city ON students3.city = city.cid";
                $where = null;
                $order = "students3.id ASC";
                $limit = 3;
                $obj->select($table,$select,$join,$where,$order,$limit);
                $variable = $obj->getResult();
                foreach ($variable as list("id"=>$id, "name"=>$name, "age"=>$age, "city"=>$city)) {
                    // echo "$id - $name - $age - $city <br>";
                    echo "<tr><td>$id</td><td>$name</td><td>$age</td><td>$city</td></tr>";
                }
            ?>
        </table>
    </div>
    <div id="inner">
        <?php
            $obj->pagination($table,$join, $where, $limit);
        ?>
    </div>
</body>
</html>