<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

if (isset($_POST['go_online'])) {

	$email = $_SESSION['email'];
	$store_id = return_info($conn,'stores',"id",'email',$email);

	$status = post_check("go_online");
	$status = sanitizeString($status);


	update_info($conn,$dbname,'stores','status','id',$status,$store_id);

	echo("<p><i class='fas fa-check'></i> Store online</p>");
}

if (isset($_POST['go_offline'])) {

	$email = $_SESSION['email'];

	$store_id = return_info($conn,'stores',"id",'email',$email);

	$status = post_check("go_offline");
	$status = sanitizeString($status);

	update_info($conn,$dbname,'stores','status','id',$status,$store_id);

	echo("<p><i class='fas fa-check'></i> Store offline</p>");
}
