<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

$email = $_SESSION['email'];

$id = post_check("id");
$id = sanitizeString($id);
$name = post_check("name");
$name = sanitizeString($name);
$price = post_check("price");
$price = sanitizeString($price);
$description = post_check("description");
$description = sanitizeString($description);
$group = post_check("group");
$group = sanitizeString($group);

$store_id = null;
$store_id = return_info($conn,'products',"store_id",'id',$id);


////////////////

if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {

	$original_file_name = $_FILES['image']['name'];
	$file_type = $_FILES['image']['type'];
	$image = sanitizeString($original_file_name);
	$file_type = sanitizeString($file_type);
	$file_size = $_FILES['image']['size']; 	
	$file_tem_loc = $_FILES['image']['tmp_name'];

	$rand = rand(1000,9999);
	$image = "$rand-$store_id";

	$dir = $_SERVER['DOCUMENT_ROOT'] . "/product-images";

	$old_image = return_info($conn,'products','image','id',$id);

	if ($old_image !== 'defualt.png') {

		if (unlink($dir.'/'.$old_image)) {
			alert("$old_image has been deleted");
		}
		else {
			alert("$old_image cannot be deleted due to an error");
		}
		
	}
	$image = image_process($conn,$dir,$image,$file_type,$file_size,$file_tem_loc);
	update_info($conn,$dbname,'products','image','id',$image,$id);
}


if(file_exists($_FILES['image_2']['tmp_name']) || is_uploaded_file($_FILES['image_2']['tmp_name'])) {

	$original_file_name = $_FILES['image_2']['name'];
	$file_type = $_FILES['image_2']['type'];
	$image_2 = sanitizeString($original_file_name);
	$file_type = sanitizeString($file_type);
	$file_size = $_FILES['image_2']['size']; 	
	$file_tem_loc = $_FILES['image_2']['tmp_name'];

	$rand = rand(1000,9999);
	$image_2 = "$rand-$store_id";

	$dir = $_SERVER['DOCUMENT_ROOT'] . "/product-images";

	$old_image_2 = return_info($conn,'products','image_2','id',$id);

	if ($old_image_2 !== 'defualt.png') {

		if (unlink($dir.'/'.$old_image_2)) {
			alert("$old_image_2 has been deleted");
		}
		else {
			alert("$old_image_2 cannot be deleted due to an error");
		}
		
	}

	$image_2 = image_process_2($conn,$dir,$image_2,$file_type,$file_size,$file_tem_loc);
	update_info($conn,$dbname,'products','image_2','id',$image_2,$id);
}
///////////////

if ($group !== '') {
	
	update_info($conn,$dbname,'products','group','id',$group,$id);
}

if ($name !== '') {
	
	update_info($conn,$dbname,'products','name','id',$name,$id);
}

if ($price !== '') {
	
	update_info($conn,$dbname,'products','price','id',$price,$id);
}

if ($description !== '') {
	
	update_info($conn,$dbname,'products','description','id',$description,$id);
}

alert('saved');
$location = "https://kingwebsites.co.za/main/store-page.php";
go_to($location);
////////////////