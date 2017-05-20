 <?php 
        $db = pg_connect('host=localhost dbname=c12 user=postgres password=basdat');

        $no_invoice = 5415156165 ;
        $tanggal = date("m-d-Y");
        $waktu_bayar = date("m-d-Y H:i:s") ;
        $status = 1;
        $total_bayar = pg_escape_string($_POST['harga']);
//        $email_pembeli =  $_SESSION['email']; 
$email_pembeli = "aindrea336@gmail.com";
        $nominal = pg_escape_string($_POST['nominal']);
        $nomor = pg_escape_string($_POST['nomor']);
        $kode_produk = pg_escape_string($_POST['kode']); 
        
//echo         $no_invoice." ".$tanggal." ".$waktu_bayar." ".$status." ".$nominal." ".$total_bayar;

        
        $query = "INSERT INTO tokokeren.transaksi_pulsa(no_invoice, tanggal, waktu_bayar, status, total_bayar, email_pembeli, nominal, nomor, kode_produk) VALUES('" . $no_invoice . "', '" . $tanggal . "', '" . $waktu_bayar . "', '" .$status. "', '" .$total_bayar. "', '". $email_pembeli ."', '" .$nominal. "', '".$nomor. "', '".$kode_produk. "')";
        $result = pg_query($query); 

        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 

        printf ("These values were inserted into the database - %s %s %s", $no_invoice, $tanggal, $waktu_bayar);
        pg_close(); 
        ?> 