
$(document).ready(function () {
    $("#add-product-form").submit(function(e){
        e.preventDefault();
     
        var add_product_featured_image = $("#add-product-featured-image").val();
    
        var isInvalid = true;
    
            if (add_product_featured_image.length===0) {
                $("#add-product-featured-image-fileHelpId").removeClass("text-muted").addClass("text-danger").text("* Product Image Required");
                isInvalid = false;
            }
       
            
        if (isInvalid) {
            var origin = window.location.origin;
            var path = window.location.pathname.split("/");

            var url = origin + "/" + path[1];
        
            console.log(origin);
            console.log(path);
            console.log(url + "/php-files/add_admin.php");
            var formData = new FormData(this);
            var count = 1;
            files.forEach(function (e) {
                formData.append("file"+count,e);
                count += 1;
            });
            formData.append("add_product_form_data","1");
            $.ajax({
                type: "POST",
                url: url + "/php-files/add-product.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response2) {
                    console.log(response2);
                    var res2 = JSON.parse(response2);
                    if (res2.hasOwnProperty("success")) {
                        $("#add-product-message-box").html("<div class='alert alert-success'>Product Inserted Successfully</div>");
                        
                    } else {
                        $("#add-product-message-box").html("<div class='alert alert-danger'>Cannot Insert Product</div>");
                        
                    }
                }
            });
        }
            
    });



    var files = null;
    document.getElementById("add-product-featured-image").addEventListener("change", function(e){
    e.preventDefault();
    console.dir(this.files);
    files = Array.from(this.files);
    if (files.length > 4) {
        alert("Only 4 images can be used!");
        files = files.slice(0,3);
        console.dir(this.files);
        console.log("files",files);
    }
    var primary_img = document.createElement("img");
    primary_img.src = URL.createObjectURL(files[0]);
    document.getElementById("add-product-featured-image-inner-box").innerHTML = "";
    document.getElementById("add-product-featured-image-inner-box").appendChild(primary_img);
    document.getElementById("add-product-featured-image-inner-box").style.setProperty("background-image","none","important");
    var images = "";
    console.log("second file",files);
    for (let i = 1; i < files.length; i++) {
        images += `
        <div class="add-product-featured-image-side-image">
            <img src="`+ URL.createObjectURL(files[i]) +`">
        </div>
        `;
    }
    document.getElementById("add-product-featured-image-side-image-box").innerHTML = images;
    document.querySelectorAll(".add-product-featured-image-side-image").forEach(element => {
        element.style.setProperty("background-image","none","important")
    });
});
});