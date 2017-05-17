<?php
	require 'connect.php';
	if(isset($_SESSION['role'])){
		if($_SESSION['role'] == 'admin'){
			require 'admin.php';
		}
		else if($_SESSION['role'] == 'user'){
			require 'pengguna.php';
		}
	}
	else{
?>
<!--
Au<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Tokokeren|Login</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/owl.carousel.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tokokeren Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<!-- cart -->
		<script src="js/simpleCart.min.js"> </script>
	<!-- cart -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<script src="js/imagezoom.js"></script>

						<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>



</head>
<body>
	<!--header-->
		<div class="header">
			<div class="header-top">
			<div class="container">
				<div class="top-right">
				<ul>
					<li class="text"><a href="login.php">login</a>
					<li><div class="cart box_1">
							<a href="checkout.php">
								 <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)
							</a>
							<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
							<div class="clearfix"> </div>
						</div></li>
				</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			</div>
			<div class="header-bottom">
					<div class="container">
<!--/.content-->
<div class="content white">
	<nav class="navbar navbar-default" role="navigation">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	       <h1 class="navbar-brand"><a  href="index.php">Tokokeren</a></h1>
	    </div>
	    <!--/.navbar-header-->

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-3">
			            <div class="row">
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						            <li><a class="list" href="products.php">Women</a></li>
						            <li><a class="list1" href="products.php">PrettySecrets</a></li>
						            <li><a class="list1" href="products.php">N-Gal</a></li>
						            <li><a class="list1" href="products.php">Lobster</a></li>
						            <li><a class="list1" href="products.php">Citypret</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						            <li><a class="list" href="products.php">Kids</a></li>
						            <li><a class="list1" href="products.php">River Island</a></li>
						            <li><a class="list1" href="products.php">Penny</a></li>
						            <li><a class="list1" href="products.php">Nidhi Munim</a></li>
						            <li><a class="list1" href="products.php">Divaat</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						            <li><a class="list" href="products.php">Men</a></li>
						            <li><a class="list1" href="products.php">Fiesta Clara</a></li>
						            <li><a class="list1" href="products.php">Quiksilver</a></li>
						            <li><a class="list1" href="products.php">Incult</a></li>
						            <li><a class="list1" href="products.php">Proline</a></li>
					            </ul>
				            </div>
			            </div>
		            </ul>
		        </li>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">women <b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-3">
			            <div class="row">
				            <div class="col-sm-4">
					           <ul class="multi-column-dropdown">
						            <li><a class="list" href="products.php">Women</a></li>
						            <li><a class="list1" href="products.php">PrettySecrets</a></li>
						            <li><a class="list1" href="products.php">N-Gal</a></li>
						            <li><a class="list1" href="products.php">Lobster</a></li>
						            <li><a class="list1" href="products.php">Citypret</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					             <ul class="multi-column-dropdown">
						            <li><a class="list"  href="products.php">Kids</a></li>
						            <li><a class="list1" href="products.php">River Island</a></li>
						            <li><a class="list1" href="products.php">Penny</a></li>
						            <li><a class="list1" href="products.php">Nidhi Munim</a></li>
						            <li><a class="list1" href="products.php">Divaat</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						            <li><a  class="list" href="products.php">Men</a></li>
						            <li><a class="list1" href="products.php">Fiesta Clara</a></li>
						            <li><a class="list1" href="products.php">Quiksilver</a></li>
						            <li><a class="list1" href="products.php">Incult</a></li>
						            <li><a class="list1" href="products.php">Proline</a></li>
					            </ul>
				            </div>
			            </div>
		            </ul>
		        </li>
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">kids <b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-3">
			            <div class="row">
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						            <li><a class="list" href="products.php">Women</a></li>
						            <li><a class="list1" href="products.php">PrettySecrets</a></li>
						            <li><a class="list1" href="products.php">N-Gal</a></li>
						            <li><a class="list1" href="products.php">Lobster</a></li>
						            <li><a class="list1" href="products.php">Citypret</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					             <ul class="multi-column-dropdown">
						            <li><a  class="list" href="products.php">Kids</a></li>
						            <li><a class="list1" href="products.php">River Island</a></li>
						            <li><a class="list1" href="products.php">Penny</a></li>
						            <li><a class="list1" href="products.php">Nidhi Munim</a></li>
						            <li><a class="list1" href="products.php">Divaat</a></li>
					            </ul>
				            </div>
				            <div class="col-sm-4">
					            <ul class="multi-column-dropdown">
						            <li><a class="list" href="products.php">Men</a></li>
						            <li><a class="list1" href="products.php">Fiesta Clara</a></li>
						            <li><a class="list1" href="products.php">Quiksilver</a></li>
						            <li><a class="list1" href="products.php">Incult</a></li>
						            <li><a class="list1" href="products.php">Proline</a></li>
					            </ul>
				            </div>
			            </div>
		            </ul>
		        </li>
					<li><a href="products.php">Top</a></li>
					<li><a href="products.php">Bikini</a></li>
	        </ul>
	    </div>
	    <!--/.navbar-collapse-->
	</nav>
	<!--/.navbar-->
