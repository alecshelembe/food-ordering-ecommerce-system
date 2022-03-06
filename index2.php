<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php"); 
$store_id = '41460';

$_SESSION["store_id"] = $store_id;

$home_link = "https://kingwebsites.co.za/main/store-front.php?store_id=$store_id";

$image = return_info($conn,'stores','image','id',$store_id);
$name = return_info($conn,'stores','name','id',$store_id);

echo "<body>
  <nav class='navbar sticky-top navbar-light bg-light'>
    <div class='container-fluid'>

      <a class='navbar-brand' href='$home_link'><img src='https://kingwebsites.co.za/store-images/$image' class='img-fluid rounded' style='width: 40px;'> &nbsp; <span class='fs-5 fw-bold'> $name</span></a>
      <a href='https://kingwebsites.co.za/main/checkout-page.php?store_id=$store_id'><button type='button' class='btn btn-success btn-sm'><i class='fas fa-shopping-cart'></i> Checkout
      </button></a>
  </div>
</nav>";?>
<center>
  <div class="top-space"></div>
  <div class="container">
    <?php 
      if (isset($_GET['product'])) {
        $id = get_check('product');
        $id = sanitizeString($id);
        show_one_product($conn,$dbname,'products','green',$id);
        echo "<div>";
        include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php");
        stop();
        }
    ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/loops/show-store.php");?>
  </div>
</center>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php");