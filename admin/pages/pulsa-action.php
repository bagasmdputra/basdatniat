<?php
    session_start();
    require "connect.php";
    $db = connectDB();
    if(!$db) {
        $_SESSION['form-pulsa-message'] = 'Koneksi gagal';
        die("Connection failed");
    } else {
        $kode_produk = $_POST['kode-produk'];
        $nama_produk = $_POST['nama-produk'];
        $harga_produk = $_POST['harga-produk'];
        $nominal_produk = $_POST['nominal-produk'];

        //cek id unique
        if(!empty(pg_query($db, "SELECT * FROM produk WHERE kode_produk = '".$_POST['kode-produk']."'"))) {
            $_SESSION['form-pulsa-message'] = 'Kode produk tersebut sudah digunakan';
        } else {
            $result = pg_query_params($db, "INSERT INTO produk(kode_produk,nama,harga,deskripsi) VALUES ($1,$2, $3, NULL)", array($kode_produk, $nama_produk, $harga_produk));
            $result = pg_query_params($db, "INSERT INTO produk_pulsa(kode_produk,nominal) VALUES ($1, $2)", array($kode_produk, $nominal_produk));
            $_SESSION['form-pulsa-message'] = 'Input berhasil';
        }
    }
    header('Location: pulsa.php');
?>
