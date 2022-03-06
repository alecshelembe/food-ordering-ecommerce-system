<?php 
// loops folder

	$query = "SELECT * FROM `$table` WHERE `status` = '$status' and `id` = '$id';";
	
	// echo"$query"; 
	// stop();

	$result = mysqli_query($varconn, $query);

	$row = mysqli_num_rows($result);
	if ($row == 0) {
		echo "Sorry.. Nothing here";
	} else {


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

		}

		echo "


	<div class='collapse show collapse-vertical' id='product$i'>
		
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
				<br>
				<br>
				<a href='https://kingwebsites.co.za/main/checkout-page.php'><button type='button' class='btn btn-outline-success btn-sm'><i class='fas fa-shopping-cart'></i> Checkout
				</button></a>
				<a onclick='copy($id)'><button type='button' class='btn btn-success btn-sm'> Share</button></a>
				$cart_result
				<input type='text' value='https://kingwebsites.co.za/index2.php?product=$id' id='$id' style='position:absolute;left:-1000px;top:-1000px;'>
			</div>
		</center>
	</div>
		";
	}
	?>
	<!-- <button class='btn btn-primary btn-sm' type='button' data-bs-toggle='collapse' data-bs-target='#product$i' aria-expanded='true' aria-controls='product$i'>View </button> -->