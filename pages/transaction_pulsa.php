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
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
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
		        <li class="dropdown">
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
    
       <div class="content">
	 <div class="container">
		<div class="table-responsive">
         <table class="table">
                        <thead>
                          <tr>
                              <th>No Invoice</th>
                              <th>Nama Produk</th>
                              <th>Tanggal</th>
                              <th>Status</th>
                              <th>Total Bayar</th>
                              <th>Nominal</th>
                              <th>Nomor</th>
                          </tr>
                            </thead>
<?php 

    $db = pg_connect('host=localhost dbname=bagaskoro.meyca user=postgres password=Basdat');

        $query = "
        SELECT a.no_invoice, b.nama, a.tanggal, a.status, a.total_bayar, a.nominal, a.nomor 
        FROM TRANSAKSI_PULSA a LEFT JOIN PRODUK b ON a.kode_produk = b.kode_produk
        WHERE email_pembeli='Kendal@gmail.com'"; 

        $result = pg_query($query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 

        while($myrow = pg_fetch_assoc($result)) { 
   
            $stat = "hai";
            if ($myrow['status']=='1'){
                $stat = "Transaksi dilakukan";
            }else{
                $stat = "Pulsa sudah dibayar";
            }

            printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                    $myrow['no_invoice'],
                    $myrow['nama'], 
                    $myrow['tanggal'],
                    $stat,
                    $myrow['total_bayar'],
                    $myrow['nominal'],
                    $myrow['nomor']
                   );
        }

?> 
                    </table> 
            </div>
           </div>
    </div>
    
		<div class="banner-bottom">
		<div class="gallery-cursual">
		<!--requried-jsfiles-for owl-->
		<script src="js/owl.carousel.js"></script>
			<script>
				$(document).ready(function() {
					$("#owl-demo").owlCarousel({
						items : 3,
						lazyLoad : true,
						autoPlay : true,
						pagination : false,
					});
				});
			</script>
		<!--requried-jsfiles-for owl -->
		<!--start content-slider-->
		<div id="owl-demo" class="owl-carousel text-center">
			<div class="item">
				<img class="lazyOwl" data-src="images/b1.jpg" alt="name">
				<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
			<div class="item">
				<img class="lazyOwl" data-src="images/b2.jpg" alt="name">
			<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
			<div class="item">
				<img class="lazyOwl" data-src="images/b3.jpg" alt="name">
			<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
			<div class="item">
				<img class="lazyOwl" data-src="images/b4.jpg" alt="name">
			<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
			<div class="item">
				<img class="lazyOwl" data-src="images/b1.jpg" alt="name">
			<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
			<div class="item">
				<img class="lazyOwl" data-src="images/b6.jpg" alt="name">
			<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
			<div class="item">
				<img class="lazyOwl" data-src="images/b7.jpg" alt="name">
			<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
			<div class="item">
				<img class="lazyOwl" data-src="images/b1.jpg" alt="name">
			<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
			<div class="item">
				<img class="lazyOwl" data-src="images/b2                                                                   .jpg" alt="name">
			<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
			<div class="item">
				<img class="lazyOwl" data-src="images/b3.jpg" alt="name">
			<div class="item-info">
					<h5>Lorem ipsum</h5>
				</div>
			</div>
		</div>
		<!--sreen-gallery-cursual-->
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