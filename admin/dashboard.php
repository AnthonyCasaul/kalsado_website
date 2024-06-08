<?php
include 'header.php';
include '../db_connect.php';


    $countUser = mysqli_query($conn, "SELECT COUNT(*) as total_count FROM profile WHERE role = 2") or die('query failed');
    $users = $countUser->fetch_assoc();

    $countBrands = mysqli_query($conn, "SELECT COUNT(*) as total_count FROM brand") or die('query failed');
    $brands = $countBrands->fetch_assoc();

    $counProducts = mysqli_query($conn, "SELECT COUNT(*) as total_count FROM products") or die('query failed');
    $products = $counProducts->fetch_assoc();

    $selectTotal = mysqli_query($conn, "SELECT SUM(total_amount) AS total_sum FROM orders") or die('query failed');
    $total =  $selectTotal->fetch_assoc();
    $total_amount = $total['total_sum'];

    $total_amounts = number_format($total_amount, 2, '.', ',');
?>
<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $users['total_count'];?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Brands</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $brands['total_count'];?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Products
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $products['total_count'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">₱ <?php echo $total_amounts;?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">             
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
            </div>
            <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">User</th> 
                        <th scope="col">Shoe</th>
                        <th scope="col">Image</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Size</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col" colspan="2"><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $user_id = $_SESSION['user_id'];

                            $qry = $conn->query("SELECT o.*, p.name, p.product_image, p.category, p.brand, b.name AS brand_name, oi.size, oi.price, u.Fullname
                                                 FROM orders o
                                                 LEFT JOIN order_items oi ON o.id = oi.order_id
                                                 LEFT JOIN products p ON oi.product_id = p.id
                                                 LEFT JOIN brand b ON p.brand = b.id
                                                 LEFT JOIN profile u ON o.user_id = u.UserID;");

                            while ($row = $qry->fetch_assoc()):
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $price = $row['price'];
                                    $brand = $row['brand_name'];
                                    $picture = $row['product_image'];
                                    $size = $row['size'];
                                    $status = $row['order_status'];
                                    $user = $row['Fullname'];
                        ?>
                        <tr>
                        <td><?php echo ucwords($user); ?></td>
                        <td><?php echo $name; ?></td>
                        <td><img src="assets/uploaded_image/<?php echo $picture ?>" height="50" alt="" class="img-fluid cartImg"></td>
                        <td><?php echo $brand; ?></td>
                        <td><?php echo $size; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $status; ?></td>
                        <td colspan="2">
                            <div class="flex-wrap">
                                <button class="btn btn-outline-success" onclick="shipItem('<?php echo $id; ?>')">Ship</button>
                                <button class="btn btn-outline-danger" onclick="cancelItem('<?php echo $id; ?>')">Cancel</button>
                            </div>
                        </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            </div>
            <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Shoe</th>
                        <th scope="col">Image</th>
                        <th scope="col">Brand</th>
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
                        ?>
                        <tr>
                        <td><?php echo $name; ?></td>
                        <td><img src="../assets/uploaded_image/<?php echo $picture ?>" alt="" style="height: 70px; width: auto;"></td>
                        <td><?php echo $brand; ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
