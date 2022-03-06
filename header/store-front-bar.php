<?php

$store_id = get_check("store_id");
$store_id = sanitizeString($store_id);
$image = return_info($conn,'stores','image','id',$store_id);
$name = return_info($conn,'stores','name','id',$store_id);
?>
<body>
  <nav class='navbar sticky-top navbar-light bg-light'>
    <div class='container-fluid'>

      <a class='navbar-brand' href='#'><img src='https://kingwebsites.co.za/store-images/$image' class='img-fluid rounded' style='width: 30px;'><p class='bold'><?php echo "$site_name"; ?></p></a>
      <a href='https://kingwebsites.co.za/main/checkout-page.php'><button type='button' class='btn btn-outline-success'> Checkout
      </button></a>
  </div>
</nav>