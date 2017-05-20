 <?php 
        session_start();
        $db = pg_connect('host=localhost dbname=c12 user=postgres password=basdat');


        $no_invoice = "TS".rand(10000000,99999999) ;
        $tanggal = date("m-d-Y");
        $waktu_bayar = date("m-d-Y H:i:s") ;
        $status = 1;
        $email_pembeli = "aindrea336@gmail.com" ;
//        $email_pembeli = $_SESSION['email'];
        $nama_toko = $_SESSION['toko'];
        $alamat_kirim = $_POST['alamat'];
        echo $alamat_kirim."  ".$_SESSION['toko'];;
        $no_resi = substr(md5(microtime()),rand(0,26),3) . rand(1000000000000,9999999999999);
        $nama_jasa_kirim = $_POST['jasa_kirim'];
        
        $tarif_query = "SELECT tarif AS sum_tarif FROM TOKOKEREN.JASA_KIRIM WHERE nama = '$nama_jasa_kirim';";
                    $result2 = pg_query($db, $tarif_query);
                   

        $biaya_kirim = $_POST('total_berat') * $tarif;
        
        $total_bayar= $_POST['total_biaya'] + $biaya_kirim;
        
        

      echo "INSERT INTO tokokeren.TRANSAKSI_SHIPPED(no_invoice,tanggal, waktu_bayar, status, total_bayar, email_pembeli, nama_toko, alamat_kirim, biaya kirim, no_resi, nama_jasa_kirim) VALUES('" . $no_invoice . "', '" . $tanggal . "', '" . $waktu_bayar . "', '" . $status . "', '" . $total_bayar . "', '" . $email_pembeli . "', '" . $nama_toko . "', '" . $alamat_kirim . "', '" . $biaya_kirim . "', '" . $no_resi . "', '" . $nama_jasa_kirim . "')";

        
        $query = "INSERT INTO tokokeren.TRANSAKSI_SHIPPED(no_invoice,tanggal, waktu_bayar, status, total_bayar, email_pembeli, nama_toko, alamat_kirim, biaya kirim, no_resi, nama_jasa_kirim) VALUES('" . $no_invoice . "', '" . $tanggal . "', '" . $waktu_bayar . "', '" . $status . "', '" . $total_bayar . "', '" . $email_pembeli . "', '" . $nama_toko . "', '" . $alamat_kirim . "', '" . $biaya_kirim . "', '" . $no_resi . "', '" . $nama_jasa_kirim . "')";
        $result = pg_query($query); 

       

        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 


         $query = "
        SELECT * 
        FROM tokokeren.KERANJANG_BELANJA a LEFT JOIN tokokeren.PRODUK  b ON a.kode_produk = b.kode_produk
        WHERE pembeli='$email'
        ORDER BY a.kode_produk ASC"; 

        $result = pg_query($query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 


        ?> 