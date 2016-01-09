<!DOCTYPE html>
<?php
	include("functions/functions.php");
?>
<html>
<head>
	<title>Online Shop</title>

	<link rel="stylesheet" type="text/css" href="style/style.css" media="all">
</head>
<body>
	<!--Main container start-->
	<div class="main_wrapper">
		<!--Header start-->
		 <div class="header_wrapper">
		 	<img id="logo" src="images/eShoplogo.png">
		 	<img id="banner" src="images/banner.png">

			
		 </div>
		 <!--Header end-->
		 <!--Menu start-->
		 <div class="menubar">
		 	<ul id="menu">
		 		<li><a href="#">Home</a></li>
		 		<li><a href="#">All product</a></li>
		 		<li><a href="#">My Account</a></li>
		 		<li><a href="#">Sign Up</a></li>
		 		<li><a href="#">Shopping cart</a></li>
		 		<li><a href="#">Contact Us</a></li>
		 	</ul>
		 	<div id="form">
		 			<form method="get" action="result.php" enctype="multipart/form-data">
		 				<input type="text" name="user_query" placeholder="Search a Product"></input>
		 				<input type="submit" name="search" value="Search"/>
		 			</form>
		 	</div>

		 </div>	
		 <!--Menu start-->
		 <!--Content start-->
		 <div class="content_wrapper">
			 <div id="sidebar">
			 	<div id="sidebar_title">Categories</div>
			 	
			 		<ul id="cats">
			 			<?php
			 				getCats();
			 			?>
			 		</ul>

			 	<div id="sidebar_title">Brands</div>
			 	
			 		<ul id="cats">
			 			<?php
			 				getBrands();
			 			?>

			 		</ul>

			 </div>
			 <div id="content_area">

			 	<div id="shopping_cart">
			 		<span style="float:right; font-size:20px; padding:5px; line-height:40px;">
			 			Welcome Guest! <b style="color:green">Shoppping Cart-</b> Total Items: Total Price:
			 			<a href="cart.php" style="color:green" text-decoration: none;>Go to Cart</a>
			 		</span>	
			 	</div>

			 

			 	<?php
			 		if(isset($_GET['pro_id'])){
			 			$product_id = $_GET['pro_id'];


						$get_pro = "SELECT*FROM products where product_id='$product_id'";

						$run_pro = mysqli_query($con,$get_pro);

						while ($row_pro=mysqli_fetch_array($run_pro)) {
							# code...
							$pro_id = $row_pro['product_id'];
							$pro_title = $row_pro['product_title'];
							$pro_price = $row_pro['product_price'];
							$pro_image = $row_pro['product_image'];
							$pro_desc = $row_pro['product_desc'];

							echo "
							<div id='single_product'>

								<h3> $pro_title </h3>
								<img src='admin_area/product_images/$pro_image' width = '400' height='300' />
								<p> $pro_price төг</p>

								<p>$pro_desc</p>
								<a href='index.php' style='float:left;'>Go Back</a>
								<a href='index.php?pro_id=$pro_id' ><button style='float:right'>Add to Cart </button></a>
							</div>	
							";
						}

			 		}
			 	?>
			 		
			 	

			 </div>
		 </div>
		  <!--Content end-->

		   <!--Footer start-->
		 <div id="footer">
		 	<h2>
		 		&copy; ITsoftMN.mn 
		 	</h2>
		 </div>
		  <!--Footer end-->
	</div>
	<!--Main container start-->
</body>
</html>