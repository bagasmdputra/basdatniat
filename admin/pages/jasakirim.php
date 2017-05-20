<?php
  echo "string";
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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin JasaKirim</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Nama Admin</a>
                </li>
                <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-ul fa-fw"></i> Buat Kategori</a>
                        </li>
                        <li>
                            <a href="jasakirim.php"><i class="fa fa-truck fa-fw"></i> Tambah Jasa Kirim</a>
                        </li>
                        <li>
                            <a href="promo.php"><i class="fa fa-tags fa-fw"></i> Buat Promo</a>
                        </li>
                        <li>
                            <a href="pulsa.php"><i class="fa fa-shopping-cart fa-fw"></i> Tambah Produk (Pulsa)</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jasa Kirim (Pulsa)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-8">
                  <form action="jasakirim-action.php" method="post">
                      <div class="form-group">
                          <label for="namaJasaKirim">Nama</label>
                          <input type="text" class="form-control" id="namaJasaKirim" name="namaJasaKirim" maxlength="100" required onchange="checkname()" ononkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();"/>
                          <span class="help-block"><p class="text-danger" id="namaJasaKirim-danger"></p></span>
                      </div>
                      <div class="form-group">
                          <label for="lamaKirim">Lama Kirim</label>
                          <input type="text" class="form-control" id="lamaKirim" name="lamaKirim" pattern="(?:[0-9]{1,}|[0-9]{1,}-[0-9]{1,})" onchange="checkvalue()" ononkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" required>
                      </div>
                      <div class="form-group">
                          <label for="tarif">Tarif</label>
                          <input type="number" step="0.01" class="form-control" id="tarif" min="1" max="9999999999" name="tarif" required>
                          <span class="help-block"><p class="text-danger" id="lamaKirim-danger"></p></span>
                      </div>
                      <button type="submit" id="namaJasaKirim-submit" value="submit" class="btn btn-default">Submit</button>
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
      function checkname() {
        var	temp = <?php echo json_encode($resultNama);?>;
        for (var i = 0; i < temp.length; i++) {
          if(document.getElementById("namaJasaKirim").value.localeCompare(temp[i].nama) == 0) {
            document.getElementById("namaJasaKirim-danger").innerHTML = "Nama yang anda masukan sudah terdaftar";
            document.getElementById("namaJasaKirim-submit").setAttribute("disabled", "disabled");
            return false;
          } else {
                    document.getElementById("namaJasaKirim-danger").innerHTML = "";
                    document.getElementById("namaJasaKirim-submit").removeAttribute("disabled")
                }
        }
        document.getElementById("namaJasaKirim-submit").removeAttribute("disabled");
      }
        function checkvalue() {
            var temp = document.getElementById("lamaKirim").value.split("-");
            if (temp.length > 1) {
                if (temp[1].localeCompare(temp[0]) <= 0) {
                    document.getElementById("lamaKirim-danger").innerHTML = "The second number must be greater than the first number";
                    document.getElementById("namaJasaKirim-submit").setAttribute("disabled", "disabled");
                }
                else {
                    document.getElementById("lamaKirim-danger").innerHTML = "";
                    document.getElementById("namaJasaKirim-submit").removeAttribute("disabled")
                }
            }
        }
    </script>

    <!-- The following line is mandatory -->
</body>

</html>
