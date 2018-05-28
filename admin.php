<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || Prestashop recargado</title>
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
          <li><a href="orders.php">Mis Ordeness</a></li>
          <li><a href="contact.php">Contacto</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">Mi cuenta</a></li>';
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
        <h3>Holi Admin!</h3>
        <?php
        inclue "config.php";
          $result = consulta("SELECT * from products order by id asc");
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$result[$i]['product_img_name'].'"/>';
              echo '<p><strong>Product Code</strong>: '.$result[$i]['product_code'].'</p>';
              echo '<p><strong>Description</strong>: '.$result[$i]['product_desc'].'</p>';
              echo '<p><strong>Units Available</strong>: '.$result[$i]['qty'].'</p>';
              echo '<div class="large-6 columns" style="padding-left:0;">';
              echo '<form method="post" name="update-quantity" action="admin-update.php">';
              echo '<p><strong>Nueva Cantidad</strong>:</p>';
              echo '</div>';
              echo '<div class="large-6 columns">';
              echo '<input type="number" name="quantity[]"/>';

              echo '</div>';
              echo '</div>';
            }
          }
        ?>



      </div>
    </div>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <center><p><input style="clear:both;" type="submit" class="button" value="Actualizar"></p></center>
        </form>
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
