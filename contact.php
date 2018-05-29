<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto || Prestashop recargado</title>
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
          <li class="active"><a href="contact.php">Contacto</a></li>
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




    <div class="row" style="margin-top:30px;">
      <div class="small-12">

        <p>Manda un correo a <a href="mailto:soporte@prestashopRecargado.com">soporte@prestashopRecargado.com</a></p>

        <footer>
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
