<!-- The following block is mandatory -->
<?php
require "../../connect.php";
$is_page_requires_login = TRUE; // if this value is TRUE, the visitor will be redirected immediately to the login page
?>

<h2>Form membuat Promo Produk</h2>
<hr>
<?php
        header("Location: index.php"); // prevent normal user from accessing this page


	$query_kategori = "SELECT * from  kategori_utama";
	$db_conn = connectDB();
	$result_kategori = pg_query($db_conn, $query_kategori);
	$kategori_utama = pg_fetch_all($result_kategori);

	$query_sub_kategori = "SELECT * from  sub_kategori";
	$db_conn = connectDB();
	$result_sub_kategori = pg_query($db_conn, $query_sub_kategori);
	$sub_kategori = pg_fetch_all($result_sub_kategori);

	$kode = generateRandomString();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$deskripsi = pg_escape_string($_POST["deskripsi"]);
		$periode_awal = pg_escape_string($_POST["periode-awal"]);
		$periode_akhir = pg_escape_string($_POST["periode-akhir"]);
		$kategori = pg_escape_string($_POST["kategori"]);
		$sub_kategori = pg_escape_string($_POST["sub-kategori"]);

		$id = getID();

		$query_insert_promo = "INSERT INTO  promo (id, deskripsi, periode_awal, periode_akhir, kode)
					VALUES('$id', '$deskripsi', '$periode_awal', '$periode_akhir', '$kode')";
		$db_conn = connectDB();
		$result_insert_promo = pg_query($db_conn, $query_insert_promo);

		if (!$result_insert_promo)
        {
            $error_message = pg_last_error($db_conn);
            echo "<div class=\"alert alert-danger\">$error_message</div>";
        }
        else
        {
            $query_select_kode_promo_sub = "SELECT DISTINCT kode_produk, kategori from  shipped_produk WHERE kategori = 'SK001'";
            $db_conn = connectDB();
            $result_query_kode_promo_sub = pg_query($db_conn, $query_select_kode_promo_sub);
            $result_query_kps = pg_fetch_all($result_query_kode_promo_sub);

        	foreach ($result_query_kps as $key => $value) {
        		$kode_produk = $value['kode_produk'];
        		$query_insert_promo_produk = "INSERT INTO  promo_produk (id_promo, kode_produk)
        									VALUES('$id', '$kode_produk')";
        		$db_conn = connectDB();
        		$result_insert_pp = pg_query($db_conn, $query_insert_promo_produk);
        	}

        	header("Location: index.php");
        }
	}

	function getID() {
		$prefix = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T");

		$query_count = "SELECT count(*) from  promo";
		$db_conn = connectDB();
		$result_query_count = pg_query($db_conn, $query_count);
		$count = pg_fetch_row($result_query_count);
		$count = $count[0];

		$alpha_mod = $prefix[$count / 100000];
		$numb = sprintf("%05d", $count % 100000);
		$id = $alpha_mod . $numb;
		return $id;
	}

	function generateRandomString($length = 20) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
?>
