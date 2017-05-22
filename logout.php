<?php
  require 'connect.php';
	session_unset();
 	session_destroy();

  echo "<script>alert('Logout berhasil!');window.location.href='index.php';</script>";
?>
