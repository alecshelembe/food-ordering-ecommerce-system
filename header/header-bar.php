<?php 
$home_link = "https://kingwebsites.co.za/main/store-front.php?store_id=41460";?>

<!-- As a link -->
<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">

      <a class="navbar-brand" href="<?php echo("$home_link"); ?>"><img src="https://kingwebsites.co.za/Standard-Pack/small_kingproteas_logo.png" class="navbar-brand"style="width: 30px;"><p class='bold'></p></a>
      <!-- ///////////////////////////////// -->
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal3">
        Settings
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <ul>
               <?php
               if(isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $status = $_SESSION['status'];
                include($_SERVER['DOCUMENT_ROOT'] . "/buttons/sign-out-button.php");
                if ($status == 'store') {
                  include($_SERVER['DOCUMENT_ROOT'] . "/buttons/my-store-button.php");
                }

              } else {
                include($_SERVER['DOCUMENT_ROOT'] . "/buttons/sign-in-button.php");
              } 


              ?>
            </ul>
          </div>
          <div class="modal-footer">
            <a href="https://kingwebsites.co.za/main/store-front.php?store_id=41460"><button type="button" class="btn btn-primary"> Store Site </button></a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ///////////////////////////////// -->
  </div>
</nav>