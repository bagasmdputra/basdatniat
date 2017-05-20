<?php  
	session_start();
	require '../connect.php';
	$db = connectDB();

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Tokokeren | Home :: </title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/image.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/owl.carousel.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Tokokeren Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="../application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-3.1.1.min.js"></script>
	<!-- cart -->
	<script src="../js/simpleCart.min.js"> </script>
	<!-- cart -->
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="header-top">
			<div class="container">
				<div class="top-right">
					<ul>
						<li class="text"><a href="../login.php">login</a></li>
						<li class="text"><a href="../login.php">Cart</a></li>
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
								<li><a href="../index.php">Home</a></li>
								<li class="dropdown"></li>
								<li><a href="products.php">Products</a></li>
								<li><a href="transactions.php">Transactions</a></li>
								<li><a href="openshop.php">Open Shop</a></li>
								<li><a href="addproduct.php">Add product</a></li>
							</ul>
						</div>
						<!--/.navbar-collapse-->
					</nav>
					<!--/.navbar-->
				</div>


				<!-- search-scripts -->
				<script src="../js/classie.js"></script>
				<script src="../js/uisearch.js"></script>
				<script>
					new UISearch( document.getElementById( 'sb-search' ) );
				</script>
				<!-- //search-scripts -->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--header-->
	<div class="content">
		<div class="main-1">
			<div class="container">
				<div class="login-page">
					<div class="account_grid">
						<div class="col-md-12">
							<h2 class="text-center">Tambahkan Produk</h2>
							<br><br>
							<form action="addproduct-action.php" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="kode-produk" class="control-label col-sm-4 col-lg-3">Kode_Produk*</label>
                                <div class="col-sm-8 col-lg-9">
                                    <input type="text" name="kode-produk" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama-produk" class="control-label col-sm-4 col-lg-3">Nama produk*</label>
                                <div class="col-sm-8 col-lg-9">
                                    <input type="text" name="nama-produk" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga-produk" class="control-label col-sm-4 col-lg-3">Harga*</label>
                                <div class="col-sm-8 col-lg-9">
                                    <input type="number" name="harga-produk" class="form-control"  autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi-produk" class="control-label col-sm-4 col-lg-3">Deskripsi*</label>
                                <div class="col-sm-8 col-lg-9">
                                    <textarea name="lokasi-toko" class="form-control" rows="3" style="resize: none; overflow-y: auto;"  required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label for="subkategori-produk" class="control-label col-sm-4 col-lg-3	">Subkategori*</label>
                            	<div class="col-sm-3 col-lg-4">
                            		<select name="subkategori-produk" class="form-control" required>
                            			<?php

                            			$query = "SELECT kode, nama FROM sub_kategori;";
                            			$result = pg_query($db, $query);

                            			if (!$db) {
                            				die("Connection failed ");
                            			}
                            			if ($result > 0) {
           										// output data of each row
                            				while($row = pg_fetch_assoc($result)) {
                            					echo '<option value="'.$row['kode'].'">'.$row['nama'].'</option>';
                            				}
                            			}
                            			
                            			?>
                            		</select>
                            	</div>
                            </div>
                            <div class="form-group">
                                <label for="isasuransi-produk" class="control-label col-sm-4 col-lg-3">Barang Asuransi*</label>
                                <div>
                                	<input type="radio" name="isasuransi-produk" class="radio-inline" value="TRUE" required> Ya
                                	<input type="radio" name="isasuransi-produk" class="radio-inline" value="FALSE" required> Tidak
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stok-produk" class="control-label col-sm-4 col-lg-3">Stok*</label>
                                <div class="col-sm-3 col-lg-4">
                                    <input type="number" name="stok-produk" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="isbaru-produk" class="control-label col-sm-4 col-lg-3">Barang Baru*</label>
                                <div>
                                	<input type="radio" name="isbaru-produk" class="radio-inline" value="TRUE" required> Ya
                                	<input type="radio" name="isbaru-produk" class="radio-inline" value="FALSE" required> Tidak
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="min-order-produk" class="control-label col-sm-4 col-lg-3">Minimal Order*</label>
                                <div class="col-sm-3 col-lg-4">
                                    <input type="number" name="min-order-produk" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="min-grosir-produk" class="control-label col-sm-4 col-lg-3">Minimal Grosir*</label>
                                <div class="col-sm-3 col-lg-4">
                                    <input type="number" name="min-grosir-produk" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="max-grosir-produk" class="control-label col-sm-4 col-lg-3">Maksimal Grosir*</label>
                                <div class="col-sm-3 col-lg-4">
                                    <input type="number" name="max-grosir-produk" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga-grosir-produk" class="control-label col-sm-4 col-lg-3">Harga Grosir*</label>
                                <div class="col-sm-3 col-lg-4">
                                    <input type="number" name="harga-grosir-produk" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto-produk" class="control-label col-sm-4 col-lg-3">Foto Produk*</label>
                                <div class="col-sm-3 col-lg-4">
                                    <input type="file" name="foto-produk" class="form-control" accept="image/*" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-default" type="submit" value="submit">Submit</button>
                                </div>
                            </div>
                            <?php 
                                if(!empty($_SESSION['form-pulsa-message'])) echo '<p class="text-center">'.$_SESSION['form-pulsa-message'].'</p>';
                                $_SESSION['form-pulsa-message'] = null;
                            ?>
                        </form>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="subscribe">
		<div class="container">


			<div class="clearfix"></div>
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

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-->

</body>
</html>