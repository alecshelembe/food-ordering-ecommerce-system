<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-bar.php"); ?>
<div class='top-space'></div>
<div class='container'>
	<center>
		<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/buttons/online-button.php"); ?>
		<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/buttons/offline-button.php"); ?>
	</center>
		<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/loops/show-store-backend.php"); ?>
		<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/forms/add-product-form.php"); ?>
	<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/loops/show-products-backend.php"); ?>
</div>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php"); ?>