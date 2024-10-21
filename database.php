<?php
     $hostname = "localhost";
     $password = "tender_feeling";
     $username = "root";
     $database = "chatDataBase";

     try {
          $conn = mysqli_connect($hostname, $username, $password, $database);
     }
     catch(mysqli_sql_exception $e) {
          echo "Failed to connect to database";
     } 
?>