 <?php 
session_start();
        $db = pg_connect('host=localhost dbname=c12 user=postgres password=basdat');

//        $pembeli =  $_SESSION['email']; 
        $pembeli = "aindrea336@gmail.com" ;
        $kode_produk = $_POST['kode'];
        $berat = pg_escape_string($_POST['berat_total']);
        $kuantitas= pg_escape_string($_POST['kuantitas']);
        $harga = pg_escape_string($_POST['harga']);
        $sub_total = 0;
        $sub_total = $harga * $kuantitas;
        
        
//echo         $pembeli = "aindrea336@gmail.com" ;
      echo  $kode_produk. $berat.$kuantitas. $harga.$sub_total;

        
        $query = "INSERT INTO tokokeren.keranjang_belanja(pembeli, kode_produk, berat, kuantitas, harga, sub_total) VALUES('" . $pembeli . "', '" . $kode_produk . "', '" . $berat . "', '" .$kuantitas. "', '" .$harga. "', '". $sub_total . "')";
        $result = pg_query($query); 

        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
  header("Location: ../index.php");

//        printf ("These values were inserted into the database - %s %s %s", $no_invoice, $tanggal, $waktu_bayar);

        ?> 