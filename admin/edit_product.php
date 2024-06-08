<?php
include 'header.php';
include '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $qry = $conn->query("SELECT p.*, b.name AS brand_name
                         FROM products p
                         LEFT JOIN brand b ON p.brand = b.id
                         WHERE p.id = $id;");

    $row = $qry->fetch_assoc();
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];
        $size = $row['size'];
        $quantity = $row['quantity_stock'];
        $brand_id = $row['brand'];
        $brand = $row['brand_name'];
        $category = $row['category'];
        $picture = $row['product_image'];
        $description = $row['description'];
        $path = '../assets/uploaded_image/';	
        $existing_image_path =	$path.$picture;	
} else {
    echo "<script>alert(No ID parameter provided in the URL)</script>";
}

if(isset($_POST['submit'])){ 

        $name = mysqli_real_escape_string($conn, ucwords($_POST['name']));
        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
        $size = mysqli_real_escape_string($conn, $_POST['size']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../assets/uploaded_image/'.$image;

        if(!empty($image)) {
            $image = $image;
        } else {
            $existing_image = mysqli_real_escape_string($conn, $_POST['existing_image']);
            $image = $existing_image;
        }


        $select = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$id'") or die('query failed');

        if(mysqli_num_rows($select) > 0){
            // Update the existing product
            $update = mysqli_query($conn, "UPDATE `products` SET name = '$name', price = '$price', category = '$gender', brand = '$brand', quantity_stock = '$quantity', description = '$description', size = '$size', product_image = '$image' WHERE id = '$id'") or die('update query failed');

            if($update){
                move_uploaded_file($image_tmp_name, $image_folder);
                echo "<script>
                        alert('Updated Successfully');
                        window.location.href='manage_product.php';
                    </script>"; 
            } else {
                echo "<script>
                        alert('Failed to Update Product!');
                    </script>"; 
            }
        } else {
            echo "<script>
                    alert('Product does not exist!');
                </script>"; 
        }
    }


?>
<div class="container-fluid justify-content-center">
    <div class="container-lg">             
            <div class="card shadow mb-4" style="border-radius: 15px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
                </div>
                <form action="" id="manage-product" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label   label class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name ?>" >
				    </div>
                    <div class="form-group">
                        <label class="control-label">brand</label>
                        <select name="brand" id="category_id" class="custom-select select2" >
                            <option value="<?php echo $brand_id ?>"><?php echo $brand ?></option>
                                <?php
                                    $qry = $conn->query("SELECT * FROM brand order by name asc");
                                    
                                    while($row=$qry->fetch_assoc()):
                                        $cname[$row['id']] = ucwords($row['name']);
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php endwhile; ?>
                        </select>
				    </div>
                    <div class="form-group">
                        <label class="control-label">Size</label>
                        <input type="number" name="size" id="quantity" cols="30" rows="4" class="form-control" value="<?php echo $size ?>" />
				    </div>
                    <div class="form-group">
                        <div class="d-flex flex-row  align-items-left my-4">
                            <label for="role" class="mr-3">Gender:</label>
                            <div class="form-check mr-3 mb-0">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <label class="form-check-label" for="staff">
                                        Male
                                    </label>
                            </div>
                            <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="manager">
                                        Female
                                    </label>
                            </div>
                        </div>
				    </div>
				    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control" ><?php echo $description ?></textarea>
				    </div>
				    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" cols="30" rows="4" class="form-control" value="<?php echo $quantity ?>" />
				    </div>
				    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $price ?>">
				    </div>
				    <div class="form-group">
                        <label class="control-label">Picture: </label>
                        <div>                     
                            <input type="hidden" name="existing_image" value="<?php echo $picture; ?>">
                            <input type="file" name="image" id="images" accept=".jpg, .jpeg, .png" value="<?php echo $picture ?>" />
                                <a id="imagePreviewLink" href="#" data-lightbox="image-preview" data-title="Image Preview" style="display:none;">
                                <div class="container-fluid justify-content-center">
                                    <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 150px; margin-top: 10px;">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
						<div class="row">
							<div class="col-md-12 text-center">
								<button class="btn btn-primary" type="submit" name="submit">Update</button>
								<button class="btn btn-default" type="button" onclick="$('#manage-product').get(0).reset()">Reset</button>
							</div>
						</div>
				    </div>
                </form>
            </div>
        </div>
<script src="../assets/lightbox2/dist/js/lightbox.min.js"></script>
<script>
    var category = "<?php echo $category; ?>";
    console.log("Category: " + category);

    // Check the corresponding radio button based on the value of category
    if (category == "male") {
        document.getElementById("male").checked = true;
    } else if (category == "female") {
        document.getElementById("female").checked = true;
    } else {
        console.log("Invalid category value: " + category);
    }
    $(document).ready(function () {
        var existingImagePath = '<?php echo $existing_image_path; ?>';
        if (existingImagePath !== '') {
            $('#imagePreview').attr('src', existingImagePath);
            $('#imagePreviewLink').attr('href', existingImagePath).show();
        }
    });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result);
                    $('#imagePreviewLink').attr('href', e.target.result).show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#images").change(function () {
            readURL(this);
        });
    </script>
<?php
include 'footer.php';
?>