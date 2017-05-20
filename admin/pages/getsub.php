<?php
   $conn= pg_connect("host=localhost dbname=c12 user=postgres password=basdat");
   $q= $_GET['q'];

 $query = "SELECT S.nama FROM Tokokeren.sub_kategori S, Tokokeren.kategori_utama K WHERE K.kode=S.kode_kategori AND K.nama ='".$q."'";
   $result = pg_query($conn,$query);
 while ($row = pg_fetch_assoc($result)) {
     echo "<option>".$row['nama']."</option>";
   }
?>
