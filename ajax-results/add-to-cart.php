<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");

$id = post_check("spec");
$id = sanitizeString($id);

$_SESSION["p $id"] = 1; 

echo "<button type='button' class='btn btn-success btn-sm'>In cart <i class='fas fa-check'></i></button>";

