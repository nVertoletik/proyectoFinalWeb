<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acerca de nosotros || Prestashop recargado</title>
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
        <li><a href="acerca.php">Acerca de nosotros</a></li>
          <li><a href="productos.php">Productos</a></li>
          <li><a href="carrito.php">Carrito</a></li>
          <li><a href="ordenes.php">Mis Ordenes</a></li>
          <li><a href="contacto.php">Contacto</a></li>
          <?php
    
          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">Mi Cuenta</a></li>';
            echo '<li><a href="logout.php">Cerrar sesion</a></li>';
          }
          else{
            echo '<li><a href="login.php">Iniciar sesion</a></li>';
            echo '<li><a href="register.php">Registrarse</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p>Prestashop recargado es un proyecto de E-Commerce. Todos los productos listados son falsos.Este proyecto muestra la funcionalidad de un sitio de E-Commerce.</p>

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy;Prestashop. Todos los derechos reservados.</p>
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
