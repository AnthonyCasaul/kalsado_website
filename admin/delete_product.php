<?php
include '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $delete = mysqli_query($conn,"DELETE FROM products WHERE id = '$id'");

    echo  "<script>
                window.location.href='manage_product.php';
            </script>";
}
?>