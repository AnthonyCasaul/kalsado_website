<?php
include 'header.php';
include '../db_connect.php';
?>
<div class="container container-xl">
    <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Product Manager</h6>
                </div>
                <div class="card-body">
                <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Shoe</th>
                            <th scope="col">Image</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $user_id = $_SESSION['user_id'];

                                $qry = $conn->query("SELECT p.*, b.name AS brand_name
                                                    FROM products p
                                                    LEFT JOIN brand b ON p.brand = b.id;");

                                while ($row = $qry->fetch_assoc()):
                                        $name = $row['name'];
                                        $brand = $row['brand_name'];
                                        $picture = $row['product_image'];
                                        $category = $row['category'];
                                        $price = number_format($row['price'], 2, '.', ',');
                                        $description = $row['description'];
                                        $id = $row['id'];
                            ?>
                        <tr>
                                <td><?php echo $name; ?></td>
                                <td><img src="../assets/uploaded_image/<?php echo $picture ?>" alt="" style="height: 70px; width: auto;"></td>
                                <td><?php echo $brand; ?></td>
                                <td><?php echo $category; ?></td>
                                <td>₱<?php echo $price; ?></td>
                                <td><?php echo $description; ?></td>
                                <td>
                                    <div class="flex-wrap">
                                        <button class="btn btn-outline-success" onclick="editItem('<?php echo $id; ?>')">Edit</button>
                                        <button class="btn btn-outline-danger" onclick="deleteItem('<?php echo $id; ?>')">Delete</button>
                                    </div>
                                </td>
                        </tr>
                     <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function editItem(id){
        window.location.href = "edit_product.php?id=" + id;
    }
    function deleteItem(id){
        window.location.href = "delete_product.php?id=" + id;
    }
</script>