<?php
include './inc/header.php';
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $qry = $conn->query("SELECT p.*, b.name AS brand_name, b.icon_image
                         FROM products p
                         LEFT JOIN brand b ON p.brand = b.id
                         WHERE p.id = $id;");

    $row = $qry->fetch_assoc();
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $brand = $row['brand_name'];
        $category = $row['category'];
        $picture = $row['product_image'];
        $icon = $row['icon_image'];
        $description = $row['description'];
} else {
    echo "<script>alert(No ID parameter provided in the URL)</script>";
}

if (isset($_POST['addToCart'])) {
    if (isset($_SESSION['user_id']) === true){
      $user_id = $_SESSION['user_id'];
      $size = mysqli_real_escape_string($conn, $_POST['size']);
      $insert = mysqli_query($conn, "INSERT INTO `cart`(user_id, product_id, size, total_price) VALUES('$user_id', '$id', '$size', '$price')") or die('query failed');
      echo "<script>window.location.href='cart.php';</script>";
    }
    else {
        echo "<script>window.location.href='login.php';</script>";
    }
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
                <img src="assets/uploaded_icon/<?php ?>" class="icon" alt="Asics Logo">
                <img src="assets/uploaded_image/<?php echo $picture ?>" alt="Shoe Picture" style="width: 70%;height: auto;">
                <center><p class="description" style="width: 70%;">
                <?php echo $description ?>
                    </p>
                </center>
            </div>
            <div class="product-details">
                <h1><?php echo $brand." "?>"<?php echo $name ?>"</h1>
                    <p class="price">₱<?php echo $price ?></p>
                        <div class="sizes">
                            <p>Select Size</p>
                            <form method="post" action="">
                                <div class="size-buttons">
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined1" value="9.5 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined1">9.5 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined2" value="10 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined2">10 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined3" value="10.5 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined3">10.5 US US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined4" value="11 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined4">11 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined5" value="11.5 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined5">11.5 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined6" value="12 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined6">12 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined7" value="12.5 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined7">12.5 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined8" value="13 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined8">13 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined9" value="13.5 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined9">13.5 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined10" value="14 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined10">14 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined11" value="14.5 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined11">14.5 US</label>
                                    <input type="radio" class="btn-check" name="size" id="btn-check-outlined12" value="15 US" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="btn-check-outlined12">15 US</label>
                                </div>
                        </div>
                     <button type="submit" name="addToCart" class="cart-button">I WANT THIS</button>
                    </form>
                </div>
            </section>
        </center>
    </main>
</body>