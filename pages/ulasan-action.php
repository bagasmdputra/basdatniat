<?php
require "../../connect.php";
?>

<h2>Daftar Produk Dibeli</h2>
<hr/>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $kode_produk = pg_escape_string($_POST["kode-produk"]);
    $rating = pg_escape_string($_POST["rating"]);
    $komentar = pg_escape_string($_POST["komentar"]);
    $date = date("Y-m-d");

    if (is_logged_in_user_admin()) {
      session_start();
      session_destroy();
      header("Location: login.php");
    }

    $user_email = get_logged_in_user_email();

    $query = "INSERT INTO  ulasan (email_pembeli, kode_produk, tanggal, rating, komentar)
                                VALUES('$user_email', '$kode_produk', '$date', '$rating', '$komentar')";

    $db_conn = connectDB();
    $result = pg_query($db_conn, $query);

    if (!$result)
    {
        echo pg_last_error($db_conn);
    }
    else
    {
        header("Location: index.php");
    }
}
