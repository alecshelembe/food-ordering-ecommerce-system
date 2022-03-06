<?php 

include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");


// loops folder

$store_id = '41460';

$_SESSION["store_id"] = $store_id;

$home_link = "https://kingwebsites.co.za/main/store-front.php?store_id=$store_id";


$image = return_info($conn,'stores','image','id',$store_id);
$name = return_info($conn,'stores','name','id',$store_id);

echo "<body>
  <nav class='navbar sticky-top navbar-light bg-light'>
    <div class='container-fluid'>

      <a class='navbar-brand' href='$home_link'><img src='https://kingwebsites.co.za/store-images/$image' class='img-fluid rounded' style='width: 40px;'> &nbsp; <span class='fs-5 fw-bold'> $name</span></a>
      <a href='https://kingwebsites.co.za/main/checkout-page.php?store_id=$store_id'><button type='button' class='btn btn-success btn-sm'><i class='fas fa-shopping-cart'></i> Checkout
      </button></a>
  </div>
</nav>
<a href='https://wa.me/+27727237808?text=hello are you open today' id='whatsapp_chat'><img src='https://kingwebsites.co.za/Standard-Pack/WhatsApp-icon-PNG.png' id='whatsapp_chat_photo'></a>";

if(isset($_COOKIE['Email']) && isset($_COOKIE['Key'])) {
  
  $email = $_COOKIE['Email'];
  $key = $_COOKIE['Key']; 
  
  include_once($_SERVER['DOCUMENT_ROOT'] . "/buttons/more-button.php");
}
  include_once($_SERVER['DOCUMENT_ROOT'] . "/buttons/review-button.php");

if(isset($_COOKIE['Invoice'])) {
  
  $invoice = $_COOKIE['Invoice'];
  
  echo "<a href='https://kingwebsites.co.za/main/order-page.php?invoice=$invoice&store_id=$store_id'><button type='button' class='btn btn-danger btn-sm m-10'> Last invoice
    </button></a>";

}

$query = "SELECT * FROM `stores` WHERE `stores`.`id` = '$store_id';";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
if ($row == 0) {
	echo "Nothing here...";
} else {
	
	echo "<div class='container'>";

	$i = 1;
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
		
		$i++;
	
	}

}
$status = return_info($conn,'stores','status','id',$store_id);
if ($status == 'Open') {
  $class_color ='green';
} else {
  $class_color ='red';

}


	echo " 
			<div class='top-space'></div>
      <div class='block'>
		    
         <!-- Button trigger modal -->

           <img src='https://kingwebsites.co.za/store-images/$image' alt='image' class='img-fluid rounded mx-auto d-block' data-bs-toggle='modal' data-bs-target='#store_info_front'><br >         
      </div>

          <table>
            <tr>
              <td><h2 class='$class_color'>NOW - $status</h2></td>
            </tr>
            <tr>
              <td class='$class_color large'>Please order during open times</td>
            </tr>
            <tr>
              <th>Open hours</th>
            </tr>
            <tr>
              <td><p class='large'>$open_hours</p></td>
            </tr>
            <tr>
              <th>Delivery</th>
            </tr>
            <tr>
              <td class='large'>$delivery</td>
            </tr>
          </table>



          <center>
           <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#store_info_front' >About</button>

           <button class='btn btn-outline-dark' type='button' data-bs-toggle='collapse' data-bs-target='#collapseWidthExample' aria-expanded='false' aria-controls='collapseWidthExample'>
            <i class='fas fa-map-marker-alt'></i> Address
           </button>
          </center>
          <br>
      
        <!-- Modal -->
        <div class='modal fade' id='store_info_front' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'> $name </h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body'>
   <center>
 	 <div class='scale store_table'>
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
   </center>

              </div>
              <div class='modal-footer'>
               
              </div>
            </div>
          </div>
         </div>

         
			<div class='block'>
            
          <div class='collapse collapse-horizontal' id='collapseWidthExample'>
            <div class='card card-body'>
              $map
            </div>
          </div>

      </div>";


include_once($_SERVER['DOCUMENT_ROOT'] . "/loops/get_groups.php");

include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php");

echo "</div>";
?>
