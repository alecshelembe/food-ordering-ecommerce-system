<div class="top-space"></div>	

<div class="d-grid gap-2 col-6 mx-auto">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproduct">
	Add New product
</button>

</div>

<!-- Modal -->
<div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Product below</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!--   ///////////// -->
				
					<form enctype="multipart/form-data" action="https://kingwebsites.co.za/ajax-results/add-product.php" method="post">
						<div class="mb-3">Name<input type="text" class="form-control" name="name"></div> 
						<div class="mb-3">Price<input type="text" class="form-control" name="price"></div> 
						<div class="mb-3">Description<input type="text" class="form-control" name="description"></div>
						<div class="mb-3">Group<input type="text" class="form-control" name="group"></div> 
						<div class="mb-3">Upload an image<input type="file" class="form-control" name="image" accept='image/*'></div> 
						<div class="mb-3">Image 2<input type="file" class="form-control" name="image_2" accept='image/*'></div> 
						<input type="submit" name="upload" class="btn btn-secondary" id="s" value="Upload">
					</form>
				<div class="top-space"></div>
				<!-- ///////////// -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
