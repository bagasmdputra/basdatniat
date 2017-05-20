<?php

    session_start();
    require "connect.php";
    $db = connectDB();
    if(!$db) {
        die("Connection failed");
    } else {
        $kode_produk = $_POST['kode-produk'];
        $nama_produk = $_POST['nama-produk'];
        $harga_produk = $_POST['harga-produk'];
        $deskripsi_produk = $_POST['deskripsi-produk'];
        $subkategori_produk = $_POST['subkategori-produk'];
        $isasuransi_produk = $_POST['isasuransi-produk'];
        $stok_produk = $_POST['stok-produk'];
        $isbaru_produk = $_POST['isbaru-produk'];
        $min_order_produk = $_POST['min-order-produk'];
        $min_grosir_produk = $_POST['min-grosir-produk'];
        $max_grosir_produk = $_POST['max-grosir-produk'];
        $nama_toko = pg_fetch_row(pg_query($db, "SELECT nama FROM toko WHERE email_penjual = $_SESSION['email']"))[0];

        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["foto-produk"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        	$check = getimagesize($_FILES["foto-produk"]["tmp_name"]);
        	if($check !== false) {
        		echo "File is an image - " . $check["mime"] . ".";
        		$uploadOk = 1;
        	} else {
        		echo "File is not an image.";
        		$uploadOk = 0;
        	}
        }

        //cek id unique
        if(!empty(pg_query($db, "SELECT * FROM produk WHERE kode_produk = '".$_POST['kode-produk']."'"))) {
            echo 'Kode produk tersebut sudah digunakan';
        } else {
            $result = pg_query_params($db, "INSERT INTO produk(kode_produk,nama,harga,deskripsi) VALUES ($1,$2, $3, $4)", array($kode_produk, $nama_produk, $harga_produk, $deskripsi_produk));
            $result = pg_query_params($db, "INSERT INTO shipped_produk(kode_produk,kategori,nama_toko,is_asuransi,stok,is_baru,min_order,min_grosir,max_grosir,harga_grosir,foto) VALUES ($1,)", array($kode_produk, $subkategori_produk, $nama_toko, $isasuransi_produk, $stok_produk, $isbaru_produk, $min_order_produk, $min_grosir_produk, $max_grosir_produk, $target_file));
        }
    }
    header('Location: addproduct.php');

?>