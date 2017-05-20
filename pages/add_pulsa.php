 <?php 
        $db = pg_connect('host=localhost dbname=c12 user=postgres password=basdat');

        $no_invoice = 5415116165 ;
        $tanggal = date("d-m-Y");
        $waktu_bayar = date("d-m-Y H:i:s") ;
        $status = 1;
        $total_bayar = pg_escape_string($_POST['harga']);
        $email_pembeli =  $_SESSION['email']; 
        $nominal = pg_escape_string($_POST['nomor']);
        $nomor = pg_escape_string($_POST['nomor']);
        echo $nomor;
        $kode_produk = pg_escape_string($_POST['kode']); 

    
//        $query = "INSERT INTO transaksi_pulsa(firstname, surname, emailaddress) VALUES('" . $firstname . "', '" . $surname . "', '" . $emailaddress . "')";
//        $result = pg_query($query); 
//
//        if (!$result) { 
//            $errormessage = pg_last_error(); 
//            echo "Error with query: " . $errormessage; 
//            exit(); 
//        } 
//
//        printf ("These values were inserted into the database - %s %s %s", $firstname, $surname, $emailaddress);
        pg_close(); 
        ?> 