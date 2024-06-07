<?php
include 'db_connect.php';

$selectCategory = $conn->query("SELECT * FROM brand ORDER BY name ASC");

$responseArray = array();

while($row = $selectCategory->fetch_assoc()){
    $id = $row['id'];
    $name = $row['name'];

    
    $tempArray = array(
        "id" => $id,
        "name" => $name
    );
    array_push($responseArray, $tempArray);
    }
    print_r(json_encode($responseArray));

?>