<?php 

// loops folder

if(isset($_GET['catagory'])) {

	$catagory = get_check('catagory');
	$catagory = sanitizeString($catagory);
	$store_id = get_check('store_id');
	$store_id = sanitizeString($store_id);
	echo "<p> >> $catagory</p>";

	$query = "SELECT * FROM `products` WHERE `products`.`store_id` = '$store_id' and `products`.`status` = 'green' and `products`.`group` = '$catagory';";

	if ($catagory == 'All') {
			$query = "SELECT * FROM `products` WHERE `products`.`store_id` = '$store_id' and `products`.`status` = 'green' ORDER BY `rank` DESC;";
		}

} else {
    
	$query = "SELECT * FROM `products` WHERE `products`.`store_id` = '$store_id' and `products`.`status` = 'green' ORDER BY `rank` DESC;";
}

// echo "$query";
// stop();

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
if ($row == 0) {
	echo "Nothing here...";
} else {

	echo "
		<table class='table table-borderless'>
		 <tbody>
		    <tr>
		    
		    </tr>";
	
	$i = 1;
	$catagory = array();
	
	while ($row = mysqli_fetch_assoc($result)) {

		$name = $row['name'];
		$price = $row['price'];
		$description = $row['description'];
		$group = $row['group'];
		$rank = $row['rank'];
		$image = $row['image'];
		$image_2 = $row['image_2'];
		$date = $row['date'];
		$store_id = $row['store_id'];
		$status = $row['status'];
		$id = $row['id'];

		$i++;

		$spec = $id.rand(1,9);
		$spec2 = $id.rand(10,19);
		// $spec3 = $id.rand(20,29);

		include($_SERVER['DOCUMENT_ROOT'] . "/loops/check_product_cart.php");		

		echo "<tr>
				<td><img src='https://kingwebsites.co.za/product-images/$image' class='smallimg rounded mx-auto d-block' alt='image'></td>
				<td><h4 class='m-10'>$name</h4>
					<h5 class='m-10'>R $price </h5>
					<p class='m-10'>$description</p>

					<!--<button type='button' class='btn btn-dark btn-sm m-10' data-bs-toggle='modal' data-bs-target='#product$i'>
						View
					</button>-->

					$cart_result					

					<!-- Modal -->
					<div class='modal fade' id='product$i' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h5 class='modal-title' id='exampleModalLabel'>Product $i</h5>
									<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
								</div>
								<div class='modal-body'>
									<div class='list-group'>
										<center>
											<div class='scale store_table'>

												<div class='d-flex w-100 d-flex_new justify-content-between'>

													<small class='text-muted'>Name</small>

												</div>
												<p class='mb-1 mb-1_new'>$name</p>

												<div class='d-flex w-100 d-flex_new justify-content-between'>
													<small class='text-muted'>Price</small>

												</div>
												<p class='mb-1 mb-1_new'>$price</p>

												<div class='d-flex w-100 d-flex_new justify-content-between'>
													<small class='text-muted'>Description</small>

												</div>
												<p class='mb-1 mb-1_new'>$description</p>

												<div class='d-flex w-100 d-flex_new justify-content-between'>
													<small class='text-muted'>Group</small>

												</div>
												<p class='mb-1 mb-1_new'>$group</p>



												<div id='carouselExampleControls$i' class='carousel slide carousel-fade' data-bs-ride='carousel'>
													<div class='carousel-inner'>
														<div class='carousel-item active'>
															<img src='https://kingwebsites.co.za/product-images/$image' class='rounded mx-auto d-block' alt='image'>
														</div>
														<div class='carousel-item'>
															<img src='https://kingwebsites.co.za/product-images/$image_2' class='rounded mx-auto d-block' alt='image'>
														</div>

													</div>
													<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls$i' data-bs-slide='prev'>

														<span class='grey'>P</span>
													</button>
													<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls$i' data-bs-slide='next'>

														<span class='grey'>N</span>
													</button>
												</div>
											</div>
										</center>
									</div>
								</div>
								<div class='modal-footer'>
								
								<input type='text' value='https://kingwebsites.co.za/index2.php?product=$id' id='$id' style='position:absolute;left:-1000px;top:-1000px;'>

								<a onclick='copy($id)'><button type='button' class='btn btn-success btn-sm'> Share</button></a>
								
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>";
			}
		
		echo "</tbody>
			</table>";
}

