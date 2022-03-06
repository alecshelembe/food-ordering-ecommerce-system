<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

if (isset($_COOKIE['Invoice'])) {
	$invoice = $_COOKIE['Invoice'];
} else {
	$location ="https://kingwebsites.co.za/";
	go_to($location);
}

$location = "https://kingwebsites.co.za/main/order-page.php?invoice=$invoice";
go_to($location);

$amount = "$total";

include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php"); ?>