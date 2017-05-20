<?php
    session_start();
    require 'connect.php';
    $db = connectDB();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            require 'navbar.php';
        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Buat Promo(Pulsa)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-8">
                  <h2>Membuat Promo</h2>
                  <hr/>
                  <form action="promo-action.php" method="post">
                      <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <input type="text" class="form-control" id="deskripsi" name="deskripsi" required/>
                      </div>
<<<<<<< HEAD
                  	<div class="form-group">
                  		<label for="periode-awal">Periode Awal</label>
                  		<input type="date" class="form-control" id="periode-awal" name="periode-awal" required>
                  	</div>
                  	<div class="form-group">
                  		<label for="periode-akhir">Periode Akhir</label>
                  		<input type="date" class="form-control" id="periode-akhir" name="periode-akhir" required>
                  	</div>
                  	<div class="form-group">
                  		<label for="kode-promo">Kode Promo</label>
                  		<input type="text" class="form-control" id="kode-promo" name="kode-promo" disabled>
                  	</div>
                    <div class="form-group">
                            <label for="subkategori-produk" class="control-label col-sm-4 col-lg-3  ">Kategori</label>
                            <div class="col-sm-3 col-lg-4">
                                <select name="subkategori-produk" class="form-control" required>
                                    <?php

                                    $query = "SELECT kode, nama FROM kategori_utama;";
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
                  		<label for="sub-kategori">Sub Kategori</label>
                  		<select name="sub-kategori" id="sub-kategori" class="form-control">
                        <?php
                          foreach ($sub_kategori as $key => $value) {
                            echo "<option value=" . $value['kode'] . ">" . $value['nama'] . "</option>";
                          }
                        ?>
                  		</select>
                  	</div>
                      <button type="submit" id="deskripsi-submit" value="submit" class="btn btn-default">Submit</button>
                  </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
    	$(document).ready(function() {
    		var text = "<?php echo $kode; ?>";
        	$("#kode-promo").val(text);

        	var my_sub_kategori = <?php echo json_encode($sub_kategori); ?>;
        	var e = document.getElementById("kategori");
    		var my_kode_kategori = e.options[e.selectedIndex].value;
    		for(i = 0; i < my_sub_kategori.length; i++) {
    			if (my_kode_kategori.localeCompare(my_sub_kategori[i].kode_kategori) == 0) {
    				$("#sub-kategori").append("<option value=\"" + my_sub_kategori[i].kode + "\"" + ">" + my_sub_kategori[i].nama + "</option>");
    			}
    		};

    		$("#kategori").change(function() {
    			var e = document.getElementById("kategori");
    			var my_kode_kategori = e.options[e.selectedIndex].value;

    			$('#sub-kategori')
    			    .find('option')
    			    .remove()
    			    .end()
    			;

    			for(i = 0; i < my_sub_kategori.length; i++) {
    				if (my_kode_kategori.localeCompare(my_sub_kategori[i].kode_kategori) == 0) {
    					$("#sub-kategori").append("<option value=\"" + my_sub_kategori[i].kode + "\"" + ">" + my_sub_kategori[i].nama + "</option>");
    				}
    			};
    		});

    		$("#periode-awal").change(function() {
    			var temp = document.getElementById("periode-awal").value;
    			document.getElementById("periode-akhir").setAttribute("min", temp);
    		});

    	});
    </script>

</body>

</html>
