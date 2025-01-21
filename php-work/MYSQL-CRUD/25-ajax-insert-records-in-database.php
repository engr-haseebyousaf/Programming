<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Records In Database</title>
    <script src="jquery/jquery.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="CSS/bootstrap-4.4.1-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container w-75">
        <div class="row">
            <div class="col-12">
                
            </div>
            <div class="col">
                <form action="" id="insert-form">
                    <div class="container">
                        <div class="row bg-warning mx-0 pt-3">
                            <div class="col-md-8">
                                <h1>Ajax Insert Records in Database</h1>
                            </div>
                            <div class="col-md-4">
                            <div class="col-md-12">
                                <div class="row mb-2">
                                    <div class="col-md-12 pr-5">
                                        <h3 class="text-right">Live Search</h3>
                                    </div>
                                    <div class="col-md-12 pr-5 ml-auto">
                                        <input type="search" name="search" placeholder="Search" class="form-control" id="search">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3 m-auto">
                                <div class="form-group">
                                    <input type="text" name="fname" class="form-control" placeholder="First Name" id="fname">
                                </div>
                            </div>
                            <div class="col-md-3 m-auto">
                                <div class="form-group">
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name" id="lname">
                                </div>
                            </div>
                            <div class="col-md-3 m-auto">
                                <div class="form-group">
                                    <input type="text" name="age" class="form-control" placeholder="Age" id="age">
                                </div>
                            </div>
                            <div class="col-md-3 m-auto">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="save-button">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-0 px-0">
                            <div class="col-md-12 mx-0 px-0" id="data">
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="success-message"></div>
    <div id="failure-message"></div>
    <!-- Modal Form for update of record -->
    <div id="modal">
        <div id="modal-form">
        <h2>Update Form</h2>
        <button id="update_close_btn">X</button>
            <form></form>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" id="modal_update_button" class="btn-sm btn-outline-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            //load table function
            function loadTable() {
                $.ajax({
                    url : "24-load.php",
                    type : "POST",
                    success : function(data){
                        $("#data").html(data);
                    }
                });
            }
            loadTable();
            //function for live search option
            $(document).on("keyup","#search",function(){
                var value = $(this).val();
                $.ajax({
                    url : "28-ajax-live-search.php",
                    type : "POST",
                    data : {search_keyword : value},
                    success :function(data){
                        $("#data").html(data);
                    }
                });
            });
            //edit button function for modal box
            $(document).on("click",".edit-btn",function(e){
                e.preventDefault();
                $("#modal").show();
                var editId = $(this).data("eid");
                //modal button for closing the modal
                $(document).on("click","#update_close_btn",function(){
                    $("#modal").hide();
                });
                //function to show record of selected person in modal box
                $.ajax({
                    url : "27-show-modal-record.php",
                    type : "POST",
                    data : {updateId : editId},
                    success :function(data){
                        $("#modal-form form").html(data);
                    }
                });
                //function to update the selected record in modal box
                $(document).on("click","#modal_update_button",function(e){
                    e.preventDefault();
                    var update_first_name = $("#update_fname").val();
                    var update_Id = $("#update_id").val();
                    var update_last_name = $("#update_lname").val();
                    var update_age = $("#update_age").val();
                    $.ajax({
                        url : "27-update-modal-record.php",
                        type : "POST",
                        data : {edit_Id : update_Id, updatedFName : update_first_name, updatedLName : update_last_name, updatedAge : update_age},
                        success : function(data){
                            $("#modal").hide();
                            if (data == 1) {
                                $("#success-message").html("Updated Successfully!").slideDown();
                                $("#failure-message").slideUp();
                                loadTable();
                            }else{
                                $("#failure-message").html("Can't Update!").slideDown();
                                $("#success-message").slideUp();
                            }
                        }
                    });
                });
            });
            //delete button function
            $(document).on("click",".delete-btn",function(e){
                e.preventDefault();
                var element = this;
                var delete_id = $(this).data("did");
                $.ajax({
                    url : "26-delete.php",
                    type : "POST",
                    data : {id : delete_id},
                    success :function(data){
                        if (data == 1) {
                            $(element).closest("tr").fadeOut();
                            $("#success-message").html("Deleted Successfully!").slideDown();
                            $("#failure-message").slideUp();
                            loadTable();
                        }else{
                            $("#failure-message").html("Can't delete!").slideDown();
                            $("#success-message").slideUp();
                        }
                    }
                });
            });
            //top save button function
            $(document).on("click","#save-button",function(e){
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var age = $("#age").val();
                if(fname == "" || lname == "" || age == "") {
                    $("#failure-message").html("All fields are required").slideDown();
                    $("#success-message").slideUp();
                }else{
                    
                    $.ajax({
                    url : "25-load.php",
                    type : "POST",
                    data : {first_name:fname, last_name:lname, stu_age:age},
                    success :function(key){
                        if (key == 1) {
                            loadTable();
                            $("#insert-form").trigger("reset");
                            $("#success-message").html("Inserted Successfully!").slideDown();
                            $("#failure-message").slideUp();
                        }else{
                            $("#failure-message").html("Failed to insert").slideDown();;
                            $("#success-message").slideUp();
                        }
                    }});
                }
            
            });
        });
    </script>
</body>
</html>