<button type="button" class="btn btn-outline-dark btn-sm m-10" data-bs-toggle="modal" data-bs-target="#reviews"> <i class="fa fa-pencil"></i> Reviews
<i class="fa fa-star"></i></button>

<!-- Modal -->
<div class="modal fade" id="reviews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Help us improve</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <?php
          $query = "SELECT * FROM `reviews` WHERE `reviews`.`status` = 'green' ORDER BY `rank` DESC;";


          $result = mysqli_query($conn, $query);

          $row = mysqli_num_rows($result);
          if ($row == 0) {
            echo "No reviews yet";
          } else {

              while ($row = mysqli_fetch_assoc($result)) {

                $name = $row['name'];
                $message = $row['message'];
                $stars = $row['stars'];
                $date = $row['date'];
               
                echo "
                    <div class='store_table'>
                    <div class='d-flex w-100 d-flex_new justify-content-between'>
                    <small>$name</small>
                    <small>$stars <i class='fa fa-star'></i> </small>
                      
                    </div>
                    <p class='mb-1 mb-1_new'>$message</p>
                    </div>";

              }

          }

        ?>
    </div>
      <form action="https://kingwebsites.co.za/load-page.php" class="container" method="post">
        <label>Name</label>
        <input type="text" class="form-control m-10" name="name" placeholder="Alex Smith">
        <label> <i class="fa fa-pencil"></i> Message</label>
        <input type="text" class="form-control m-10" name="message" placeholder="How was the our service?">
        <label><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i> 5 is Great!</label>
        <div style='width: 150px;' class='m-10'>
          <input type='number' class='btn btn-outline-secondary btn-sm' name='stars' onchange='document.getElementById($rand2).click();' value='3' min='1' max='5' step='1'>
        </div>
        <input type="submit" class='btn btn-lg btn-primary m-10' style="float: right;" value="Submit" name="review">
        
      </form>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>