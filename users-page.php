<?php
     session_start();

     if(empty($_SESSION["unique_id"])) {
          header("Location: registration.html");
          exit();
     }

     include_once "php/database.php";

     $unique_id = $_SESSION["unique_id"];

     $sql_query = "SELECT * FROM users WHERE unique_user_id = ?";

     $stmt = $conn->prepare($sql_query);
     $stmt->bind_param("i", $unique_id);
     $stmt->execute();

     $result = $stmt->get_result();

     $row =  $result->fetch_assoc();

     $username = $row["username"];
     $status = $row["stat"];

     $img = (is_null($row["img"])) ? "default.jpg" : $row["img"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Users Page</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <div class="container user-container">
          <section class="user-info">
               <img src="php/images/<?php echo $img; ?>" alt="" id="user-img">
               <header class="details self">
                    <span class="info username"><?php echo $username; ?></span>
                    <span class="info status"><?php echo $status ?></span>
               </header>
               <input type="submit" class="submit-btn" value="Log out">
          </section>

          <section class="searchBar">
                    <input type="text" placeholder="Search User" class="text-field search-field">
                    <i class="fa-solid fa-search"></i>
          </section>

          <section class="users-list">
          </section>
     </div>

     <script src="js/users.js"></script>
</body>
</html>