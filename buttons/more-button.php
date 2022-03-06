<button type="button" class="btn btn-outline-dark btn-sm m-10" data-bs-toggle="modal" data-bs-target="#exampleModal3">
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
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>