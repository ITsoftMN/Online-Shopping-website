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

			 	<div id="products_box">


			 		<?php
			 			getPro();
			 		?>
			 		<?php
			 			getCatPro();
			 		?>

			 	</div>	

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