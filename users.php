<?php
     session_start();

     include_once "database.php";

     $sql_query = "SELECT * FROM users WHERE unique_user_id != ?";

     $output_html = "";

     try {
          $stmt = $conn->prepare($sql_query);
          $stmt->bind_param("i", $_SESSION["unique_id"]);
          $stmt->execute();

          $result = $stmt->get_result();

          if($result->num_rows == 1) {
               $output_html .= "No one is online";
          }
          else if($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                    $img = (is_null($row["img"])) ? "default.jpg" : $row["img"];

                    $output_html .= '<a href="chat.php?user_id=' . $row["unique_user_id"] . '" class="user">
                                        <header class="details other">
                                             <img src="php/images/' . $img . '" alt="">
                                             <div class="new-info">
                                                  <span class="info username">' . htmlspecialchars($row["username"]) . '</span>
                                                  <span class="last-msg">This is a test</span>
                                             </div>
                                             <i class="fa-solid fa-circle"></i>
                                        </header>
                                     </a>';
               }
          }

          echo $output_html;
     }
     catch(mysqli_sql_exception $e) {
          echo "Something went wrong";
     }
?>