</div>
			   <div class="search-box">
					<div id="sb-search" class="sb-search">
						<form>
							<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"> </span>
						</form>
					</div>
				</div>

<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!--header-->
			<!--contact-->
			<div class="content">
 <div class="main-1">
		<div class="container">
<div class="login-page">
			   <div class="account_grid">
			   <div class="col-md-6 login-left">
			  	 <h3>NEW CUSTOMERS</h3>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="account.php">Create an Account</a>
			   </div>
			   <div class="col-md-6 login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				<form action="loginAction.php" method="post">
				  <div>
					<span>Email Address<label>*</label></span>
					<input name="email" id="email"type="email" required/>
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input name="password" id="pwdLogin" type="password">
				  </div>
				  <a class="forgot" href="#">Forgot Your Password?</a>
				  <input type="submit" name='login'value="Login">
			    </form>
			   </div>
			   <div class="clearfix"> </div>
			 </div>
		   </div>
		   </div>
	</div>
	</div>
<!-- login -->
<div class="subscribe">
	 <div class="container">
	 <div class="subscribe1">
		 <h4>the latest from Tokokeren</h4>
		 </div>
		 <div class="subscribe2">
		 <form>
			 <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
			 <input type="submit" value="JOIN">
		 </form>
	 </div>
	 <div class="clearfix"></div>
	 </div>
</div>
</div>

	<!--footer-->
		<div class="footer-section">
			<div class="container">
				<div class="footer-grids">
					<div class="col-md-2 footer-grid">
					<h4>company</h4>
					<ul>
						<li><a href="products.php">products</a></li>
						<li><a href="#">Work Here</a></li>
						<li><a href="#">Team</a></li>
						<li><a href="#">Happenings</a></li>
						<li><a href="#">Dealer Locator</a></li>
					</ul>
				</div>
					<div class="col-md-2 footer-grid">
					<h4>service</h4>
					<ul>
						<li><a href="#">Support</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Warranty</a></li>
						<li><a href="contact.php">Contact Us</a></li>
					</ul>
					</div>
					<div class="col-md-2 footer-grid">
					<h4>order & returns</h4>
					<ul>
						<li><a href="#">Order Status</a></li>
						<li><a href="#">Shipping Policy</a></li>
						<li><a href="#">Return Policy</a></li>
						<li><a href="#">Digital Gift Card</a></li>
					</ul>
					</div>
					<div class="col-md-2 footer-grid">
					<h4>legal</h4>
					<ul>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Terms and Conditions</a></li>
						<li><a href="#">Social Responsibility</a></li>
					</ul>
					</div>
					<div class="col-md-4 footer-grid1">
					<div class="social-icons">
						<a href="#"><i class="icon"></i></a>
						<a href="#"><i class="icon1"></i></a>
						<a href="#"><i class="icon2"></i></a>
						<a href="#"><i class="icon3"></i></a>
						<a href="#"><i class="icon4"></i></a>
					</div>
					<p>Copyright &copy; 2015 Tokokeren. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
					</div>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<!--footer-->

</body>
</html>
<?php } ?>
