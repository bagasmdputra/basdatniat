 <?php 
        $db = pg_connect('host=localhost dbname=c12 user=postgres password=basdat');

//        $pembeli =  $_SESSION['email']; 
        $no_invoice = "TS".rand(10000000,99999999) ;
        $tanggal = date("m-d-Y");
        $waktu_bayar = date("m-d-Y H:i:s") ;
        $status = 1;
        $email_pembeli = "aindrea336@gmail.com" ;
//        $email_pembeli = $_SESSION['email'];
        $nama_toko = $_POST['toko'];
        $alamat_kirim = $_POS['alamat'];
        
        $no_resi = substr(md5(microtime()),rand(0,26),3) . rand(1000000000000,9999999999999);
        $nama_jasa_kirim = $_POST['jasa_kirim'];

        $biaya_kirim = $_POS['biaya'];
        
        $total_bayar= $_POST['total_bayar'];
        
        

      echo  $kode_produk. $berat.$kuantitas. $harga.$sub_total;

        
        $query = "INSERT INTO tokokeren.keranjang_belanja(pembeli, kode_produk, berat, kuantitas, harga, sub_total) VALUES('" . $pembeli . "', '" . $kode_produk . "', '" . $berat . "', '" .$kuantitas. "', '" .$harga. "', '". $sub_total . "')";
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

        pg_close(); 
        ?> 