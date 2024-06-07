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
}

.productImage {
    border-radius: 20px 20px 0 0 !important;
    width: 100% !important;
    height: auto;
}

.grid-item:hover{
    transform: scale(1.15); /* Adjust the scale factor as needed */
    transition: transform 0.5s ease; /* Add a smooth transition effect */
  }
.text{
    padding-top: 20px !important;
    width: 100%;
    height: 20%;
    /* border: 1px solid red; */
}
/* .cart-box{
    background-color: aqua;
} */
.cart-box tr:nth-child(2){
    /* background-color: red; */
    height: 40px;
}
.btn-outline-danger {
    color: #e83e8c !important; /* Pink color */
    border-color: #e83e8c !important; /* Pink color */
}
.btn-outline-danger:hover {
    color: #fff !important; /* White color on hover */
    background-color: #e83e8c !important; /* Pink color on hover */
    border-color: #e83e8c !important; /* Pink color on hover */
}
</style>
<div class="wrapper" id="productContainer"> 
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>   
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
<div onclick="showProductModal('id')" class="grid-item">
    <img class="productImage" src="./assets/images/image1.jpg" alt=""/>
    <div class="text">
        <h5>name</h5>
        <p>price</p>
    </div>
</div>  
</div>