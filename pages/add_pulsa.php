 <?php
        session_start();
        $db = pg_connect('host=dbpg.cs.ui.ac.id dbname=c212 user=c212 password=bdc1222016');

        $no_invoice =  "TP".rand(10000000,99999999);
        $tanggal = date("m-d-Y");
        $waktu_bayar = date("m-d-Y H:i:s") ;
        $status = 1;
        $total_bayar = pg_escape_string($_POST['harga']);
        $email_pembeli =  $_SESSION['email'];
//    $email_pembeli = "aindrea336@gmail.com";
        $nominal = pg_escape_string($_POST['nominal']);
        $nomor = pg_escape_string($_POST['nomor']);
        $kode_produk = pg_escape_string($_POST['kode']);


        if(!preg_match('/^(\d{12}(\d{20})?)?$/',$nomor)){
            $error = "Data tidak valid, digit nomor anda tidak sesuai";
            $_SESSION['message'] = $error;
            header("Location: ". $_SERVER['HTTP_REFERER']);
            exit();
        }

        echo "INSERT INTO  transaksi_pulsa(no_invoice, tanggal, waktu_bayar, status, total_bayar, email_pembeli, nominal, nomor, kode_produk) VALUES('" . $no_invoice . "', '" . $tanggal . "', '" . $waktu_bayar . "', '" .$status. "', " .$total_bayar. ", '". $email_pembeli ."', " .$nominal. ", ".$nomor. ", '".$kode_produk. "')";


        $query = "INSERT INTO  transaksi_pulsa(no_invoice, tanggal, waktu_bayar, status, total_bayar, email_pembeli, nominal, nomor, kode_produk) VALUES('" . $no_invoice . "', '" . $tanggal . "', '" . $waktu_bayar . "', '" .$status. "', " .$total_bayar. ", '". $email_pembeli ."', " .$nominal. ", ".$nomor. ", '".$kode_produk. "')";
        $result = pg_query($query);

        if (!$result) {
            $errormessage = pg_last_error();
            echo "Error with query: " . $errormessage;
            exit();
        }
    $message="transaksi berhasil dilakukan";
     $_SESSION['message'] = $message;
      header("Location: ../index.php");
        printf ("These values were inserted into the database - %s %s %s", $no_invoice, $tanggal, $waktu_bayar);

        ?>
