<?php
    ob_start();

    $action = $_GET['action'];

    include 'functions.php';

    $crud = new Action();

    if($action == "save_product"){
        $save = $crud->save_product();
        if($save)
            echo $save;
    }
    
?>