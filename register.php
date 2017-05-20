<?php

if (isset($_POST['register-submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['fullname'];
		$email = $_POST['email'];
		$repeat_email = $_POST['repeat_email'];
		$repeat_password = $_POST['confirm-password'];
		$no_identitas = $_POST['no_identitas'];
		$birth_date = $_POST['birth_date'];
		$flag = true;

			if ($username == ""){
		echo '<script>$("#alert-username").html("Username Masih Kosong");</script>';
		$flag = false;
	} if ($username != "" && !preg_match("/^[A-Za-z0-9.]*$/", $username)){
		echo "<script> $('#alert-username').html('Username hanya dapat berisi huruf, titik dan angka');</script>";
		$flag = false;
	} if ($username != ""){
		$conn = connectDB();
		$query = "SELECT * FROM tokokeren.pengguna WHERE username = '$username'";
		$result = pg_query($conn, $query);
		while ($row = pg_fetch_assoc($result)) {
			echo '<script>$("#alert-username").html("Username Sudah Ada !");</script>';
			$flag = false;
		}
	}    if ($email != ""){
		$conn = connectDB();
		$query = "SELECT * FROM tokokeren.pengguna WHERE email = '$email'";
		$result = pg_query($conn, $query);
		while ($row = pg_fetch_assoc($result)) {
			echo '<script>$("#alert-email").html("Email sudah terdaftar coba  login atau masukan email  !");</script>';
			$flag = false;
		}
	}
	if ($password == ""){
		echo '<script>$("#alert-password").html("Password tidak boleh kosong");</script>';
		$flag = false;
	} if ($name == ""){
		echo '<script>$("#alert-name").html("Nama tidak boleh kosong");</script>';
		$flag = false;
	} if ($email == ""){
		echo '<script>$("#alert-email").html("Email tidak boleh kosong");</script>';
		$flag = false;
	} if ($address == ""){
		echo '<script>$("#alert-address").html("Harap isi alamat");</script>';
		$flag = false;
	} if ($password != "" && !preg_match("/^[A-Za-z0-9]{6,}$/", $password)) {
		echo "<script>$('#alert-password').html('Password minimal 6 karakter');</script>";
		$flag = false;
		} if ($password != "" && $repeat_password != "" && $password !== $repeat_password){
		echo "<script>$('#alert-repeat-password').html('Harap masukkan password kembali');</script>";
		$flag = false;
		} if ($email != "" && $repeat_email != "" && $email !== $repeat_email){
		echo "<script>$('#alert-repeat-email').html('Harap masukkan e-mail kembali');</script>";
		$flag = false;
		}

		if ($flag){
			$conn = connectDB();
			$query = "INSERT INTO SIRIMA.AKUN (username, role, password) VALUES ('$username', false, '$password')";
			$result = pg_query($conn, $query);

			$query = "INSERT INTO SIRIMA.PELAMAR (username, nama_lengkap, alamat, jenis_kelamin, tanggal_lahir, no_ktp, email) VALUES('$username', '$name', '$address', '$jenis_kelamin', '$birth_date', '$no_identitas', '$email')";
			$result = pg_query($conn, $query);

			$_SESSION['username'] = $username;
			$_SESSION['role'] = "user";
			echo "<script>alert('Registrasi Berhasil!');window.location.replace('pelamarpage.php')";
		}
	}

 ?>
