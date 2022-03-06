<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php");

if (isset($_POST['create_store'])) {
	$id = $_SESSION['id'];

	// $id = return_info($conn,'users','id','id',$email);

	$email = post_check("email");
	$email = sanitizeString($email);
	$name = post_check("name");
	$name = sanitizeString($name);
	$description = post_check("description");
	$description = sanitizeString($description);
	$open_hours = post_check("open_hours");
	$open_hours = sanitizeString($open_hours);
	$number = post_check("number");
	$number = sanitizeString($number);
	$street = post_check("street");
	$street = sanitizeString($street);
	$street_2 = post_check("street_2");
	$street_2 = sanitizeString($street_2);
	$city = post_check("city");
	$city = sanitizeString($city);
	$state = post_check("state");
	$state = sanitizeString($state);
	$zip = post_check("zip");
	$zip = sanitizeString($zip);
	$country = post_check("country");
	$country = sanitizeString($country);
	$delivery = post_check("delivery");
	$delivery = sanitizeString($delivery);
	$payment_method = post_check("payment_method");
	$payment_method = sanitizeString($payment_method);

	// $active = "";
	$store_id = rand(10000,99999);

	check_if_exists($conn,$dbname,'stores','email',$email);
	check_if_exists($conn,$dbname,'stores','id',$store_id);

	////////////////

	$original_file_name = $_FILES['image']['name'];
	$file_type = $_FILES['image']['type'];
	$image = sanitizeString($original_file_name);
	$file_type = sanitizeString($file_type);
	$file_size = $_FILES['image']['size']; 	
	$file_tem_loc = $_FILES['image']['tmp_name'];

	$rand = rand(1000,9999);
	$image = "$rand $store_id";

	$dir = "store-images";

	$image = image_process($conn,$dir,$image,$file_type,$file_size,$file_tem_loc);
	

	////////////////

	$verification_code = rand(1000,9999);
	insert_info($conn,$dbname,'stores','id',$store_id);

	update_info($conn,$dbname,'stores','image','id',$image,$store_id);

	update_info($conn,$dbname,'stores','name','id',$name,$store_id);
	update_info($conn,$dbname,'stores','open_hours','id',$open_hours,$store_id);
	update_info($conn,$dbname,'stores','email','id',$email,$store_id);
	update_info($conn,$dbname,'stores','description','id',$description,$store_id);
	update_info($conn,$dbname,'stores','number','id',$number,$store_id);
	update_info($conn,$dbname,'stores','street','id',$street,$store_id);
	update_info($conn,$dbname,'stores','street_2','id',$street_2,$store_id);
	update_info($conn,$dbname,'stores','city','id',$city,$store_id);
	update_info($conn,$dbname,'stores','state','id',$state,$store_id);
	update_info($conn,$dbname,'stores','zip','id',$zip,$store_id);
	update_info($conn,$dbname,'stores','country','id',$country,$store_id);
	update_info($conn,$dbname,'stores','delivery','id',$delivery,$store_id);
	update_info($conn,$dbname,'stores','payment_method','id',$payment_method,$store_id);

	alert('Store account created successfully');

	///////////////////////////////////////////////////////////////

	// send_email('noreply@kingwebsites.co.za',"$email","$name",'Kingproteas store registration',"Thank you for registering to Kingproteas. Click here to verify your account. Your verification code is $verification_code <a href='https://kingwebsites.co.za/verification-page.php'>Verify me</a>");

	///////////////////////////////////////////////////////////////
	$location = "https://kingwebsites.co.za/main/store-page.php";
	go_to($location);
}

