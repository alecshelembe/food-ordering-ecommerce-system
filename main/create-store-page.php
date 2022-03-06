<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-bar.php"); 
if(($_SESSION['status']) == 'store') {
	$id = $_SESSION['id'];
	$email = $_SESSION['email'];
	$store_id = null;
	$store_id = return_info($conn,'stores','id','email',$email);
		// alert("$store_id");
	if (isset($store_id)) {
		$location = "https://kingwebsites.co.za/main/store-page.php";
		go_to($location);
	}

} else {
	$location = "https://kingwebsites.co.za/main/sign-in-page.php";
	go_to($location);
} 
?>
<div class="top-space"></div>
<div class="container">

	<h3>Create your store below</h3>
	<form action="https://kingwebsites.co.za/load-page.php" method="post" enctype='multipart/form-data'>
		<div class="mb-3">Store name <input type="text" name="name" class="form-control"></div>
		<div class="mb-3">Email <input type="text" class="form-control" name="email"></div>
		<div class="mb-3">Description <input type="text" class="form-control" name="description"></div>
		<div class="mb-3">Open hours <input type="text" class="form-control" name="open_hours"></div>
		<div class="mb-3">Contact number <input type="text" class="form-control" name="number"></div>
		<div class="mb-3">Street<input type="text" id="autocomplete" class="form-control" name="street"></div>
		<div class="mb-3">Street<input type="text" id="autocomplete" class="form-control" name="street_2"></div>
		<div class="mb-3">City<input type="text" id="inputCity" class="form-control" name="city"></div>
		<div class="mb-3">State<input type="text" id="inputState" class="form-control" name="state"></div>
		<div class="mb-3">Zip<input type="text" id="inputZip" class="form-control" name="zip"></div>
		<div class="mb-3">County<input type="text" id="inputCounty" class="form-control" name="country"></div>
		<div class="mb-3"><label for="delivery">Delivery?</label>
			<select class="form-control" name="delivery" id="email_list">
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select></div>
			<div class="mb-3"><label for="Payment method">Payment method?</label>
				<select class="form-control" name="payment_method" id="email_list">
					<option value="Cash">Cash</option>
					<option value="Cash and Card">Cash and card</option>
				</select></div>
				<div class="mb-3">Store Image<input type='file' class="form-control" name='image' accept='image/*'></div>

				<button type="submit" name="create_store" value="create_store" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php"); ?>