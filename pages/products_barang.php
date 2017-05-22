<?php   session_start();
    if(!isset($_SESSION['email'])){ //if login in session is not set
    header("Location: ../login.php");
    
}
    $toko =  str_replace("'", "''",$_POST['toko']);
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
<title>Tokokeren | Produk Barang :: </title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/image.css" rel="stylesheet" type="text/css" media="all" />


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
					<li><a href="./addproduct.php">Add product</a></li>
	        </ul>
	    </div>
	    <!--/.navbar-collapse-->
	</nav>
	<!--/.navbar-->
</div>
			 
			

			<!--header-->
    <div class="container">
        <label for="sel1">Kategori:</label>
           <select class="form-control" name="kategori drop" id="kategoridd">
               <option id="all">all</option>
<?php 
               
               

$db = pg_connect('host=localhost dbname=c12 user=postgres password=basdat');
    $query1 = "
        SELECT DISTINCT d.nama as kategori
                FROM tokokeren.SHIPPED_PRODUK a 
                    LEFT JOIN tokokeren.PRODUK b ON a.kode_produk = b.kode_produk
                    LEFT JOIN tokokeren.SUB_KATEGORI c ON a.kategori= c.kode
                    LEFT JOIN tokokeren.KATEGORI_UTAMA d ON c.kode_kategori = d.kode
        WHERE nama_toko ='$toko'
        ORDER BY kategori";
               
    $result1 = pg_query($query1); 
    if (!$result1) { 
        echo "Problem with query " . $query1 . "<br/>"; 
        echo pg_last_error(); 
        exit(); 
    } 

    

    while($myrow1 = pg_fetch_assoc($result1)) { 
    $kategori =  str_replace(str_split('\\/:*?"<>|& '), '',$myrow1['kategori']);
                        printf (" <option id = \"%s\" >%s</option>",
                $kategori,
                $myrow1['kategori']
               );
        } 
 ?> 

        </select>
        
        <label for="sel1">Sub Kategori:</label>
           <select class="form-control" name="sub kategori drop" id="subkategoridd">
               <option id="all1">all</option>
<?php
    $db = pg_connect('host=localhost dbname=c12 user=postgres password=basdat');
    $query2 = "
        SELECT DISTINCT c.nama as subkategori
                FROM tokokeren.SHIPPED_PRODUK a 
                    LEFT JOIN tokokeren.PRODUK b ON a.kode_produk = b.kode_produk
                    LEFT JOIN tokokeren.SUB_KATEGORI c ON a.kategori= c.kode
                    LEFT JOIN tokokeren.KATEGORI_UTAMA d ON c.kode_kategori = d.kode
        WHERE nama_toko ='$toko'
        ORDER BY subkategori"; 
    $result2 = pg_query($db,$query2); 
    if (!$result2) { 
        echo "Problem with query " . $query . "<br/>"; 
        echo pg_last_error(); 
        exit(); 
    } 

    

    while($myrow2 = pg_fetch_assoc($result2)) { 
    $subkategori = str_replace(str_split('\\/:*?"<>|& '), '',$myrow2['subkategori']);
                    
  
                printf (" <option id = \"%s\" >%s</option>",
                $subkategori,
                $myrow2['subkategori']
                
               );
        } 
 ?> 

        </select>
        <br>
        <br>
        
		<div class="table-responsive">
         <table id="produkbarang" class="table">
                        <thead>
                          <tr>
                              <th>Kode Produk</th>
                              <th>Nama Produk</th>
                              <th>Harga</th>
                              <th>Deskripsi</th>
                              <th>Is Asuransi</th>
                              <th>Stok</th>
                              <th>Is Baru</th>
                              <th>Harga Grosir</th>
                              <th>Beli</th>
                          </tr>
                            </thead>
             <tbody>
<?php 


    
    $query = "
        SELECT a.kode_produk, b.nama, harga,deskripsi, is_asuransi, stok, is_baru, harga_grosir, d.nama as kategori, c.nama as subkategori
                FROM tokokeren.SHIPPED_PRODUK a 
                    LEFT JOIN tokokeren.PRODUK b ON a.kode_produk = b.kode_produk
                    LEFT JOIN tokokeren.SUB_KATEGORI c ON a.kategori= c.kode
                    LEFT JOIN tokokeren.KATEGORI_UTAMA d ON c.kode_kategori = d.kode
        WHERE nama_toko ='$toko'
        ORDER BY a.kode_produk ASC"; 
     
    $_SESSION['toko'] = $toko;
             echo  $_SESSION['toko'];
    $result = pg_query($query); 
    if (!$result) { 
        echo "Problem with query " . $query . "<br/>"; 
        echo pg_last_error(); 
        exit(); 
    } 

    

    while($myrow = pg_fetch_assoc($result)) { 
    $kategori = str_replace(str_split('\\/:*?"<>|& '), '',$myrow['kategori']);
    $subkategori = str_replace(str_split('\\/:*?"<>|& '), '',$myrow['subkategori']);
                    
  
        printf ("<tr class=\"%s %s\"><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>
                                <p><a class=\"button stroke orange\" href=\"beli_produk.php?kode_produk=%s&harga=%s\">Beli</a></p>
                          </td></tr>",
                $kategori,
                $subkategori,
                $myrow['kode_produk'],
                $myrow['nama'], 
                $myrow['harga'],
                $myrow['deskripsi'],
                $myrow['is_asuransi'],
                $myrow['stok'],
                $myrow['is_baru'],
                $myrow['harga_grosir'],
                $myrow['kode_produk'],
                 $myrow['harga']
               );
        } 
 ?> 
             </tbody>
                    </table> 
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
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            
            $('#produkbarang').DataTable();
        });
        
        var activities = document.getElementById("kategoridd");
        
        
        activities.addEventListener("change", function() {
            
            
            if(activities.value != "all")
            {
                var idDropdown = $("#kategoridd option:selected").attr('id');
//                alert(idDropdown);
                $("#subkategoridd").val("all");
                filterRows(idDropdown);
//                alert("masuk");
            }
            else{
                $("#produkbarang tbody tr").show();
                
            }
            
        });
        
        var activ = document.getElementById("subkategoridd");
        
        activ.addEventListener("change", function() {
            if(activ.value != "all1")
            {
                var idDropdown = $("#subkategoridd option:selected").attr('id');
                 $("#kategoridd").val('all');
                filterRows(idDropdown);
                
            }else{
                 $("#produkbarang tbody tr").show();
                 
            }
           
        });
        
        
        
        function filterRows(statusName) {
            $("#produkbarang tbody tr."+statusName).show();
            $("#produkbarang tbody tr").not("."+statusName).hide();
        }
    

    </script>
</body>
</html>