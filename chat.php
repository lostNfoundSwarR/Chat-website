<?php
     session_start();

     include_once "php/database.php";

     $receiver_unique_id = $_GET["user_id"];
     $sender_unique_id = $_SESSION["unique_id"];

     $sql_query = "SELECT * FROM users WHERE unique_user_id = ?";

     try {
          $stmt = $conn->prepare($sql_query);
          $stmt->bind_param("i", $receiver_unique_id);
          $stmt->execute();

          $result = $stmt->get_result();

          $row = $result->fetch_assoc();

          $img = (is_null($row["img"])) ? "default.jpg" : $row["img"];
     }
     catch(mysqli_sql_exception $e) {
          echo "Something went wrong";
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Chat</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <div class="container chat-container user-container">
          <section class="user-info">
               <a href="users-page.php"><i class="fa-solid fa-arrow-left"></i></a>
               <img src="php/images/<?php echo $img ?>" alt="">
               <header class="details self"> <!-- "self" doesn't mean "you" here, it means "them" -->
                    <span class="info username"><?php echo $row["username"] ?></span>
                    <span class="info status"><?php echo $row["stat"] ?></span>
               </header>
          </section>

          <section class="message-box">
               <div class="message incoming-msg">
                    <img src="php/images/default.jpg" alt="">
                    <div>Hello</div>
               </div>

               <div class="message outgoing-msg">
                    <div>Hello</div>
               </div>

               <div class="message incoming-msg">
                    <img src="php/images/default.jpg" alt="">
                    <div>Hello</div>
               </div>

               <div class="message outgoing-msg">
                    <div>Hello</div>
               </div>

               <div class="message incoming-msg">
                    <img src="php/images/default.jpg" alt="">
                    <div>Hello</div>
               </div>

               <div class="message outgoing-msg">
                    <div>Hello</div>
               </div>

               <div class="message incoming-msg">
                    <img src="php/images/default.jpg" alt="">
                    <div>Hello</div>
               </div>

               <div class="message outgoing-msg">
                    <div>Hello</div>
               </div>

               <div class="message incoming-msg">
                    <img src="php/images/default.jpg" alt="">
                    <div>Hello</div>
               </div>

               <div class="message outgoing-msg">
                    <div>Hello</div>
               </div>

               <div class="message incoming-msg">
                    <img src="php/images/default.jpg" alt="">
                    <div>Hello</div>
               </div>

               <div class="message outgoing-msg">
                    <div>Hello</div>
               </div>

               <div class="message incoming-msg">
                    <img src="php/images/default.jpg" alt="">
                    <div>Hello</div>
               </div>

               <div class="message outgoing-msg">
                    <div>Hello</div>
               </div>

               <div class="message incoming-msg">
                    <img src="php/images/default.jpg" alt="">
                    <div>Hello</div>
               </div>

               <div class="message outgoing-msg">
                    <div>Hello</div>
               </div>
          </section>

          <form action="#" method="post" class="form send-msg">
               <input type="text" placeholder="Enter a message.." class="text-field" name="message">
               <button type="submit" class="submit-btn send-btn"><i class="fa-duotone fa-solid fa-paper-plane"></i></button>
          </form>
     </div>

     <script src="js/chat.js"></script>
</body>
</html>