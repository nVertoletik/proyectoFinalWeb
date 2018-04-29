<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Registro</title>
</head>
<body>
<?php
function validarUsuario($nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $contrasenia, $usuario){
    if(!(empty($nombre) || !empty($apellidoPaterno) || !empty($apellidoMaterno) || !empty($telefono) || !empty($correo) ||
    !empty($usuario) || !empty($contrasenia)){
        return true;
    }
    else{
        return false;
    }
}
include_once("conexion.php");
if(!empty($_POST['registro_nombre'])){
	$nombre = filter_var($_POST['registro_nombre'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}
if(!empty($_POST['registro_apellidoPaterno'])){
	$apellidoPaterno = filter_var($_POST['registro_apellidoPaterno'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}
if(!empty($_POST['registro_apellidoMaterno'])){
	$apellidoMaterno = filter_var($_POST['registro_apellidoMaterno'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}
if(!empty($_POST['registro_telefono'])){
	$telefono = filter_var($_POST['registro_telefono'], FILTER_SANITIZE_NUMBER_INT);
}
if(!empty($_POST['registro_correo'])){
	$correo = filter_var($_POST['registro_correo'], FILTER_SANITIZE_EMAIL);
}
if(!empty($_POST['registro_contrasenia'])){ 
	$password = md5($_POST['registro_contrasenia']);
}
if(!empty($_POST['registro_usuario'])){
	$usuario = filter_var($_POST['registro_usuario'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}
if(validarUsuario($nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $correo, $password, $usuario)){
	$registro = "insert into prestashop_usuario (nombre,apaterno,amaterno,telefono,correo,contrasenia,usuario) values('$nombre','$apellidoPaterno','$apellidoMaterno','$telefono','$correo', '$password', '$usuario')";
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
<a href="index.php">Regresar al formulario</a>

</body>
</html>