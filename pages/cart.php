<?php
        session_start();
    if(!isset($_SESSION['email'])){ //if login in session is not set
    header("Location: ../login.php");

}

; ?>
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

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
					<li class="text"><a href="../logout.php">logout</a></li>
					<li class="text"><a href="cart.php">Cart</a></li>
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
	        <h1 class="navbar-brand"><a  href="../index.php">Tokokeren</a></h1>
	    </div>
	    <!--/.navbar-header-->

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
			<li><a href="../index.php">Home</a></li>
		        <li class="dropdown">
		            <li><a href="./products.php">Products</a></li>
					<li><a href="./transactions.php">Transactions</a></li>
					<li><a href="./openshop.php">Open Shop</a></li>
					<?php if ($_SESSION['role']=="penjual"){ 					echo "<li><a href=\"./addproduct.php\">Add product</a></li>"                         ;}?>
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
    <div class="container">
		<div class="table-responsive">
         <table id="produkbarang" class="table">
                        <thead>
                          <tr>
                              <th>Kode Produk</th>
                              <th>Nama Produk</th>
                              <th>Berat</th>
                              <th>Kuantitas</th>
                              <th>Harga</th>
                              <th>Sub Total</th>
                          </tr>
                            </thead>
<?php

        $email = $_SESSION['email'];
//             $email= "aindrea336@gmail.com";


$db = pg_connect('host=dbpg.cs.ui.ac.id dbname=c212 user=c212 password=bdc1222016');

    $query = "
        SELECT *
        FROM  KERANJANG_BELANJA a LEFT JOIN  PRODUK  b ON a.kode_produk = b.kode_produk
        WHERE pembeli='$email'
        ORDER BY a.kode_produk ASC";

    $result = pg_query($query);
    if (!$result) {
        echo "Problem with query " . $query . "<br/>";
        echo pg_last_error();
        exit();
    }
    $total_berat = 0;
    $total_biaya = 0;

    while($myrow = pg_fetch_assoc($result)) {
        $total_biaya +=  $myrow['sub_total'];
        $total_berat +=  ($myrow['berat'] * $myrow['kuantitas']);
        printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
                          </td></tr>",
                $myrow['kode_produk'],
                $myrow['nama'],
                $myrow['berat'],
                $myrow['kuantitas'],
                $myrow['harga'],
                $myrow['sub_total']

               );
        }


//    echo $total_biaya . "   " . $total_berat;
 ?>

                    </table>
            </div>

        <form id="checkoutcart" action="add_cart.php" method="post">
            <div class="wow fadeInRight" data-wow-delay="0.4s">
                <span>Alamat Kirim<label>*</label></span>
                <input type="text" name="alamat" required>
             </div>

             <label for="sel1">Select list:</label>
           <select class="form-control" name="jasa_kirim" >\
<?php


    $query = "
        SELECT jasa_kirim
        FROM  TOKO_JASA_KIRIM
        WHERE nama_toko in(
            SELECT b.nama_toko
            FROM  KERANJANG_BELANJA a
                LEFT JOIN  SHIPPED_PRODUK b ON a.kode_produk = b.kode_produk
            WHERE pembeli = '$email'
            LIMIT 1);";

    $result = pg_query($query);
    if (!$result) {
        echo "Problem with query " . $query . "<br/>";
        echo pg_last_error();
        exit();
    }


    while($myrow = pg_fetch_assoc($result)) {

        printf (" <option>%s</option>",
                $myrow['jasa_kirim']
               );
        }
 ?>
            </select>
          <input type="hidden" name="total_berat" value="<?php echo $total_berat ; ?>">
        <input type="hidden" name="total_biaya" value="<?php echo $total_biaya ; ?>">
        </form>
        <form>

					   <input type="submit" value="submit" class="btn btn-primary" form="checkoutcart">
					   <div class="clearfix"> </div>

        </form>
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
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#produkbarang').DataTable();
        });
    </script>
</body>
</html>
