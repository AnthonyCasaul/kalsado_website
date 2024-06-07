<?php
    include 'db_connect.php';
    $id = $_GET['id'];


    $responseArray = array();

    $qry = '';
    if ($id == 'all'){
        $qry = $conn->query("SELECT * FROM products ORDER BY name ASC");
    }

    else{
        $qry = $conn->query("SELECT * FROM products WHERE brand = $id ORDER BY name ASC");   
    }

    while($row = $qry->fetch_assoc()){
    $id = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $brand = $row['brand'];
    $category = $row['category'];
    $picture = $row['product_image'];

    $tempArray = array(
        "id" => $id,
        "name" => $name,
        "price" => (int) $price,
        "picture" => $picture,
        "brand" => $brand,
        "category" => $category,
        "picture" => $picture
    );
    array_push($responseArray, $tempArray);
    }
    print_r(json_encode($responseArray));
?>