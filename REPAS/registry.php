<?php
  require 'db.php';

  $message = '';

  if(!empty($_POST['email']) && !empty($_POST['password'])){
    $sql = " INSERT INTO users (email, password) VALUES (:email, :password)";
    $var = $conn->prepare($sql);
    $var->bindParam(':email',$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $var->bindParam(':password',$password);

        if($var->execute()){
          $message = 'User Created Successfully';
        }else{
          $message = 'Sorry, there was an error creating your account';
        }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>REGISTRY</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

  </head>
  <body>

      <?php require 'codi/he.php' ?>

      <?php if(!empty($message)):?>
          <p> <?= $message ?> </p>
      <?php endif; ?>

      <h1>SIGN UP</h1>
      <span> O <a href="log_in.php">ACCESS</a> </span>
      <form action="registry.php" method="post">
        <input type="text" name="email" placeholder="Write your user">
        <input type="password" name="password" placeholder="Write your password">
        <input type="password" name="confirm-password" placeholder="Confirm your password ">
        <input type="submit" value="SEND">
      </form>

  </body>
</html>
