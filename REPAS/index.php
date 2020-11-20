<?php

  session_start();

  require 'db.php';

   if(isset($_SESSION['user_id'])){
      $consulta = $conn->prepare('SELECT id,password FROM users WHERE id=:id');
      $consulta->bindParam('id',$_SESSION['user_id']);
      $consulta->execute();
      $result = $consulta->fetch(PDO::FETCH_ASSOC);

   if (count($result) > 0) {
       $user = $result;
    }

  }


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
     <title>Repas_php_html</title>

   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="">
  </head>
   <body>
    <?php require 'codi/he.php' ?>

     <?php if (!empty($user)): ?>
       <br>Welcome. <?= $user['email'] ?>
        <br>You have successfully accessed.
         <a href="log_out.php">EXIT</a>
     <?php else: ?>
       <h1>ACCESS OR SIGN UP</h1>
       <a href="log_in.php">ACCESS</a>
       <a href="registry.php">REGISTRY</a>
     <?php endif; ?>



    </body>
</html>
