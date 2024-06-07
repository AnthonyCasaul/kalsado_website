<?php
include 'header.php';
?>
<div class="container-fluid justify-content-center">
    <div class="container-lg">             
            <div class="card shadow mb-4" style="border-radius: 15px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label   label class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
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
                        <input type="number" class="form-control text-right" name="price" required>
				    </div>
				    <div class="form-group">
                        <label class="control-label">Picture</label>
                        <input type="file" name="image" id="images" accept=".jpg, .jpeg, .png" value="" required/>
                        <a id="imagePreviewLink" href="#" data-lightbox="image-preview" data-title="Image Preview" style="display:none;">
                            <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; max-height: 150px; margin-top: 10px;">
                        </a>
                    </div>
				    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="status" name="status" checked value="1" required>
                            <label class="custom-control-label" for="status">Available</label>
                        </div>
				    </div>
                </div>
            </div>
        </div>
