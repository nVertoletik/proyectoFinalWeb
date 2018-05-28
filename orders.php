<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mis Ordeness || Prestashop recargado</title>
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
      <!-- Right Nav Section -->
        <ul class="right">
        <li><a href="about.php">Acerca</a></li>
          <li><a href="products.php">Productos</a></li>
          <li><a href="cart.php">Carrito</a></li>
          <li class="active"><a href="orders.php">Mis Ordenes</a></li>
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
      <div class="large-12">
        <h3>Mis Ordeness</h3>
        <hr>

        <?php
          $user = $_SESSION["username"];
          $result = consulta("SELECT * from orders where email='".$user."'");
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<p><h4>Order ID ->'.$result[0]['id'].'</h4></p>';
              echo '<p><strong>Date of Purchase</strong>: '.$result[0]['date'].'</p>';
              echo '<p><strong>Product Code</strong>: '.$result[0]['product_code'].'</p>';
              echo '<p><strong>Product Name</strong>: '.$result[0]['product_name'].'</p>';
              echo '<p><strong>Price Per Unit</strong>: '.$result[0]['price'].'</p>';
              echo '<p><strong>Units Bought</strong>: '.$result[0]['units'].'</p>';
              echo '<p><strong>Total Cost</strong>: '.$result[0]['total'].'</p>';
              echo '<p><hr></p>';

            }
          }
        ?>
      </div>
    </div>




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
