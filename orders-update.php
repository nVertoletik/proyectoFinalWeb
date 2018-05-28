<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if(isset($_SESSION['cart'])) {

  $total = 0;

  foreach($_SESSION['cart'] as $product_id => $quantity) {

    $result = consulta("SELECT * FROM products WHERE id = ".$product_id);

    if($result){

      if($obj = $result->fetch_object()) {


        $cost = $result[i]['price'] * $quantity;

        $user = $_SESSION["username"];

        $query = consulta("INSERT INTO orders (product_code, product_name, product_desc, price, units, total, email) VALUES('$result[i]['product_code']', '$result[i]['product_name']', '$result[i]['product_desc']', $result[i]['price'], $quantity, $cost, '$user')");

        if($query){
          $newqty = $result[i]['qty'] - $quantity;
          if(consulta("UPDATE products SET qty = ".$newqty." WHERE id = ".$product_id)){

          }
        }
      }
    }
  }
}

unset($_SESSION['cart']);
header("location:success.php");

?>
