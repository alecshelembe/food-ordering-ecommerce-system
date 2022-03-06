<footer>

	<center>
		<!-- <img src='https://kingwebsites.co.za/Standard-Pack/payfast.png' class='img-fluid' style='box-shadow:none;' alt='Payfast South africa image'>
			<img src='https://kingwebsites.co.za/Standard-Pack/website_logo_transparent_background_site_icon.png' class='smallimg' style='box-shadow:none;' alt='Payfast South africa image'> -->
		</center>

		<script type="text/javascript">
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
		var elements = document.getElementsByClassName('rounded-pill'); // get all elements
		for(var i = 0; i < elements.length; i++){
			if (elements[i].innerText == 'online'){
				elements[i].style.color = "green";
			} else{
				elements[i].style.color = "red";

			}
		}

		function copy($var) {
			var copyText = document.getElementById($var);
			copyText.select();
			document.execCommand("copy"); //this function copies the text of the input with ID "copyInp"
			alert("Copied to clip board");
			copyText.blur();
		}

		$(document).ready(function(){
			$('a[href^="https://"]').each(function(){ 
            var oldUrl = $(this).attr("href"); // Get current url

            var domain = "https://kingwebsites.co.za"; 

            var newUrl = oldUrl.replace("https://kingwebsites.co.za", domain); // Create new url
            $(this).attr("href", newUrl); // Set herf value
        });
		});

		
		$("input[type='number']").inputSpinner()
		$(".buttons-only").inputSpinner({buttonsOnly: true, autoInterval: undefined })
	</script>
	
	<!-- <div class="top-space"></div>
		<p class="grey">© By kingproteas</p> -->

</footer>
</body>
</html>