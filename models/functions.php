<?php

Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include '../db_connect.php';
    
    $this->db = $conn;
	}

	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
    }

    function save_product() {
		$data = extract($_POST);
		$data = "";
        return $data;
		// foreach ($_POST as $k => $v) {
		// 	if (!in_array($k, array('id', 'status')) && !is_numeric($k)) {
		// 		if ($k == 'price' || $k == 'quantity') {
		// 			$v = str_replace(',', '', $v);
		// 		}
		// 		if (empty($data)) {
		// 			$data .= " $k='$v' ";
		// 		} else {
		// 			$data .= ", $k='$v' ";
		// 		}
		// 	}
		// }
		
		// if ($_FILES['image']['name'] != "") {
		// 	$image_name = $_FILES['image']['name'];

		// 	$target_dir = "assets/images/uploaded_image/";
		// 	if (!is_dir($target_dir)) {
		// 		mkdir($target_dir, 0755, true);
		// 	}
	
		// 	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	
		// 	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
	
		
		// 	$data .= ", picture='$image_name'";
		// }
	
		// $check = $this->db->query("SELECT * FROM products where name ='$name' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		// if ($check > 0) {
		// 	return 2; 
		// } else {
		// 	if (empty($id)) {
		// 		$save = $this->db->query("INSERT INTO products SET $data");
		// 	}
	
		// 	if ($save) {
		// 		return 1; 
		// 	} else {
		// 		return 0; 
		// 	}
		// }
	}
}