if (isset($_POST['change_store_info'])) {

	// $id = return_info($conn,'users','id','id',$email);

	$email = $_SESSION['email'];

	$store_id = return_info($conn,'stores',"id",'email',$email);

	$name = post_check("name");
	$name = sanitizeString($name);
	$number = post_check("number");
	$number = sanitizeString($number);
	// $email = post_check("email");
	// $email = sanitizeString($email);
	$description = post_check("description");
	$description = sanitizeString($description);
	$street = post_check("street");
	$street = sanitizeString($street);
	$street_2 = post_check("street_2");
	$street_2 = sanitizeString($street_2);
	$city = post_check("city");
	$city = sanitizeString($city);
	$state = post_check("state");
	$state = sanitizeString($state);
	$zip = post_check("zip");
	$zip = sanitizeString($zip);
	$open_hours = post_check("open_hours");
	$open_hours = sanitizeString($open_hours);
	$country = post_check("country");
	$country = sanitizeString($country);
	$delivery = post_check("delivery");
	$delivery = sanitizeString($delivery);
	$payment_method = post_check("payment_method");
	$payment_method = sanitizeString($payment_method);
	$map = post_check("map");
	$map = sanitizeString($map);

	// $value = sanitizeString($value);


	if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {

		$original_file_name = $_FILES['image']['name'];
		$file_type = $_FILES['image']['type'];
		$image = sanitizeString($original_file_name);
		$file_type = sanitizeString($file_type);
		$file_size = $_FILES['image']['size']; 	
		$file_tem_loc = $_FILES['image']['tmp_name'];

		$rand = rand(1000,9999);
		$image = "$rand-$store_id";

		$dir = $_SERVER['DOCUMENT_ROOT'] . "/store-images";

		$old_image = return_info($conn,'stores','image','id',$store_id);

		if (unlink($dir.'/'.$old_image)) {
			alert("$old_image has been deleted");
		}
		else {
			alert("$old_image cannot be deleted due to an error");
		}
		$image = image_process($conn,$dir,$image,$file_type,$file_size,$file_tem_loc);
		update_info($conn,$dbname,'stores','image','id',$image,$store_id);
	}



	if ($name !=='') {update_info($conn,$dbname,'stores','name','id',$name,$store_id);}
	if ($open_hours !=='') {update_info($conn,$dbname,'stores','open_hours','id',$open_hours,$store_id);}
	if ($description !=='') {update_info($conn,$dbname,'stores','description','id',$description,$store_id);}
	if ($number !=='') {update_info($conn,$dbname,'stores','number','id',$number,$store_id);}
	if ($street !=='') {update_info($conn,$dbname,'stores','street','id',$street,$store_id);}
	if ($street_2 !=='') {update_info($conn,$dbname,'stores','street_2','id',$street_2,$store_id);}
	if ($city !=='') {update_info($conn,$dbname,'stores','city','id',$city,$store_id);}
	if ($state !=='') {update_info($conn,$dbname,'stores','state','id',$state,$store_id);}
	if ($zip !=='') {update_info($conn,$dbname,'stores','zip','id',$zip,$store_id);}
	if ($country !=='') {update_info($conn,$dbname,'stores','country','id',$country,$store_id);}
	if ($delivery !=='') {update_info($conn,$dbname,'stores','delivery','id',$delivery,$store_id);}
	if ($payment_method !=='') {update_info($conn,$dbname,'stores','payment_method','id',$payment_method,$store_id);}
	if ($map !=='') {update_info($conn,$dbname,'stores','map','id',$map,$store_id);}

	alert('Saved');

	$location = "https://kingwebsites.co.za/main/store-page.php";
	go_to($location);
}

if (isset($_POST['sign_out'])) {

	logout();

	$location = "https://kingwebsites.co.za/main/store-front.php?store_id=41460";
	go_to($location);
}

if (isset($_POST['remove_from_cart'])) {
	$id = post_check("remove_from_cart");
	$id = sanitizeString($id);
	unset($_SESSION["p $id"]);
	redirect_back();
}

if (isset($_POST['take_down'])) {
	$id = post_check("take_down");
	$id = sanitizeString($id);
	update_info($conn,$dbname,'products','status','id','Not Available',$id);
	redirect_back();
}


if (isset($_POST['bring_up'])) {
	
	$id = post_check("bring_up");
	$id = sanitizeString($id);
	update_info($conn,$dbname,'products','status','id','green',$id);
	redirect_back();
}

if (isset($_POST['review'])) {

	$_SESSION['store_id'] = $store_id;

	$message = post_check("message");
	$message = sanitizeString($message);
	$stars = post_check("stars");
	$stars = sanitizeString($stars);
	$name = post_check("name");
	$name = sanitizeString($name);

	$id = rand(10000,99999);
	
	$ip = get_ip();

	check_if_exists($conn,$dbname,'reviews','id',$id);

	insert_info($conn,$dbname,'reviews','id',$id);

	update_info($conn,$dbname,'reviews','name','id',$name,$id);
	update_info($conn,$dbname,'reviews','message','id',$message,$id);
	update_info($conn,$dbname,'reviews','stars','id',$stars,$id);
	update_info($conn,$dbname,'reviews','ip','id',$ip,$id);

	$location = "https://kingwebsites.co.za/main/store-front.php?store_id=$store_id";
	go_to($location);

}


// if (isset($_POST['go_offline'])) {

// 	logout();

// 	$location = "https://kingwebsites.co.za/";
// 	go_to($location);
// }