<?php
    session_start();
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
                    <h1 class="page-header">Tambah Produk (Pulsa)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-8">
                    <form action="pulsa-action.php" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="kode-produk" class="control-label col-sm-4 col-lg-3">Kode Produk*</label>
                            <div class="col-sm-8 col-lg-9">
                                <input type="text" name="kode-produk" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama-produk" class="control-label col-sm-4 col-lg-3">Nama*</label>
                            <div class="col-sm-8 col-lg-9">
                                <input type="text" name="nama-produk" class="form-control" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga-produk" class="control-label col-sm-4 col-lg-3">Harga*</label>
                            <div class="col-sm-8 col-lg-9">
                                <input type="number" name="harga-produk" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nominal-produk" class="control-label col-sm-4 col-lg-3">Nominal*</label>
                            <div class="col-sm-8 col-lg-9">
                                <input type="number" name="nominal-produk" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-default" type="submit" value="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                    <?php 
                        if(!empty($_SESSION['form-pulsa-message'])) echo '<p class="text-center">'.$_SESSION['form-pulsa-message'].'</p>';
                        $_SESSION['form-pulsa-message'] = null;
                    ?>
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
