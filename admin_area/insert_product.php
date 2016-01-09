<!DOCTYPE html>
<?php
include("includes/db.php");
?>
<html>
<head>
	<title>Inserting Product</title>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="skyblue">

<form action="insert_product.php" method="post" enctype="multipart/form-data">
	  <table align="center" width="1000" border="1" bgcolor="orange">
	  		
	  		<tr>
	  			<td colspan="8"><h2>Insert New Post Here</h2></td>
	  		
	  		</tr>
	  		<tr>
	  			<td>Product title:</td>
	  			<td><input type="text" name="product_title" size="60" required/></td>
	  		</tr>
	  		<tr>
	  			<td>Product Category:</td>
	  			<td>
	  				<select name="product_cat" required>
	  					<option>Select a Category</option>
	  					<?php

							$get_cats="SELECT * FROM categoriest";
							$run_cats=mysqli_query($con,$get_cats);

							while ($row_cats=mysqli_fetch_array($run_cats)) {
								# code...
								$cat_id = $row_cats['cat_id'];
								$cat_title = $row_cats['cat_title'];


								echo "<option value='$cat_id'> $cat_title </option>";
							}
						
	  					?>

	  				</select>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td>Product Brand:</td>
	  			<td>
	  				<select name="product_brand" required>
	  					<option>Select a Brand</option>
	  					<?php

							$get_brands="SELECT * FROM brands";
							$run_brands=mysqli_query($con,$get_brands);

							while ($row_brands=mysqli_fetch_array($run_brands)) {
								# code...
								$brand_id = $row_brands['brand_id'];
								$brand_title = $row_brands['brand_title'];


								echo "<option value='$brand_id'> $brand_title </option>";
							}
						
	  					?>

	  				</select>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td>Product Image:</td>
	  			<td><input type="file" name="product_image" required></input></td>
	  		</tr>
	  		<tr>
	  			<td>Product Price:</td>
	  			<td><input type="text" name="product_price" required></input></td>
	  		</tr>
	  		<tr>
	  			<td>Product Description:</td>
	  			<td><textarea name="product_desc" cols="25" rows="10"></textarea></td>
	  		</tr>
	  		<tr>
	  			<td>Product Keywords:</td>
	  			<td><input type="text" name="product_keywords" size="60" required></input></td>
	  		</tr>
	  		<tr align="right">
	  			
	  			<td colspan="8"><input type="submit" name="insert_post" value="Insert Now"></input></td>
	  		</tr>
	  </table>		
</form>
</body>
</html>

<?php
		 if(isset($_POST['insert_post'])){

		 	//gettign the text data from the fields
		 	$product_title = $_POST['product_title'];
		 	$product_cat   = $_POST['product_cat'];

		 	$product_brand = $_POST['product_brand'];
		 	$product_price = $_POST['product_price'];
		 	$product_desc  = $_POST['product_desc'];
		 	$product_keywords = $_POST['product_keywords'];

		 	//getting the image from the field
		 	$product_image = $_FILES['product_image']['name'];
		 	$product_image_tmp = $_FILES['product_image']['tmp_name'];

		 	move_uploaded_file($product_image_tmp, "product_images/$product_image");

		 	$insert_product = "insert into products
		 	(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) 
		 	value('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";


		 	$insert_pro = mysqli_query($con, 	$insert_product);
		 	if($insert_pro){

		 		echo "<script> alert('Product has been inserted') </script>";
		 		echo "<script> window.open('insert_product.php','_self') </script>";
		 	}	
		 }
?>