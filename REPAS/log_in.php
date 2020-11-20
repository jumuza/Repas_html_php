<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('location:  /REPAS');
  }

  require 'db.php';

    $message = '';

  if(!empty($_POST['email']) && !empty($_POST['password'])){
    $consulta = $conn->prepare('SELECT id,password FROM users WHERE email=:email');
  	$consulta->bindParam(':email',$_POST['email']);
    $consulta->execute();
    $result = $consulta->fetch(PDO::FETCH_ASSOC);

    if (count($result) > 0 ) {
      $_SESSION['user_id'] = $result['id'];
      header('location:  /REPAS');
    } else {
      $message = 'Sorry, your credentials do not match';
    }

  }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ACCESS</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">

  </head>
  <body>

      <?php require 'codi/he.php' ?>

    <h1>ACCESS</h1>
    <span> O <a href="registry.php">REGISTER</a> </span>

    <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
    <?php endif; ?>


    <form action="log_in.php" method="post">
      <input type="text" name="email" placeholder="Put your email">
      <input type="password" name="password" placeholder="Enter your password">
      <input type="submit" value="SEND">

    </form>
  </body>
    
</html>
