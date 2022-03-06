<?php 
$query = "SELECT * FROM `products` WHERE `products`.`store_id` = '$store_id' and `products`.`status` = 'green' ORDER BY `rank` DESC;";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);
if ($row == 0) {
	echo "Nothing here...";
} else {

		echo "<h3>Menu</h3>";

		echo"<script type='text/javascript'>
			$(document).ready(function(){
				$('#all_products').click(function(){
					var catagory = $('#all_products').val();
					var store_id = $('#store_id').val();
					
					$.ajax({
						data:{store_id:store_id,catagory:catagory},          
						method: 'get',
						url: 'https://kingwebsites.co.za/ajax-results/groups.php',
						// dataType:'JSON', 
						success: function(result){
							$('#cart-result').html(result);
							// $('#login-form').css('display','none');
						}});
				});
			});
		</script>


		<button type='submit' class='btn btn-outline-dark m-10 btn-lg'  value='All' id='all_products' name='catagory' data-bs-toggle='modal' data-bs-target='#menu_popup'>All</button>
		<input type='text' name='store_id' id='store_id' value='$store_id' hidden>";

	$i = 1;
	$catagory = array();

	while ($row = mysqli_fetch_assoc($result)) {

		$group = $row['group'];

		$i++;

		array_push($catagory,"$group");
	}


	$catagory = array_unique($catagory);

		$i = 1;
		$x = 2;

	foreach ($catagory as $key => $value) {
		echo "	<script type='text/javascript'>
			$(document).ready(function(){
				$('#$i').click(function(){
					var catagory = $('#$i').val();
					var store_id = $('#$x').val();
					
					$.ajax({
						data:{store_id:store_id,catagory:catagory},          
						method: 'get',
						url: 'https://kingwebsites.co.za/ajax-results/groups.php',
						// dataType:'JSON', 
						success: function(result){
							$('#cart-result').html(result);
							// $('#login-form').css('display','none');
						}});
				});
			});
		</script>


		<button type='submit' class='btn btn-outline-dark m-10 btn-lg' value='$value' id='$i' name='catagory' data-bs-toggle='modal' data-bs-target='#menu_popup'>$value</button>
		<input type='text' name='store_id' id='$x' value='$store_id' hidden>";
		$i++;
		$i++;

		$x++;
		$x++;

	}
	echo "<div class='top-space'></div>

	<div class='modal fade' id='menu_popup' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-fullscreen'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Kota Joe</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
      	<div id='cart-result'>";
        	include_once($_SERVER['DOCUMENT_ROOT'] . '/loops/show-products.php');
        echo "</div>
      </div>
    </div>
  </div>
</div>";
	
}

?>
