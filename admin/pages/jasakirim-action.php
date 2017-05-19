<?php
require "../../connect.php";
$is_page_requires_login = TRUE; // if this value is TRUE, the visitor will be redirected immediately to the login page

?>

<h2>Form Membuat Jasa Kirim</h2>
<hr/>
<?php

        header("Location: index.php"); // prevent normal user from accessing this page

	$query = "SELECT nama FROM tokokeren.jasa_kirim";
	$db_conn = connectDB();
	$namaTmp = pg_query($db_conn, $query);
	$resultNama = pg_fetch_all($namaTmp);

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$nama = pg_escape_string($_POST["namaJasaKirim"]);
		$lamaKirim = pg_escape_string($_POST["lamaKirim"]);
		$tarif = pg_escape_string($_POST["tarif"]);

		$db_conn = connectDB();

        $query = "INSERT INTO tokokeren.jasa_kirim (nama, lama_kirim, tarif)
                      VALUES ('$namaJasaKirim', '$lamaKirim', '$tarif')";

        $result = pg_query($db_conn, $query);

        if (!$result)
        {
            $error_message = pg_last_error($db_conn);
            echo "<div class=\"alert alert-danger\">$error_message</div>";
        }
        else
        {
            echo "<div class=\"alert alert-success\">Jasa Kirim telah dimasukkan kedalam database</div>";
        }
	}
?>
