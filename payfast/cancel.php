<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

if (isset($_COOKIE['Invoice'])) {
		$invoice = $_COOKIE['Invoice'];
	} else {
		$location ="https://kingwebsites.co.za/";
		go_to($location);
	}

	$total = return_info($conn,'orders','total','id',"$invoice");
	$name = return_info($conn,'orders','name','id',"$invoice");
	$payment_status = return_info($conn,'orders','payment_status','id',"$invoice");

	if ($payment_status == 'PAID') {

		alert("<p>This invoice has already been Paid</p>");
		$location = "https://kingwebsites.co.za/main/order-page.php?invoice=$invoice";
		go_to($location);

	} else{
		update_info($conn,$dbname,'orders','payment_status','id','Cancelled',$invoice);
		alert("<p>Hello $name, your order #$invoice has been cancelled</p>");
		$location = "https://kingwebsites.co.za/main/order-page.php?invoice=$invoice";
		go_to($location);
	}
	
	$amount = "$total";

	// remove($conn,$dbname,'orders','id',$invoice);

	// send_email('delivery@kingwebsites.co.za',"$email","$name",'Confirmation',"Hello $name, We're notifying you that your #$invoice payment was cancelled. <br><br><a href='https://kingwebsites.co.za/main/order-page.php?invoice=$invoice'>Your Invoice</a>");

	// unset($_COOKIE['invoice']);


include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php"); ?>