<?php
include './inc/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $qry = $conn->query("SELECT * FROM products WHERE id = $id ");
    $row = $qry->fetch_assoc();
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $brand = $row['brand'];
        $category = $row['category'];
        $picture = $row['product_image'];
} else {
    echo "<script>alert(No ID parameter provided in the URL)</script>";
}
?>
<style>
    main {
        padding: 20px;
      }

      .product {
        display: flex;
        gap: 20px;
        align-items: center;
        text-align: center;
        justify-content: center;

      }
      .product-image{
        width: 45%;
        position: relative;
      }

      .product-details {
        max-width: 400px;
      }

      .product-details h1 {
        margin: 0;
      }

      .price {
        font-size: 24px;
        color: #666;
      }

      .sizes p {
        margin: 10px 0 5px;
      }

      .size-buttons button {
        background-color: white;
        border: 1px solid #ccc;
        padding: 10px;
        margin: 5px;
        cursor: pointer;
      }

      .size-buttons button:hover {
        border-color: black;
      }
      .cart-button {
        background-color: black;
        color: white;
        padding: 15px;
        border: none;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        margin: 10px 0;
      }

      .description {
        margin-top: 20px;
        color: #555;
      }

      .icon {
        position: absolute;
        top: 0;
        left: 0;
        margin: 10px;
      }
</style>
<body>
    <main style="background-color: white;">
        <center>
            <section class="product">
            <div class="product-image">
                <img src="./assets/images/Icon/Reebok-icon.png" class="icon" alt="Asics Logo">
                <img src="./assets/images/ReebokShoes/ClubCVintage.png" alt="Shoe Picture" style="width: 70%;height: auto;">
                <center><p class="description" style="width: 70%;">
                  Created for the hardwood but taken to the streets, this '80s basketball icon returns with varsity-inspired overlays and original flair. With its classic design, the Nike Dunk channels vintage style, while its padded, low-cut collar lets you take your game anywhere.
                    </p>
                </center>
            </div>
            <div class="product-details">
                <h1>REEBOK "CLUB C 85 VINTAGE"</h1>
                    <p class="price">₱5,000</p>
                        <div class="sizes">
                            <p>Select Size</p>
                                <div class="size-buttons">
                                    <button>9.5 US</button>
                                    <button>10 US</button>
                                    <button>10.5 US</button>
                                    <button>11 US</button>
                                    <button>11.5 US</button>
                                    <button>12 US</button>
                                    <button>12.5 US</button>
                                    <button>13 US</button>
                                    <button>13.5 US</button>
                                    <button>14 US</button>
                                    <button>14.5 US</button>
                                    <button>15 US</button>
                                </div>
                        </div>
                     <button class="cart-button">I WANT THIS</button>
                </div>
            </section>
        </center>
    </main>
</body>