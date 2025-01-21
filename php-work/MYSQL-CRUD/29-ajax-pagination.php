<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="29-style.css">
    <script src="jquery/jquery.js"></script>
    <title>Ajax Pagination</title>
</head>
<body>
    <h1>Sami</h1>
    <div id='content'>
        
                    
                
        
    </div>
    <script>
        $(document).ready(function(){
            function loadTable(page) {
                $.ajax({
                    url : "29-pagination-load.php",
                    data : {page,page},
                    type : "POST",
                    success :function(data){
                        $("#content").html(data);
                    }
                });
            }
            loadTable();
            $(document).on("click","#pagination_button_group button", function(){
                var page_id = $(this).attr("id");
                loadTable(page_id);
            });
        });
    </script>
</body>
</html>