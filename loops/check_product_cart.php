<?php 

if (isset($_SESSION["p $id"])){
	$cart_result = "<button type='button' class='btn btn-success btn-sm m-10' name='spec'>In cart <i class='fas fa-check'></i></button>";
} else{

$cart_result="<script type='text/javascript'>
	$(document).ready(function(){
		$('#$spec').click(function(){
			var spec = $('#$spec').val();
			
			$.ajax({
				data:{spec:spec},          
				method: 'post',
				url: 'https://kingwebsites.co.za/ajax-results/add-to-cart.php',
				
				success: function(result){
					$('#$spec2').html(result);
					$('#$spec2').css('display','inline');
					$('#$spec').css('display','none');
				}});
		});
	});
</script>

<button type='submit' class='btn btn-outline-dark btn-sm m-10' name='spec' value='$id' id='$spec'>Add to cart</button>
<div id='$spec2'></div>";

}
?>