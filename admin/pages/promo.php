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
                    <form action="promo.php" class="form-horizontal">
                      <div class="form-group">
                        <label>Deskripsi :</label>
                        <p><textarea id="promo-description" style="resize:none" rows="4" cols="50" form="promo-from" class="form-control" placeholder="Deskripsi promo" required></textarea></p>
                      </div>
                        <div class="form-group">
                          <label class="input-group date" data-provide="datepicker">Periode Awal:</label>
                              <input id="promo-start-date" type="text" class="form-control" required>
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                            </div>
                          <div class="form-group">
                              <label class="input-group date" data-provide="datepicker">Periode Akhir:</label>
                                  <input id="promo-start-date" type="text" class="form-control" required>
                                  <div class="input-group-addon">
                                      <span class="glyphicon glyphicon-th"></span>
                                  </div>
                              </div>
                        <div class="form-group">
                            <label for="harga-produk" class="control-label col-sm-4 col-lg-2">Harga</label>
                            <div class="col-sm-8 col-lg-10">
                                <input type="number" name="harga-produk" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nominal-produk" class="control-label col-sm-4 col-lg-2">Nominal</label>
                            <div class="col-sm-8 col-lg-10">
                                <input type="number" name="nominal-produk" class="form-control" required>
                            </div>
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
                            <div class="text-center">
                                <button class="btn btn-default" type="submit" value="submit">Submit</button>
                            </div>
                        </div>
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

</body>

</html>
