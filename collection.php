<?php
include './inc/header.php';
?>
<style>
    .wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    margin: 40px;
    justify-content: center;
}

.grid-item {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 20px !important;
    width: 250px !important;
    border: 1px solid #ddd;
    margin: 20px 0px;
    text-align: center;
    height: auto;
    background-color: #fff !important;
}

.productImage {
    border-radius: 20px 20px 0 0 !important;
    width: 100% !important;
    height: auto;
}

.grid-item:hover{
    transform: scale(1.15); 
    transition: transform 0.5s ease; 
  }
.text{
    padding-top: 20px !important;
    width: 100%;
    height: auto;

}

.cart-box tr:nth-child(2){

    height: 40px;
}
.btn-outline-danger {
    color: #e83e8c !important;
    border-color: #e83e8c !important; 
}
.btn-outline-danger:hover {
    color: #fff !important; 
    background-color: #e83e8c !important;
    border-color: #e83e8c !important;
}
</style>
<body onload="getCategory('all'); getAllCategories();">
<div class="container-fluid">
    <div class="flex gap-4" id="buttonContainer" style="color:red;"></div> <!-- gawan daw ng ccs lathrell -->
    <div class="wrapper" id="productContainer">
 </div> 
</div>
</body>  
<script>

    function viewProduct(id){
        window.location.href = "view_product.php?id=" + id;
    }

     function getCategory(id){
        var productContainer = document.getElementById('productContainer');

		    $.ajax({
            type: "GET",
            url:"filter.php",
            data: {"id": id},
            success: function(resp){
            var response = JSON.parse(resp);
 
            var finalContainer = '';
            Object.keys(response).forEach(function(key) {


                var id = response[key]['id'];
                var name = response[key]['name'];
                var price = response[key]['price'].toLocaleString(undefined, {style: "currency", currency: "PHP"});
                var image = response[key]['picture'];
                var brand = response[key]['brand'];
                var category = response[key]['category'];

                var itemContainer = '<div onclick="viewProduct('+id+')" class="grid-item"><img class="productImage" src="assets/uploaded_image/'+image+'" alt=""/><div class="text"><h5>'+name+'</h5><h5>'+brand+'</h5><h5>'+category+'</h5><p>'+price+'</p></div></div>';

                finalContainer += itemContainer;
            });
            productContainer.innerHTML = finalContainer; 
            }
        });
            }
    function getAllCategories(){
        var buttonContainer = document.getElementById('buttonContainer');

		    $.ajax({
            type: "GET",
            url:"getBrand.php",
            success: function(resp){

                var response = JSON.parse(resp);

                var finalButtonContainer = '';
                    finalButtonContainer += '<button class="btn btn-outline-danger" onclick="getCategory(\'all\')">ALL</button>';
                Object.keys(response).forEach(function(key) {


                    var id = response[key]['id'];
                    var name = response[key]['name'];

                    var itemContainer = '<button class="btn btn-outline-alert" onclick="getCategory('+id+')" style="margin-right: 5px;">'+name+'</button>';

                    finalButtonContainer += itemContainer;
                    });
                buttonContainer.innerHTML = finalButtonContainer; 
            }
        });
     }
</script>