<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Productos || Prestashop recargado</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Prestashop recargado</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
        <ul class="right">
        <li><a href="about.php">Acerca</a></li>
          <li class="active"><a href="products.php">Productos</a></li>
          <li><a href="cart.php">Carrito</a></li>
          <li><a href="orders.php">Mis Ordenes</a></li>
          <li><a href="contact.php">Contacto</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">Mi Cuenta</a></li>';
            echo '<li><a href="logout.php">Cerrar sesión</a></li>';
          }
          else{
            echo '<li><a href="login.php">Iniciar sesión</a></li>';
            echo '<li><a href="register.php">Registrar</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = consulta('SELECT * FROM products');
          if($result == FALSE){
		echo "Ocurrio un error al mostrar los productos";
          }

          if($result){
            while(i < sizeof($result)) {

              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$result[$i]['product_img_name'].'"/>';
              echo '<p><strong>Product Code</strong>: '.$result[$i]['product_code'].'</p>';
              echo '<p><strong>Description</strong>: '.$result[$i]['product_desc'].'</p>';
              echo '<p><strong>Units Available</strong>: '.$result[$i]['qty'].'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$result[$i]['price'].'</p>';



              if($result[i]['qty'] > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$result[$i]['id'].'"><input type="submit" value="Agregar producto" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>

        <div class="row" style="margin-top:10px;">
          <div class="small-12">




        <footer style="margin-top:10px;">
        <p style="text-align:center; font-size:0.8em;">&copy;Prestashop recargado. Todos los derechos reservados.</p>
        </footer>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
