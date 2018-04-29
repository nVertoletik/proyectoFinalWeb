<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Inicio de sesión</title>
</head>
<body>
<?php
function validarUsuario($nombre, $contrasenia){
    if(!(empty($nombre) || empty($contrasenia)){
        return true;
    }
    else{
        return false;
    }
}

include_once("conexion.php");
if(!empty($_POST['inicio_nombre'])){
	$nombre = filter_var($_POST['inicio_nombre'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}
if(!empty($_POST['inicio_contrasenia'])){
    $contrasenia = md5($_POST['inicio_contrasenia']);
}

if(validarValores($nombre, $contrasenia)){
    $registro = "insert into usuarios (nombre,apaterno,amaterno,telefono, correo, contrasenia
, usuario) values('$nombre','$apellidoPaterno','$apellidoMaterno','$telefono','$correo', '$contrasenia', '$usuario')";
	$guarda_registro = consulta($registro);
	if($guarda_registro == false){
		echo "Datos ingresados de manera correcta";
	}
	else{
		echo "Hubo un error al intentar guardarel registro, intenta más tarde";
	}
}
else{
	echo "Los valores ingresados no son válidos";
}
?>

<br/>
<a href="registro.php">Regresar al formulario</a>

</body>
</html>