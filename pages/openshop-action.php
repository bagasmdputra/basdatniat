<?php
    session_start();
    require "connect.php";
    $db = connectDB();
    if(!$db) {
        //$_SESSION['form-pulsa-message'] = 'Koneksi gagal';
        die("Connection failed");
    } else {
        $nama_toko = $_POST['nama-toko'];
        $deskripsi_toko = $_POST['deskripsi-toko'];
        $slogan_toko = $_POST['slogan-toko'];
        $lokasi_toko = $_POST['lokasi-toko'];
        $jasa_kirim_toko = $_POST['jasa-kirim-toko']

        //cek id unique
        if(empty(pg_query_params($db, "SELECT * FROM toko WHERE nama_toko = $1",array($nama_toko)))) {
            $sql = "INSERT INTO produk(kode_produk,nama,harga,deskripsi) VALUES ('".$kode_produk."','".$nama_produk."',".$harga_produk.",NULL);
                INSERT INTO produk_pulsa(kode_produk,nominal) VALUES ('".$kode_produk."',".$nominal_produk.");";
            pg_query_params($db, "INSERT INTO toko(nama,deskripsi,slogan,lokasi,email_penjual) VALUES($1,$2,$3,$4,$5)", array($nama_toko,$deskripsi_toko,$slogan_toko,$lokasi_toko,$_SESSION['email']));
            pg_query_params($db, "INSERT INTO toko_jasa_kirim(nama_toko,jasa_kirim) VALUES($1,$2)", array($nama_toko,$jasa_kirim_toko));
            pg_query($db, "UPDATE pelanggan SET is_penjual = TRUE WHERE email = $_SESSION['email']");
            header('Location: addproduct.php');
        }
    }
    header('Location: openshop.php');
?>