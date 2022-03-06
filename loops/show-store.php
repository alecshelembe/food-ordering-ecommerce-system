<?php 

// loops folder

$query = "SELECT * FROM `stores` WHERE `stores`.`active` = 'yes' ORDER BY `rank` ASC limit 20;";

// echo "$query";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
if ($row == 0) {
	echo "Nothing here...";
} else {

	echo "
		<table class='table table-borderless'>
		  <tbody>";
	
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
		$status = $row['status'];
		$id = $row['id'];
		
		$i++;

		echo "
		    <tr class='store_table'>
		     <td>
		      		<img src='https://kingwebsites.co.za/store-images/$image' class='smallimg rounded' alt='image'>
		     </td>
		     <td>
			    <div class='d-flex w-100 d-flex_new justify-content-between'>
	          		<small class='rounded-pill'>$status</small>
	          		<form action='https://kingwebsites.co.za/main/store-front.php' method='get'>
							<button type='submit' class='btn btn-secondary'>View</button>
							<input type='text' value='$id' name='store_id' hidden>
	          		</form>
	          	</div>
         		
         		<small class='text-muted'>Name</small>
         		<p class='mb-1 mb-1_new'>$name</p>

         		<small class='text-muted'>Address</small>
         		<p class='mb-1 mb-1_new'>$state $city $street</p>
          	</td>

		   </tr>
		   <tr><td></td></tr>";

	}
		echo "</tbody>
				</table>";

}