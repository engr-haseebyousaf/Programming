<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="31-ajax-serialize.css">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <h1 class="text-primary bg-warning py-3 text-center">Ajax serialize form</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form id="serialize_form">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"><br>
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age"><br>
                        <label for="gender">Gender</label><br>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="male" id="male">
                        <label for="female">Female</label>
                        <input type="radio" name="gender" value="female" id="female"><br>
                        <label for="country">Country</label>
                        <select name="country" id="country">
                            <option value="pakistan">Pakistan</option>
                            <option value="india">India</option>
                            <option value="bangladesh">Bangladesh</option>
                            <option value="nepal">Nepal</option>
                        </select><br>
                        <button id="submit" class="btn btn-warning">Submit</button>
                    </form>
                    <div id="display"></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="jquery/jquery.js"></script>
<script>
    $(document).ready(function(){
        $(document).on("click","#submit",function(event){
            event.preventDefault();
            var stu_name = $("#name").val();
            var stu_age = $("#age").val();
            if (stu_name === "" || stu_age === "" || !$("input:radio[name=gender]").is(":checked")) {
                $("#display").fadeIn();
                $("#display").removeClass("success-message").addClass("failure-message").html("All fields are required");
                setTimeout(function(){
                    $("#display").fadeOut();
                },4000);
            }else{
                $.post(
                    "31-32-ajax-serialize-with-post.php",
                    $("#serialize_form").serialize(),
                    function(data){
                        $("#serialize_form").trigger("reset");
                        $("#display").fadeIn();
                            $("#display").removeClass("failure-message").addClass("success-message").html(data);
                    }
                );
            }
        });
    });
</script>
</html>