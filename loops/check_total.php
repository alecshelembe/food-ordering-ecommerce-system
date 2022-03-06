<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

$total = 0;
$t_answer = 0;

foreach ($_SESSION as $key=>$val){
		// echo "$key + $val<br>";
		
	if ($key == 'email' || $key == 'id' || $key == 'store_id' || $key == 'status' || $key == 'Total' || $key == 'email' || $key == 'name' || $key == 'number' || $key == 'invoice') {
		continue;
	}

		$key = str_replace(' ','',"$key");
		$key = substr("$key", 1);
		$t_price = return_info($conn,'products','price','id',$key);
		$t_quantity = $val;
		$t_answer = $t_quantity * $t_price;
		$total += $t_answer;

}

$total = $_SESSION["Total"] = number_format($total,2);
