<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

$store_id = '41460';
$dir = "https://kingwebsites.co.za/store-images/";
$home_link = "https://kingwebsites.co.za/main/store-front.php?store_id=$store_id";


$image = return_info($conn,'stores','image','id',$store_id);
$name = return_info($conn,'stores','name','id',$store_id);
      
    include($_SERVER['DOCUMENT_ROOT'] . "/loops/check_total.php");
      

?>

<body>
	<nav class='navbar sticky-top navbar-light bg-light'>
		<div class='container-fluid'>
		<a class='navbar-brand' href='<?php echo($home_link); ?>'><img src='<?php echo "$dir".$image;?>' class='img-fluid rounded' style='width: 40px;'> &nbsp; <span class='fs-5 fw-bold'> <?php echo "$name";?></span></a>
		<button class='btn btn-success m-10'><span id="buy_button"><?php echo "R ".$_SESSION["Total"];?></span></button>
		</div>
	</nav>

<div class="d-grid gap-2 stuck-bottom">
	<button class='btn btn-success m-10' data-bs-toggle="modal" data-bs-target="#staticBackdrop">Place Order</button>
</div>

	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Notice</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">

	      	<script type='text/javascript'>
				$(document).ready(function(){
				  $('#card_pay').click(function(){
				  	var email = $('#email').val();
				  	var name = $('#name').val();
				  	var number = $('#number').val();
				  	var store_id = $('#store_id').val();
				  	var address = $('#address').val();
				  	var address_2 = $('#address_2').val();
				  
				    $.ajax({
				    	data:{email:email,number:number,name:name,store_id:store_id,address:address,address_2:address_2},         
				    	method: 'post',
				    	url: 'https://kingwebsites.co.za/ajax-results/process-order.php', 
				    	success: function(result){
				      $('#info-result').html(result);
				      // $('#$ran').css('display','none');
				      
				    }});
				  });
				});

				$(document).ready(function(){
				  $('#cash').click(function(){
				  	var email = $('#email').val();
				  	var name = $('#name').val();
				  	var number = $('#number').val();
				  	var store_id = $('#store_id').val();
				  	var address = $('#address').val();
				  	var address_2 = $('#address_2').val();
				  	var cash = $('#cash').val();
				  
				    $.ajax({
				    	data:{email:email,number:number,name:name,store_id:store_id,address:address,address_2:address_2,cash:cash},         
				    	method: 'post',
				    	url: 'https://kingwebsites.co.za/ajax-results/process-order.php', 
				    	success: function(result){
				      $('#info-result').html(result);
				      // $('#$ran').css('display','none');
				      
				    }});
				  });
				});
			</script>

			<div id='info-result'></div>

			</script>

	        <label for="Name" class="form-label">Email</label>
      		<input type="text" name="email" id="email" class="form-control" autocomplete="on" required>

      		<label for="Email" class="form-label">Name</label>
      		<input type="text" name="name" id="name" class="form-control" autocomplete="on" required>

      		<label for="Number" class="form-label">Number</label>
      		<input type="text" name="number" id="number" class="form-control" autocomplete="on" required>

      		<div class="col-12">
      			<label for="inputAddress" class="form-label">Street</label>
      			<input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" autocomplete="on">
      		</div>
      		<div class="col-12">
      			<label for="inputAddress2" class="form-label">Street 2</label>
      			<input type="text" class="form-control" name="address_2" id="address_2" placeholder="Apartment, studio, or floor" autocomplete="on">
      		</div>
      		<div class="col-md-4">
      			<label for="inputState" class="form-label">State</label>
      			<select id="inputState" class="form-select">
      				<option selected>Walkerville</option>
      			</select>
      		</div>

      		<input type="text" name="store_id" id="store_id" value='<?php echo"$store_id"; ?>' class="form-control" hidden>     		

      		<input type="checkbox" name="" required> 
      		<label for="agree" class="form-label m-10"><a href="#">I agree to terms and conditions</a></label>
      		<br>


      		  <p class="btn btn-success btn-sm" for="btnradio1"> <i class="fas fa-envelope"></i> The invoice will be sent to your email inbox</p>

			  <p class="btn btn-success btn-sm" for="btnradio1"> <i class="fab fa-whatsapp"></i> We may whatsapp you</p>

			  <p class="btn btn-success btn-sm" for="btnradio3"> <i class="fas fa-phone"></i> We may call you</p>

	      </div>
	      <div class="modal-footer">
	      	<!-- data-bs-dismiss="modal" -->
	      
	        <button type="button" class="btn btn-success" id="card_pay" onClick="this.disabled=true; this.value='Sending…';"> <i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-visa"></i> Pay Now</button>
	        <button type="button" id="cash" value='cash' class="btn btn-success" onClick="this.disabled=true; this.value='Sending…';"><i class="fa fa-money"></i> Pay with cash</button>
	      </div>
	    </div>
	  </div>
	</div>


	<table class='table container table-borderless'>
		<tbody>
			<tr>

				<td scope='col' colspan='2'>Invoice <div id='share_invoice_result'></div></td>
			</tr>
<?php 

		  $i = 1;
foreach ($_SESSION as $key => $value) {
	
	if ($key == 'email' || $key == 'id' || $key == 'store_id' || $key == 'status' || $key == 'Total' || $key == 'email' || $key == 'name' || $key == 'number' || $key == 'invoice' || $key == 'store_id') {
		continue;
	}

	$key = str_replace(' ','',"$key");
	$key = substr("$key", 1); 
	 
		$name = return_info($conn,'products','name','id',$key);
		$price = return_info($conn,'products','price','id',$key);
		$group = return_info($conn,'products','group','id',$key);
		$description = return_info($conn,'products','description','id',$key);
		$image = return_info($conn,'products','image','id',$key);
		$image_2 = return_info($conn,'products','image_2','id',$key);

		include($_SERVER['DOCUMENT_ROOT'] . "/loops/quantity-check.php");
				

		echo "<tr>
				<td><img src='https://kingwebsites.co.za/product-images/$image' class='smallimg_xs rounded mx-auto d-block' alt='image'></td>
					<td> $name 

					$quantity_check
					
					<form action='https://kingwebsites.co.za/load-page.php' method='post' class='m-10'>
						<button type='submit' name='remove_from_cart' class='btn btn-outline-danger btn-sm' value='$key'>Remove</button>
					<button type='button' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#product$i'>
						View
					</button>
					</form>
					</td>
					<td>


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
									<input type='text' value='https://kingwebsites.co.za/index2.php?product=$key' id='$key' style='position:absolute;left:-1000px;top:-1000px;'>

									<a onclick='copy($key)'><button type='button' class='btn btn-success btn-sm'> Share</button></a>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>";
			$i++;
		
}
	
?>
	</tbody>
		</table>
			

<script type="text/javascript">
		setInterval(function(){
			$('#buy_button').load(' #buy_button');
		}, 1000);

	</script>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php");?>
