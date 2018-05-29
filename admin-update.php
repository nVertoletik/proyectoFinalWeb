<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';

$_SESSION["products_id"] = array();
$_SESSION["products_id"] = $_REQUEST['quantity'];


$result = consulta("SELECT * FROM products ORDER BY id asc");
$i=0;
$x=1;

if($result != FALSE) {
  for(;$i <sizeof($result); $i++) {
    if(empty($_SESSION["products_id"][$i])) {
      $x++;
    }
    else {
      $newqty = $result[$i]['qty'] + $_SESSION["products_id"][$i];
      if($newqty < 0) $newqty = 0;
      $update = consulta("UPDATE products SET qty =".$newqty." WHERE id =".$x);
      if($update)
        echo 'Data Updated';

      $x++;
    }
  }
}



header ("location:success.php");



?>
