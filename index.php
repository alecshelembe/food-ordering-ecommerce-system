<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-bar.php"); ?>
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