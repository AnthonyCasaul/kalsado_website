<?php
include 'header.php';
include '../db_connect.php';

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

    $select = mysqli_query($conn, "SELECT * FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      echo "<script>
                alert('Product Already Exists!!');
            </script>"; 
   }else{
         $insert = mysqli_query($conn, "INSERT INTO `products`(name, price, category, brand, quantity_stock, description, size, product_image) VALUES('$name', '$price', '$gender', '$brand', '$quantity', '$description', '$size', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            echo "<script>
                    alert('Product is Added Successfully!');
                  </script>"; 
        }
    }
}

?>
<div class="container-fluid justify-content-center">
    <div class="container-lg">             
            <div class="card shadow mb-4" style="border-radius: 15px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                </div>
                <form action="" id="manage-product" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label   label class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
				    </div>
                    <div class="form-group">
                        <label class="control-label">brand</label>
                        <select name="brand" id="category_id" class="custom-select select2" required>
                            <option value=""></option>
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
                        <input type="number" name="size" id="quantity" cols="30" rows="4" class="form-control" required></input>
				    </div>
                    <div class="form-group">
                        <div class="d-flex flex-row  align-items-left my-4">
                            <label for="role" class="mr-3">Gender:</label>
                            <div class="form-check mr-3 mb-0">
                                    <input class="form-check-input" type="radio" name="gender" id="staff" value="male">
                                    <label class="form-check-label" for="staff">
                                        Male
                                    </label>
                            </div>
                            <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="gender" id="manager" value="female">
                                    <label class="form-check-label" for="manager">
                                        Female
                                    </label>
                            </div>
                        </div>
				    </div>
				    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control" required></textarea>
				    </div>
				    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" cols="30" rows="4" class="form-control" required></input>
				    </div>
				    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input type="number" class="form-control" name="price" required>
				    </div>
				    <div class="form-group">
                        <label class="control-label">Picture: </label>
                        <div>
                            <input type="file" name="image" id="images" accept=".jpg, .jpeg, .png" value="" required/>
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
								<button class="btn btn-primary" type="submit" name="submit">Save</button>
								<button class="btn btn-default" type="button" onclick="$('#manage-product').get(0).reset()">Reset</button>
							</div>
						</div>
				    </div>
                </form>
            </div>
        </div>
<script src="../assets/lightbox2/dist/js/lightbox.min.js"></script>
<script>
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