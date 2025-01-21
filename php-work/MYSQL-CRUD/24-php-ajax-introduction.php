<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap-4.4.1-dist/css/bootstrap.css">
    <style>
        #main{
            display: block;
            margin: 10px auto 0 auto;
            width: 600px;
            border: 2px solid black;
            min-height: 90vh;
        }
        #records{
            width: 100%;
        }
    </style>
    <title>php ajax introduction</title>
</head>
<body>
    <table id="main">
        <tr>
            <th><h2 class="bg-warning mx-auto d-block">PHP AJAX table</h2></th>
        </tr>
        <tr>
        <th><button id="show_button" class="bg-primary">Show button</button></th>
        </tr>
        <tr>
        <td id="records"></td>
        </tr>
    </table>
    
    <script src="jquery/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#show_button").on("click",function(e) {
                $.ajax({
                    url : "24-load.php",
                    type : "POST",
                    success : function(data){
                        $("#records").html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>