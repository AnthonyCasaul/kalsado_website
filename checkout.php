<?php
include 'db_connect.php';
session_start();


$user_id = $_SESSION['user_id'];
$checkboxes = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];

$response = [];
$response['user_id'] = $user_id;

if (!empty($checkboxes)) {
    $checkboxes = array_map('intval', $checkboxes);
    $ids = implode(",", $checkboxes); 

    $sql = "SELECT c.*, p.name, p.product_image, p.price, p.category, p.brand, b.name AS brand_name
            FROM cart c
            LEFT JOIN products p ON c.product_id = p.id
            LEFT JOIN brand b ON p.brand = b.id
            WHERE c.user_id = ? AND c.id IN ($ids)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        $response['error'] = "Error preparing SQL statement: " . $conn->error;
    } else {
      
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $total_price = 0;
            $order_details = [];

            while ($row = $result->fetch_assoc()) {
                $total_price += $row['price'];
                $order_details[] = [
                    'user_id' => $user_id,
                    'product_id' => $row['product_id'],
                    'price' => $row['price'],
                    'size' => $row['size'],
                    'name' => $row['name'],
                    'brand' => $row['brand_name'],
                    'category' => $row['category']
                ];
            }

            $sql_insert_order = "INSERT INTO orders (user_id, order_status, total_amount) VALUES (?, 'Pending', ?)";
            $stmt_insert_order = $conn->prepare($sql_insert_order);
            if (!$stmt_insert_order) {
                $response['error'] = "Error preparing SQL statement for inserting order: " . $conn->error;
            } else {
      
                $stmt_insert_order->bind_param('id', $user_id, $total_price);
                $stmt_insert_order->execute();
  
                $order_id = $stmt_insert_order->insert_id;

                foreach ($order_details as $detail) {
                    $product_id = $detail['product_id'];
                    $price = $detail['price'];
                    $size = $detail['size'];
                    $name = $detail['name'];
                    $brand = $detail['brand'];
                    $category = $detail['category'];

                    $sql_insert_order_item = "INSERT INTO order_items (order_id, product_id, price, size) VALUES (?, ?, ?, ?)";
                    $stmt_insert_order_item = $conn->prepare($sql_insert_order_item);
                    if (!$stmt_insert_order_item) {
                        $response['error'] = "Error preparing SQL statement for inserting order items: " . $conn->error;
                        break;
                    } else {
             
                        $stmt_insert_order_item->bind_param('iiis', $order_id, $product_id, $price, $size);
                        $stmt_insert_order_item->execute();
                    }
                }

                $deleteQuery = mysqli_query($conn, "DELETE FROM cart WHERE id IN ($ids)");
                $response['order_id'] = $order_id;
            }

            $stmt_insert_order->close();
        } else {
            $response['error'] = "No products found in the cart for the selected IDs.";
        }

        $stmt->close();
    }
} else {
    $response['error'] = "No products selected.";
}

// Encode the response as JSON
echo json_encode($response);
?>