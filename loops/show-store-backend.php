<?php 

// loops folder
$email = $_SESSION['email'];

$store_id = return_info($conn,'stores',"id",'email',$email);
$storename = return_info($conn,'stores',"name",'email',$email);

$query = "SELECT * FROM `stores` WHERE `id` = '$store_id' ORDER BY `rank` ASC limit 20;";

// echo "$query";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
if ($row == 0) {
	echo "Nothing here...";
} else {
	
	while ($row = mysqli_fetch_assoc($result)) {

		$name = $row['name'];
		$email = $row['email'];
		$description = $row['description'];
		$number = $row['number'];
		$street = $row['street'];
		$street_2 = $row['street_2'];
		$city = $row['city'];
		$state = $row['state'];
		$zip = $row['zip'];
		$open_hours = $row['open_hours'];
		$country = $row['country'];
		$delivery = $row['delivery'];
		$payment_method = $row['payment_method'];
    $image = $row['image'];
		$map = $row['map'];
		$id = $row['id'];
	}
		echo " 
		    <div class='top-space'></div>
		   

         <!-- Button trigger modal -->
        <button type='button' class='d-grid gap-2 col-6 mx-auto btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#store_info'>
          My Store
        </button>

        <!-- Modal -->
        <div class='modal fade' id='store_info' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'> My store </h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body'>

 	 <div class='store_table'>
            <img src='https://kingwebsites.co.za/store-images/$image' alt='image' class='img-fluid rounded mx-auto d-block'>
            
          <div class='d-flex w-100 d-flex_new justify-content-between'>
          <small class='text-muted'>Name</small>
            
          </div>
          <p class='mb-1 mb-1_new'>$name</p>

          <div class='d-flex w-100 d-flex_new justify-content-between'>
          <small class='text-muted'>Email</small>
            
          </div>
          <p class='mb-1 mb-1_new'>$email</p>

          <div class='d-flex w-100 d-flex_new justify-content-between'>
          <small class='text-muted'>Number</small>
            
          </div>
          <p class='mb-1 mb-1_new'>$number</p>

          <div class='d-flex w-100 d-flex_new justify-content-between'>
          <small class='text-muted'>Description</small>
            
          </div>
          <p class='mb-1 mb-1_new'>$description</p>

          <div class='d-flex w-100 d-flex_new justify-content-between'>
          <small class='text-muted'>Open hours</small>
            
          </div>
          <p class='mb-1 mb-1_new'>$open_hours</p>

          <div class='d-flex w-100 d-flex_new justify-content-between'>
          <small class='text-muted'>Address</small>
            
          </div>
          <p class='mb-1 mb-1_new'>$country $state $city $street</p>

          <div class='d-flex w-100 d-flex_new justify-content-between'>
          <small class='text-muted'>2nd address</small>
            
          </div>
          <p class='mb-1 mb-1_new'>$street_2</p>

          <div class='d-flex w-100 d-flex_new justify-content-between'>
          <small class='text-muted'>Delivery</small>
            
          </div>
          <p class='mb-1 mb-1_new'>$delivery</p>

          <div class='d-flex w-100 d-flex_new justify-content-between'>
          <small class='text-muted'>Payment method</small>
            
          </div>
          <p class='mb-1 mb-1_new'>$payment_method</p>

		   
      </div>

              </div>
              <div class='modal-footer'>
               
              </div>
            </div>
          </div>
         </div>

  		";
		echo "
		    <div class='top-space'></div>

		      <!-- Button trigger modal -->
				<button type='button' class='d-grid gap-2 col-6 mx-auto btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#Storename'>
				  Edit Store
				</button>

				<!-- Modal -->
				<div class='modal fade' id='Storename' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				  <div class='modal-dialog'>
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <h5 class='modal-title' id='exampleModalLabel'> Edit Store </h5>
				        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
				      </div>
				      <div class='modal-body'>

<div class='list-group'> 
  
	<form enctype='multipart/form-data' action='https://kingwebsites.co.za/load-page.php' method='post'>

<div class='list-group'>
  
    
      <p class='mb-1'>Name</p>
      
    
    <small class='text-muted'>$name</small>
    <p class='mb-1'><input type='text' name='name' class='form-control'></p>
  <br>
 
      <p class='mb-1'>Description</p>
      
    
    <small class='text-muted'>$description</small>
    <p class='mb-1'><input type='text' name='description' class='form-control'></p>
  <br>

  
      <p class='mb-1'>Number</p>
      
    
    <small class='text-muted'>$number</small>
    <p class='mb-1'><input type='text' name='number' class='form-control'></p>
  <br>

  
      <p class='mb-1'>street</p>
      
    
    <small class='text-muted'>$street</small>
    <p class='mb-1'><input type='text' name='street' class='form-control'></p>

      <p class='mb-1'>street_2</p>
      
    
    <small class='text-muted'>$street_2</small>
    <p class='mb-1'><input type='text' name='street_2' class='form-control'></p>
  <br>

      <p class='mb-1'>City</p>
      
    
    <small class='text-muted'>$city</small>
    <p class='mb-1'><input type='text' name='city' class='form-control'></p>
  <br>

  
      <p class='mb-1'>State</p>
      
    
    <small class='text-muted'>$state</small>
    <p class='mb-1'><input type='text' name='state' class='form-control'></p>
  <br>

  
      <p class='mb-1'>Zip</p>
      
    
    <small class='text-muted'>$zip</small>
    <p class='mb-1'><input type='text' name='zip' class='form-control'></p>
  <br>

  
      <p class='mb-1'>Open hours</p>
      
    
    <small class='text-muted'>$open_hours</small>
    <p class='mb-1'><input type='text' name='open_hours' class='form-control'></p>
  <br>

  
      <p class='mb-1'>Country</p>
      
    
    <small class='text-muted'>$country</small>
    <p class='mb-1'><input type='text' name='country' class='form-control'></p>
  <br>

  
      <p class='mb-1'>Delivery</p>
      
    
    <small class='text-muted'>$delivery</small>
    <p class='mb-1'><input type='text' name='delivery' class='form-control'></p>
  <br>

  
      <p class='mb-1'>Payment method</p>
      
    
    <small class='text-muted'>$payment_method</small>
    <p class='mb-1'><input type='text' name='payment_method' class='form-control'></p>
  <br>
  

      <p class='mb-1'>Logo</p>
      
    
    <small class='text-muted'><img class='smallimg' src='https://kingwebsites.co.za/store-images/$image' class='rounded mx-auto d-block' alt='image'></small>
    <p class='mb-1'><input type='file' class='form-control' name='image' accept='image/*'></p>
    <br>

    <p class='mb-1'>Map Api</p>
      
    
    <small class='text-muted'>$map</small>
    <p class='mb-1'><input type='text' name='map' class='form-control'></p>
  <br>
  
</div>

</div>

				      </div>
				      <div class='modal-footer'>
				        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
				        <button type='submit' class='btn btn-primary' name='change_store_info'>Save changes</button>
				      </div>
				    </div>
				  </div>
				 </div>
</form>
				";
	
}