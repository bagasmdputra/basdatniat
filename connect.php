<?php
    session_start();

    function connectDB() {


        // Create connection
        $db = pg_connect('host=dbpg.cs.ui.ac.id dbname=c212 user=c212 password=bdc1222016');

        // Check connection
        if(!$db) {
          echo "Error : Unable to open database\n";
        } else {
          echo "\n";
          $setsearchpath = "SET search_path to TOKOKEREN";
          pg_query($db, $setsearchpath);
          return $db;
        }
    }

?>
