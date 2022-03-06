<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

$total = $_SESSION["Total"];

$email = post_check("email");
$email = sanitizeString($email);
$name = post_check("name");
$name = sanitizeString($name);
$number = post_check("number");
$number = sanitizeString($number);
$store_id = post_check("store_id");
$store_id = sanitizeString($store_id);
$address = post_check("address");
$address = sanitizeString($address);
$address_2 = post_check("address_2");
$address_2 = sanitizeString($address_2);
$cash = post_check("cash");
$cash = sanitizeString($cash);

if ($cash == 'cash') {
	$payment_type='Cash';
} else {
	$payment_type='NOT PAID';
}


$list_code = array();
$items = array();
foreach($_SESSION as $key => $value) {

	if ($key == 'email' || $key == 'id' || $key == 'store_id' || $key == 'status' || $key == 'Total' || $key == 'email' || $key == 'name' || $key == 'invoice' || $key == 'number' || $key == 'store_id') {
		continue;
	}

	 $list_code[] = $key.' '.$value;

	$key = str_replace(' ','',"$key");
	$key = substr("$key", 1); 

	$pname = return_info($conn,'products','name','id',$key);
	$price = return_info($conn,'products','price','id',$key);
// 	$group = return_info($conn,'products','group','id',$key);
// 	$description = return_info($conn,'products','description','id',$key);
//  $image = return_info($conn,'products','image','id',$key);
// 	$image_2 = return_info($conn,'products','image_2','id',$key);

	 $items[] = $value.' '.$pname.' R '.$price;

}

$list_code = implode(": ",$list_code);
$items = implode(": ",$items);

$id = rand(10000,99999);

$_SESSION['invoice'] = $id;
$invoice = $id;

$ip = get_ip();

check_if_exists($conn,$dbname,'orders','id',$id);

insert_info($conn,$dbname,'orders','id',$id);

update_info($conn,$dbname,'orders','payment_status','id',"$payment_type",$id);
update_info($conn,$dbname,'orders','email','id',$email,$id);
update_info($conn,$dbname,'orders','name','id',$name,$id);
update_info($conn,$dbname,'orders','ip','id',$ip,$id);
update_info($conn,$dbname,'orders','number','id',$number,$id);
update_info($conn,$dbname,'orders','list_code','id',$list_code,$id);
update_info($conn,$dbname,'orders','list','id',$items,$id);
update_info($conn,$dbname,'orders','total','id',$total,$id);
update_info($conn,$dbname,'orders','address','id',$address,$id);
update_info($conn,$dbname,'orders','address_2','id',$address_2,$id);

$items = str_replace(": ","<br>","$items");

send_email('delivery@kingwebsites.co.za',"$email","$name",'Confirmation',"Hello $name, We're notifying you that your #$invoice has been recieved
	<br>$items. 
	<br>Payment: $payment_type 
	<br>Total: R $total 
	<br><br><a href='https://kingwebsites.co.za/main/order-page.php?invoice=$invoice'>Your Invoice</a>");

send_to_store_email('delivery@kingwebsites.co.za',"admin@kingwebsites.co.za","$name",'Confirmation',"New Order 
	<br><br>Name: $name 
	<br> Payment: $payment_type 
	<br> Number: $number 
	<br> Total: R $total 
	<br> Address 1: $address
	<br> Address 2: $address_2 
	<br> $items 
	<br> PLEASE respond to customer  
	<br><br><a href='https://kingwebsites.co.za/main/order-page.php?invoice=$invoice'> Invoice</a>");

$location = "https://kingwebsites.co.za/main/order-page.php?invoice=$invoice";
	go_to($location);

