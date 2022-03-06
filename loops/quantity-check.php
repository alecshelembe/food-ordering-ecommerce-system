<?php 

if (isset($_SESSION["p $key"])){

	$quantity = $_SESSION["p $key"];
	$answer = number_format($quantity * $price);
	$ran = $key.rand(60,69);
	$rand = $key.rand(70,79);
	$rand2 = $key.rand(80,89);
	$quantity_check = "

<script type='text/javascript'>
	$(document).ready(function(){
		$('#$ran').submit(function(e){
			
				$.ajax({
					type:'POST',
					url:'https://kingwebsites.co.za/ajax-results/add-quantity.php',
					data: $('#$ran').serialize(),
					success: function(data){
						$('#$rand').css('display','inline');
						$('#$rand').html(data);
					}
					})

				e.preventDefault();
			})
		})
</script>

		<br><span id='$rand'> R $answer </span>
</td>
<td>
	<form action='https://kingwebsites.co.za/load-page.php' id='$ran' method='post'>
		<input type='text' name='id' value='$key' hidden>
		<div style='width: 150px;' class='m-10'>
			<input type='number' class='btn btn-outline-secondary btn-sm' name='quantity' onchange='document.getElementById($rand2).click();' value='$quantity' min='1' max='10' step='1'>
		</div>
		<input type='submit' id='$rand2' hidden>

	</form>


</script>";
}?>


