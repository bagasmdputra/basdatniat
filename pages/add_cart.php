 <?php
        session_start();
        $db = pg_connect('host=dbpg.cs.ui.ac.id dbname=c212 user=c212 password=bdc1222016');
        $setsearchpath = "SET search_path to TOKOKEREN";
        pg_query($db, $setsearchpath);

        $no_invoice = "TS".rand(10000000,99999999) ;
        $tanggal = date("m-d-Y");
        $waktu_bayar = date("m-d-Y H:i:s") ;
        $status = 1;
//        $email_pembeli = "aindrea336@gmail.com" ;
        $email_pembeli = $_SESSION['email'];
        $nama_toko = $_SESSION['toko'];
//        $nama_toko = $_SESSION['toko'];
        $alamat_kirim = $_POST['alamat'];
//        echo $alamat_kirim."  ".$_SESSION['toko'];;

        $random_string_length = 4;
        $characters = 'abcdefghijklmnopqrstuvwxyz';
         $string = '';
         $max = strlen($characters) - 1;
         for ($i = 0; $i < $random_string_length; $i++) {
              $string .= $characters[mt_rand(0, $max)];
         }
        $num = rand(100000,999999);

        $no_resi = $string . $num . $num;
        $nama_jasa_kirim = $_POST['jasa_kirim'];

        $tarif_query = "SELECT tarif AS sum_tarif FROM TOKOKEREN.JASA_KIRIM WHERE nama = '$nama_jasa_kirim';";
                    $result = pg_query($db, $tarif_query);
                    $tarif = pg_fetch_all($result)[0]['sum_tarif'];

        echo $tarif;
        $biaya_kirim = $_POST['total_berat'] * $tarif;

        $total_bayar= $_POST['total_biaya'] + $biaya_kirim;


        $query = "INSERT INTO  TRANSAKSI_SHIPPED(no_invoice,tanggal, waktu_bayar, status, total_bayar, email_pembeli, nama_toko, alamat_kirim, biaya_kirim, no_resi, nama_jasa_kirim) VALUES('" . $no_invoice . "', '" . $tanggal . "', '" . $waktu_bayar . "', '" . $status . "', '" . $total_bayar . "', '" . $email_pembeli . "', '" . $nama_toko . "', '" . $alamat_kirim . "', '" . $biaya_kirim . "', '" . $no_resi . "', '" . $nama_jasa_kirim . "')";


        $result = pg_query($query);

        if (!$result) {
            $errormessage = pg_last_error();
            echo "Error with query: " . $errormessage;
            exit();
        }

 $query = "
        SELECT *
        FROM  KERANJANG_BELANJA a LEFT JOIN  PRODUK  b ON a.kode_produk = b.kode_produk
        WHERE pembeli='$email_pembeli'
        ORDER BY a.kode_produk ASC";

    $result3 = pg_query($query);
    if (!$result3) {
        echo "Problem with query " . $query . "<br/>";
        echo pg_last_error();
        exit();
    }

    while($myrow = pg_fetch_assoc($result3)) {

        $insert_query = "INSERT INTO  \"list_item\"(no_invoice,kode_produk, berat, kuantitas, harga, sub_total) VALUES('" .
                $no_invoice . "', '" .
                $myrow['kode_produk']. "', '" .
                $myrow['berat']. "', '" .
                $myrow['kuantitas']. "', '" .
                $myrow['harga']. "', '" .
                $myrow['sub_total']. "')";
            $result = pg_query($db, $insert_query);

    if (!$result) {
        echo "Problem with query " . $query . "<br/>";
        echo pg_last_error();
        exit();
    }

    }

        $query = "DELETE FROM  KERANJANG_BELANJA WHERE pembeli='$email_pembeli'";
            $result = pg_query($db, $query);
    if (!$result) {
        echo "Problem with query " . $query . "<br/>";
        echo pg_last_error();
        exit();
    }
            $message = "Selamat, transaksi Anda Berhasil";
            $_SESSION['message'] = $message;
  header("Location: ../index.php");
        ?>
