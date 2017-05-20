<?php
session_start();
$counter = $_POST['counter'];
$kode_kategori = $_POST['cat-code'];
$nama_kategori = $_POST['cat-name'];
$conn= pg_connect("host=localhost dbname=c12 user=postgres password=basdat");
$query1 = "INSERT INTO TOKOKEREN.KATEGORI_UTAMA(kode, nama) VALUES ('".$kode_kategori."', '".$nama_kategori."')";
$res1 = pg_query($query1);
if ($res1) {
	for($i=1;$i<=$counter;$i++){
		$val_sub_code = 'sub-code-'.$i.'';
		$val_sub_name = 'sub-name-'.$i.'';
		$sub_code = $_POST[$val_sub_code];
		$sub_name = $_POST[$val_sub_name];
		$query2 = "INSERT INTO TOKOKEREN.SUB_KATEGORI(kode, kode_kategori, nama)
		VALUES ('".$sub_code."', '".$kode_kategori."', '".$sub_name."')";
		$res2 = pg_query($query2);
		if(!$res2){
			$errormessage = pg_last_error();
    		if(strpos($errormessage, 'kode')){
	    	$_SESSION['message']='Kode subkategori harus unik';
	    	}
	    	header("location: create-category.php");
    		exit();
		}
	}
	$_SESSION['message'] ="Kategori Berhasil Ditambahkan";
	header("location: index.php");
}else{
	$errormessage = pg_last_error();
    if(strpos($errormessage, 'kode')){
	    	$_SESSION['message']='Kode kategori harus unik';
	}
	header("location: create-category.php");
    exit();
}
