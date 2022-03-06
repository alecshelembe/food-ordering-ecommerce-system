<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

$store_id =''.$_SESSION["store_id"];


foreach($_SESSION as $key => $value) {

	if ($key == 'email' || $key == 'id' || $key == 'store_id' || $key == 'status' || $key == 'Total' || $key == 'email' || $key == 'name' || $key == 'invoice' || $key == 'number' || $key == 'store_id') {
		continue;
	}

	 $list_code[] = $key.$value;

}

$list_code = implode('',$list_code);

echo "<input type='text' value='https://kingwebsites.co.za/main/checkout-page.php?list_code=$list_code&store_id=$store_id' id='list_button' style='position:absolute;left:-1000px;top:-1000px;'>";?>


