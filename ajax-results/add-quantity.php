<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");


$id = post_check("id");
$id = sanitizeString($id);
$quantity = post_check("quantity");
$quantity = sanitizeString($quantity);
$_SESSION["p $id"] = $quantity;
$price = return_info($conn,'products','price','id',$id);
$answer = number_format($quantity * $price);

include($_SERVER['DOCUMENT_ROOT'] . "/loops/check_total.php");

echo(" R $answer ");


?>