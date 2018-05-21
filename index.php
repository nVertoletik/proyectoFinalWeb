<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prestashop recargado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <h2>Inicia sesión</h2>
    <div class="inicio_sesion">
        <form action="inicio_sesion.php" method="post">
            <div class="inicio_usuario">
                Usuario
                <br/>
                <input type="text" name="inicio_nombre" required placeholder="Nombre de usuario">
                <br/>
            </div>
            <div class="inicio_contrasenia">
                Contraseña
                <br/>
                <input type="password" name="inicio_contrasenia" required placeholder="Contraseña" autocomplete="off">
            </div>
            <div>
                <input type="submit" value="Iniciar sesión">
            </div>
        </form>
    </div>

    <h2>Registro</h2>
    <div class="registro">
        <form action="registro_usuario.php" method="POST">
            <div class="registro_nombre">
                Nombre
                <br/>
                <input type="text" name="registro_nombre" required placeholder="Nombre">
                <br/>
            </div>
            <div>Apellido paterno
                <br/>
                <input type="text" name="registro_apellidoPaterno" required placeholder="Apellido Paterno">
                <br/>
            </div>
            <div>
                Apellido materno
                <br/>
                <input type="text" name="registro_apellidoMaterno" required placeholder="Apellido Materno">
                <br/>
            </div>
            <div>
                Telefono
                <br/>
                <input type="tel" name="registro_telefono" required placeholder="55123456">
                <br/>
            </div>
            <div>
                Correo
                <br/>
                <input type="email" name="registro_correo" required placeholder="correo@correo.com">
                <br/>
            </div>
            <div>Usuario
                <br/>
                <input type="text" name="registro_usuario" required placeholder="nombreDeUsuario">
                <br/>
            </div>
            <div>Contraseña
                <br/>
                <input type="password" name="registro_contrasenia" autocomplete="off" required placeholder="Contraseña">
                <br/>
            </div>
            <div>
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>

</body>

</html>