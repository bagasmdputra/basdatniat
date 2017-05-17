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
        if(!empty(pg_query($db, "SELECT * FROM produk WHERE kode_produk = '".$_POST['kode-produk']."';"))) {
            $_SESSION['form-pulsa-message'] = 'Kode produk tersebut sudah digunakan';
        } else {
            $sql = "INSERT INTO produk(kode_produk,nama,harga,deskripsi) VALUES ('".$kode_produk."','".$nama_produk."',".$harga_produk.",NULL);
                INSERT INTO produk_pulsa(kode_produk,nominal) VALUES ('".$kode_produk."',".$nominal_produk.");";
            $result = pg_query($db, $sql);
            $_SESSION['form-pulsa-message'] = 'Input berhasil';
        }
    }
    header('Location: pulsa.php');
?>