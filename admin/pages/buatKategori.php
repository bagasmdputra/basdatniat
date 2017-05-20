<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript">
    $(document).ready(function(){
var counter = 1;
$("#pop-button").click(function(){
  $("#pop-login").hide();
});
$("#add-subcat").click(function(){
  counter++;
  $('#subcat').append("<div class='col-md-12'><label>Subkategori "+counter+"</label>"+
    "</div><div class='form-group'><div class='col-md-6'><label for='sub-code'>Kode subkategori:</label>"+
    "<input maxlength='5' required type='text' class='form-control' id='sub-code' name='sub-code-"+counter+"'></div><div class='form-group'><div class='col-md-6'>"+
    "<label for='sub-name'>Nama Subkategori:</label><input  required type='text' class='form-control' name='sub-name-"+counter+"'id='sub-name'><BR>"+
    "</div></div></div>");
  $('#hidden-input').val(counter);

});

});

function showSub(str){
if (window.XMLHttpRequest) {
  xmlhttp=new XMLHttpRequest();
} else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("sel2").innerHTML=this.responseText;
    }
}
xmlhttp.open("GET","getsub.php?q="+str,true);
  xmlhttp.send();
}
    </script>
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
                        <h1 class="page-header">Buat Kategori</h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-sm-8">
                        <form action="pulsa-action.php" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="kode-kategori" class="control-label col-sm-4 col-lg-3">Kode Kategori*</label>
                                <div class="col-sm-8 col-lg-9">
                                    <input type="text" name="kode-kategori" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama-kategori" class="control-label col-sm-4 col-lg-3">Nama Kategori*</label>
                                <div class="col-sm-8 col-lg-9">
                                    <input type="text" name="nama-kategori" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div id="subcat">
					<div class="col-md-12">
						<label>Subkategori 1</label>
					</div>
					<div class="form-group">
						<div class="col-sm-8">
							<label for="sub-code">Kode subkategori:</label>
					    	<input required type="text" maxlength="5" class="form-control" name='sub-code-1' id="sub-code-1">
						</div>
					</div>
					<div class="form-group">
					 	<div class="col-md-6">
					 		<label for="sub-name">Nama Subkategori</label>
					    	<input required type="text" class="form-control" name='sub-name-1' id="sub-name-1"><BR>
					 	</div>
					</div>
				</div>
				<input type="text" id="hidden-input" name="counter" value="1">
				<div class="col-md-12">
					<button type="button" class="btn btn-default" id="add-subcat">
					<span class="glyphicon glyphicon-plus"></span>Tambah Subkategori
					</button>
					<br>

				</div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button id="cat-form" class="btn btn-default" type="submit" value="submit">Submit</button>
                                </div>
                            </div>
                            <?php
                                if(!empty($_SESSION['form-pulsa-message'])) echo '<p class="text-center">'.$_SESSION['form-pulsa-message'].'</p>';
                                $_SESSION['form-pulsa-message'] = null;
                            ?>
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
