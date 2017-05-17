<?php
    require 'connect.php';
    $db = connectDB();
    if (isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $isAdmin = isAdmin($db, $email, $password);
        if ($isAdmin == true){
            header("Location: ..\index.php");
        }

        $sql = 'SELECT * FROM PENGGUNA';
        $result = pg_query($db, $sql);

        // Check connection
        if (!$db) {
            die("Connection failed ");
        }

        if ($result> 0) {
            // output data of each row
            while($row = pg_fetch_assoc($result)) {
                if($row['email'] == $email && $row['password'] == $password ){
                    $_SESSION['email'] = "email";
                    $_SESSION['role'] = 'user';
                    $_SESSION['real_email'] = $email;
                    header("Location: products.php");
                    break;
                }
            }
        }

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
