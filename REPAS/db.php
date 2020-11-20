<?php
 	$server='localhost';
 	$username='root';
 	$password='';
 	$database='murias_users';

try{
$conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
}catch(PDOException $e){
die('Conexion Failed' .$e->getMessage());
}




 ?>