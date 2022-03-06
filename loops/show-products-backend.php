<?php 

// loops folder
$email = $_SESSION['email'];

$store_id = $_SESSION['store_id'];

$query = "SELECT * FROM `products` WHERE `products`.`store_id` = '$store_id' ORDER BY `date` DESC;";

// echo "$query";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
if ($row == 0) {
	echo "Nothing here...";
} else {
	echo "
<div class='top-space'></div>

	<h3>Products</h3><span class='grey'>* green means product is for sale</span>
		<div style='overflow-x: scroll;'>
		<table class='table'>
		  <thead>
		    <tr>
		      <th scope='col'>#</th>
		      <th scope='col'>Name</th>
		    
		      <th scope='col'>Image</th>
		      <th scope='col'>More</th>
		    </tr>
		  </thead>
		  <tbody>
	";
	$i = 1;
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

		echo "
		    <tr>
 	<th scope='row'>$i</th>
 	<td>$name<br>* $status</td>

 	<td><img class='smallimg' src='https://kingwebsites.co.za/product-images/$image' class='rounded mx-auto d-block' alt='image'></td>
 	<td><!-- Button trigger modal -->

 		<button type='button' class='btn btn-primary m-10 btn-sm' data-bs-toggle='modal' data-bs-target='#product$i'>
 			View
 		</button>

 		<!-- Button trigger modal -->
 		<button type='button' class='btn btn-primary m-10 btn-sm' data-bs-toggle='modal' data-bs-target='#change$i'>
 			Change
 		</button>

 		<a onclick='copy($id)'><button type='button' class='btn btn-success btn-sm m-10'> Share</button></a>
								
		<input type='text' value='https://kingwebsites.co.za/index2.php?product=$id' id='$id' style='position:absolute;left:-1000px;top:-1000px;'>

		<form action='https://kingwebsites.co.za/load-page.php' method='post'>
			<button type='submit' class='btn btn-danger m-10 btn-sm' value='$id' name='take_down'>
 				Take down
 			</button>

 			<button type='submit' class='btn btn-success m-10 btn-sm' value='$id' name='bring_up'>
 				Make available 
 			</button>
		</form>

 	</td>



 	<!-- Modal -->
 	<div class='modal fade' id='change$i' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
 		<div class='modal-dialog'>
 			<div class='modal-content'>
 				<div class='modal-header'>
 					<h5 class='modal-title' id='exampleModalLabel'>Product $i</h5>
 					<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
 				</div>
 				<div class='modal-body'>
 					<form enctype='multipart/form-data' action='https://kingwebsites.co.za/ajax-results/change-product.php' method='post'>
 						<input type='text' name='id' value='$id' hidden>


 						<div class='list-group'>


 							<p class='mb-1'>Name</p>


 							<small class='text-muted'>$name</small>
 							<p class='mb-1'><input type='text' name='name' class='form-control'></p>
 							<br>


 							<p class='mb-1'>Price</p>


 							<small class='text-muted'>$price</small>
 							<p class='mb-1'><input type='text' name='price' class='form-control'></p>
 							<br>


 							<p class='mb-1'>Description</p>


 							<small class='text-muted'>$description</small>
 							<p class='mb-1'><input type='text' name='description' class='form-control'></p>
 							<br>


 							<p class='mb-1'>Group</p>


 							<small class='text-muted'>$group</small>
 							<p class='mb-1'><input type='text' name='group' class='form-control'></p>
 							<br>



 							<p class='mb-1'>Image</p>


 							<small class='text-muted'><img src='https://kingwebsites.co.za/product-images/$image' class='smallimg rounded mx-auto d-block' alt='image'></small>
 							<p class='mb-1'><input type='file' class='form-control' name='image' accept='image/*'></p>


 							<p class='mb-1'>Image 2</p>


 							<small class='text-muted'><img src='https://kingwebsites.co.za/product-images/$image_2' class='smallimg rounded mx-auto d-block' alt='image'></small>
 							<p class='mb-1'><input type='file' class='form-control' name='image_2' accept='image/*'></p>


 						</div>

 					</div>
 					<div class='modal-footer'>
 						<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
 						<button type='submit' class='btn btn-primary'>Save changes</button>
 					</div>
 				</div>
 			</div>
 		</div>
 	</form>

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

 				</div>
 			</div>
 		</div>
 	</div>
 </tr>";
		$i++;
	}
		echo "</tbody>
		</table>
	</div>";
}
