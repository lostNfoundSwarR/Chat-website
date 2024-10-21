<?php
     session_start();

     include_once "database.php";

     $unique_id = $_SESSION["unique_id"];
     $status = "Active";

     $sql_query = "UPDATE users SET stat = ? WHERE unique_user_id = ?";

     try {
          $stmt = $conn->prepare($sql_query);
          $stmt->bind_param("si", $status, $unique_id);
          $stmt->execute();
     }
     catch(mysqli_sql_exception $e) {
          echo "Something went wrong";
     }
?>