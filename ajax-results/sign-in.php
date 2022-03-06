<?php
session_start();
$email = $_POST['email'];
$key = $_POST['password'];
setcookie('Email',"$email",time()+31556926 ,'/');// where 31556926 is total seconds for a year.
setcookie('Key',"$key",time()+31556926 ,'/');// where 31556926 is total seconds for a year.
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

if (isset($_POST['signIn'])) {
	$email = post_check_same_page("email");
	$email = sanitizeString($email);
	$password = post_check_same_page("password");
	$password = sanitizeString($password);
	pair_for_login($conn,'users',"email",$email,"password",$password);
	// update_info($conn,'','logs_in','ipaddress','id',$ipaddress,$logs_id);
	// $location = "https://kingwebsites.co.za/shopping-cart-page.php";
	// go_to($location);

}