<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$opwd = $_POST["opwd"];
$pwd = $_POST["pwd"];


if($fname!=""){
  $result = consulta('UPDATE users SET fname ="'. $fname .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($lname!=""){
  $result = consulta('UPDATE users SET lname ="'. $lname .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($address!=""){
  $result = consulta('UPDATE users SET address ="'. $address .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($city!=""){
  $result = consulta('UPDATE users SET city ="'. $city .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($pin!=""){
  $result = consulta('UPDATE users SET pin ='. $pin .' WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($email!=""){
  $result = consulta('UPDATE users SET email ="'. $email .'" WHERE id ='.$_SESSION['id']);
  if($result) {
  }
}
if($pwd!=""){
  $query = consulta('UPDATE users SET password ="'. $pwd .'" WHERE id ='.$_SESSION['id']);
  if($query){
  }
}

header("location:success.php");


?>
