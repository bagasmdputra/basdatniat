<?php

require_once 'connect.php';
$flag = false;
if (isset($_POST['register-submit'])){
		$password = $_POST['password'];
		$name = $_POST['fullname'];
		$email = $_POST['email'];
		$repeat_password = $_POST['confirm-password'];
		$phone = $_POST['phone'];
		$alamat = $_POST['alamat'];
		$sex = $_POST['sex'];
		$flag = true;

	}    if ($email != ""){
		$conn = connectDB();
		$query = "SELECT * FROM tokokeren.pengguna WHERE email = '$email'";
		$result = pg_query($conn, $query);
		while ($row = pg_fetch_assoc($result)) {
			echo "<script>alert('Email sudah terdaftar!');window.location.href='login.php';$('#register-form-link').click();</script>";
			$flag = false;
		}
	}
	if ($password == ""){
		echo "<script>alert('Password tidak boleh kosong!');window.location.href='login.php';$('#register-form-link').click();</script>";
		$flag = false;
	} if ($name == ""){
		echo "<script>alert('Nama tidak boleh kosong!');window.location.href='login.php';$('#register-form-link').click();</script>";
		$flag = false;
	} if ($email == ""){
		echo "<script>alert('Email tidak boleh kosong!');window.location.href='login.php';$('#register-form-link').click();</script>";
		$flag = false;
	} if ($password != "" && !preg_match("/^[A-Za-z0-9]{6,}$/", $password)) {
		echo "<script>alert('Password tidak sesuai ketentuan!');window.location.href='login.php';$('#register-form-link').click();</script>";
		$flag = false;
	} if ($password != "" && $repeat_password != "" && $password !== $repeat_password){
		echo "<script>alert('Konfirmasi password tidak sesuai!');window.location.href='login.php';$('#register-form-link').click();</script>";
		$flag = false;
	}
		if ($flag){
			$conn = connectDB();
			$query = "INSERT INTO tokokeren.pengguna (email, password, nama, jenis_kelamin, tgl_lahir, no_telp, alamat) VALUES ('$email', '$password', '$name', '$sex', '01-01-1991', '$phone', '$alamat')";
			$result = pg_query($conn, $query);

			$query = "INSERT INTO tokokeren.pelanggan (email, is_penjual, nilai_reputasi, poin) VALUES('$email', 'FALSE', '0', NULL)";
			$result = pg_query($conn, $query);

			$_SESSION['email'] = 'email';
			$_SESSION['real_email'] = $email;
			$_SESSION['role'] = "user";

			echo "<script>alert('Register berhasil!');window.location.href='pelanggan.php';</script>";
		}

 ?>
