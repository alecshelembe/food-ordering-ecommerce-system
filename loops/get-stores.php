<?php 
// loops folder
$query = "SELECT * FROM `stores` WHERE `active` = 'yes' ORDER BY `rank` ASC limit 20;";

	// echo "$query";
	// stop();

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
if ($row == 0) {

	echo"<center><div class='grey-fade-edges center border-radius pointer eighty'><p>Sorry.. Nothing here</p></div></center>";
	stop();

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
		$country = $row['country'];
		$delivery = $row['delivery'];
		$open_hours = $row['open_hours'];
		$payment_method = $row['payment_method'];
		$image = $row['image'];
		// $description = $row['description'];

		echo "<table border='1'class='grey-fade-edges center border-radius pointer'>
		<tr>
			<td>$name
			</td>
		</tr>
		<tr>
			<td>$city $street
			</td>
		</tr>
		<tr>
			<td>$open_hours
			</td>
		</tr>
		</table>";
	}
}