<?php
include './inc/header.php';
include 'db_connect.php';

if (isset($_SESSION['user_id']) === false){
    echo "<script>window.location.href='login.php';</script>";
}


?>
<body>
    <style>
        .cartImg {
            height: 160px;
            width: auto;
            margin-bottom: 10px;
        }
    </style>
<div class="container-fluid justify-content-center">
    <div class="container-sm">             
            <div class="card shadow-lg mb-4" style="border-radius: 15px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cart</h6>
                </div>
                <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Shoe</th>
                        <th scope="col">Image</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Size</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $user_id = $_SESSION['user_id'];

                            $qry = $conn->query("SELECT c.*, p.name, p.product_image, p.price, p.category, p.brand, b.name AS brand_name
                                                 FROM cart c
                                                 LEFT JOIN products p ON c.product_id = p.id
                                                 LEFT JOIN brand b ON p.brand = b.id
                                                 WHERE c.user_id = $user_id;");

                            while ($row = $qry->fetch_assoc()):
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $price = $row['price'];
                                    $brand = $row['brand_name'];
                                    $category = $row['category'];
                                    $picture = $row['product_image'];
                                    $size = $row['size'];
                        ?>
                        <tr>
                        <th scope="row"><input type="checkbox" name="myCheckbox[]" value="<?php echo $id; ?>" required></th>
                        <td><?php echo $name; ?></td>
                        <td><img src="assets/uploaded_image/<?php echo $picture ?>" height="50" alt="" class="img-fluid cartImg"></td>
                        <td><?php echo $brand; ?></td>
                        <td><?php echo $size; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $price; ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                    </table>
                </div>
                <div class="card-footer">
						<div class="row">
							<div class="col-md-12 text-center">
								<button class="btn btn-primary" type="submit" name="submit" id="submit" onclick='validateCheckboxes();' disabled>Checkout</button>
								<button class="btn btn-default" type="button" onclick="backBtn()">Back</button>
							</div>
						</div>
				    </div>
                </form>
            </div>
        </div>
    </body>
<script>
const checkboxes = document.querySelectorAll('input[name="myCheckbox[]"]');

    function backBtn() {
        window.location.href = "index.php";
    }

    function validateCheckboxes() {
            let isChecked = false;

            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    isChecked = true;
                }
            });

            if (isChecked) {
                $("#submit").prop("disabled", false);
                return true;
            } else {
                $("#submit").prop("disabled", true);
                return false;
            }
        }

        document.querySelectorAll('input[name="myCheckbox[]"]').forEach((checkbox) => {
            checkbox.addEventListener('change', validateCheckboxes);
        });

  
        validateCheckboxes();

     
        $("#submit").click(function() {
            console.log("click event");
            if (validateCheckboxes()) {
                const selectedCheckboxes = [];
                document.querySelectorAll('input[name="myCheckbox[]"]:checked').forEach((checkbox) => {
                    selectedCheckboxes.push(checkbox.value);
                });
                console.log(selectedCheckboxes);
                $.ajax({
                    url: 'checkout.php',
                    type: 'POST',
                    data: { checkboxes: selectedCheckboxes },
                    success: function(response) {
                    window.location.href='printOrders.php';
                  
                    },
                    error: function(xhr, status, error) {
                    
                        console.error('Error:', error);
                    }
                });
            }
        });
</script>