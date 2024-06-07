<?php
include 'header.php';
include '../db_connect.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, ucwords($_POST['name']));

    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../assets/uploaded_icon/'.$image;

    $select = mysqli_query($conn, "SELECT * FROM `brand` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      echo "<script>
                alert('Brand Already Exists!!');
            </script>"; 
   }else{
         $insert = mysqli_query($conn, "INSERT INTO `brand`(name, icon_image) VALUES('$name', '$image')") or die('query failed');
         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            echo "<script>
                    alert('Brand is Added Successfully!');
                  </script>"; 
        }
    }
}

?>
<div class="container-fluid justify-content-center">
    <div class="container-sm">             
            <div class="card shadow mb-4" style="border-radius: 15px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                </div>
                <form action="" id="manage-brand" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label   label class="control-label">Brand Name</label>
                        <input type="text" class="form-control" name="name" required>
				    </div>
                    <div class="form-group">
                        <label class="control-label">Brand Icon: </label>
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
								<button class="btn btn-default" type="button" onclick="backBtn()">Back</button>
							</div>
						</div>
				    </div>
                </form>
            </div>
        </div>
<script>      
</script>
<?php
include 'footer.php';
?>