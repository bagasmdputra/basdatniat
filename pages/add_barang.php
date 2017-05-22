 <?php
session_start();
$db = pg_connect('host=dbpg.cs.ui.ac.id dbname=c212 user=c212 password=bdc1222016');

        $pembeli =  $_SESSION['email'];
//        $pembeli = "aindrea336@gmail.com" ;
        $kode_produk = $_POST['kode'];
        $berat = pg_escape_string($_POST['berat_total']);
        $kuantitas= pg_escape_string($_POST['kuantitas']);
        $harga = pg_escape_string($_POST['harga']);
        $sub_total = 0;
        $sub_total = $harga * $kuantitas;
        echo $berat.$kuantitas;
    if($berat <=0 || $kuantitas <=0 ){
            $error = "Data tidak valid";
            $_SESSION['message'] = $error;
            header("Location: ". $_SERVER['HTTP_REFERER']);
            exit();

    }

//echo         $pembeli = "aindrea336@gmail.com" ;
      echo  $kode_produk. $berat.$kuantitas. $harga.$sub_total .$pembeli;


        $query = "INSERT INTO tokokeren.keranjang_belanja(pembeli, kode_produk, berat, kuantitas, harga, sub_total) VALUES('" . $pembeli . "', '" . $kode_produk . "', '" . $berat . "', '" .$kuantitas. "', '" .$harga. "', '". $sub_total . "')";
        $result = pg_query($query);

        if (!$result) {
            $errormessage = pg_last_error();
            echo "Error with query: " . $errormessage;
            $error = "Data tidak bisa diproses, Anda sudah membeli produk ini";
            $_SESSION['message'] = $error;
            header("Location: ". $_SERVER['HTTP_REFERER']);
            exit();
        }
            $message = "Produk berhasil ditambahkan ke Keranjang Belanja (Cart)";
            $_SESSION['message'] = $message;
  header("Location: ../index.php");

//        printf ("These values were inserted into the database - %s %s %s", $no_invoice, $tanggal, $waktu_bayar);

        ?>
