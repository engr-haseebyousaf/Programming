<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="30-load-more-pagination.css">
    <title>AJAX load more pagination</title>
</head>
<body>
    <div id="outer_container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto mt-3">
                    <h1 class="bg-warning text-primary p-2 pb-3">AJAX load more pagination</h1>
                    <div>
                    <table class='table table-striped table-hover' id="content">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                            </tr>
                        </thead>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="jquery/jquery.js"></script>
    <script>
        $(document).ready(function(){
            function loadTable(last) {
                $.ajax({
                url : "30-load-content.php",
                type : "POST",
                data : {Data : last},
                success : function(data){
                    if (data) {
                        $("#pagination").remove();
                        $("#load_more_btn").html("Loading...");
                        $("#content").append(data);
                    }else{
                        $("#load_more_btn").html("Stop");
                        $("#load_more_btn").prop("disabled",true);
                    }
                }
            });
            }
            loadTable();

            $(document).on("click","#load_more_btn",function(){
                var pid = $(this).data("id");
                loadTable(pid);
            });
        });
    </script>
</body>
</html>