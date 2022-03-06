<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/header/header-page.php"); 
include_once($_SERVER['DOCUMENT_ROOT'] . "/header/bar.php");

$id = post_check("id");
$id = sanitizeString($id);

$name = return_info($conn,'products',"name",'id',$id);
$price = return_info($conn,'products',"price",'id',$id);
$description = return_info($conn,'products',"description",'id',$id);
$group = return_info($conn,'products',"group",'id',$id);
$image = return_info($conn,'products',"image",'id',$id);
$image_2 = return_info($conn,'products',"image_2",'id',$id);

echo "
		<table>
		<tr>
		<td>Product image</td><td><img src='https://kingwebsites.co.za/product-images/$image' class='rounded mx-auto d-block' alt='image'></td>
		</tr>
		<tr>
		<td>Name</td><td>$name</td>
		</tr>
		<tr>
		<td>price</td><td>R $price</td>
		</tr>
		<tr>
		<td>Description</td><td>$description</td>
		</tr>
		<tr>
		<td>group</td><td>$group</td>
		</tr>
		</table>";

?>
<center>
	<!-- <div class="grey-fade-edges center border-radius pointer eighty"> -->
		<form name="photo" id="imageUploadForm" enctype="multipart/form-data" action="https://kingwebsites.co.za/ajax-results/change-product.php" method="post">
			<table>
					<input type="text" name="id" value='<?php echo("$id") ?>' hidden>
				<tr>
					<td colspan="2"><h2>Change product below</h2></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value='<?php echo("$name") ?>'></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="text" name="price" value='<?php echo("$price"); ?>'></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><input type="text" name="description" value='<?php echo("$description"); ?>'></td>
				</tr>
				<tr>
					<td>Group</td>
					<td><input type="text" name="group" value='<?php echo("$group"); ?>'></td>
				</tr>
				<tr>
					<!-- <td>Upload an image</td> -->
					<td><?php echo("<img src='https://kingwebsites.co.za/product-images/$image' class='rounded mx-auto d-block' alt='image'>"); ?></td>
					<td><input type="file" style="width: 150px" name="image"></td>
				</tr>
				<tr>
					<!-- <td>Image 2</td> -->
					<td><?php echo("<img src='https://kingwebsites.co.za/product-images/$image_2' class='rounded mx-auto d-block' alt='image'>"); ?></td>
					<td><input type="file" style="width: 150px" name="image_2"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="upload" value="Make changes"></td>
				</tr>
			</table>
		</form>
	</center>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/footer/footer-page.php"); 