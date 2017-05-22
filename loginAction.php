<?php
    require 'connect.php';
    $db = connectDB();
    if (isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $isAdmins = isAdmin($db, $email, $password);
        if ($isAdmins == true){
            header("Location: admin/index.php");
        }

        $sql = 'SELECT * FROM PENGGUNA as PG, PELANGGAN as PL WHERE PG.email = PL.email and PL.is_penjual = FALSE';
        $resultPelanggan = pg_query($db, $sql);
        // Check connection
        if (!$db) {
            die("Connection failed ");
        }

        if ($resultPelanggan> 0) {
            // output data of each row
            while($row = pg_fetch_assoc($resultPelanggan)) {
                if($row['email'] == $email && $row['password'] == $password ){
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = 'pelanggan';
                    $_SESSION['real_email'] = $email;
                    header("Location: pelanggan.php");
                    break;
                }
            }
        }

        $sql = 'SELECT * FROM PENGGUNA as PG, PELANGGAN as PL WHERE PG.email = PL.email and PL.is_penjual = TRUE';
        $resultPenjual = pg_query($db, $sql);
        // Check connection
        if (!$db) {
            die("Connection failed ");
        }

        if ($resultPenjual> 0) {
            // output data of each row
            while($row = pg_fetch_assoc($resultPenjual)) {
                if($row['email'] == $email && $row['password'] == $password ){
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = 'penjual';
                    $_SESSION['real_email'] = $email;
                    header("Location: index.php");
                    break;
                }
            }
        }
        echo "<script>alert('Wrong username or password!');window.location.href='login.php';</script>";

        pg_close($db);
    }

    function isAdmin($db, $email, $password){
        $getAdmin = 'SELECT * FROM PENGGUNA P WHERE P.email NOT IN (SELECT email FROM PELANGGAN)';
        $result = pg_query($db, $getAdmin);


        // Check connection
        if (!$db) {
            die("Connection failed ");
        }

        if ($result > 0) {
            // output data of each row
            while($row = pg_fetch_assoc($result)) {
                if($row['email'] == $email && $row['password'] == $password ){
                    $_SESSION['email'] = "email";
                    $_SESSION['role'] = 'admin';
                    $_SESSION['real_email'] = $email;
                    pg_close($db);
                    return true;
                }
            }
        }

        return false;

    }

?>
