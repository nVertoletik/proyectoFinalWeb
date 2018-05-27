<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
$flag = 'true';

function validarValores($nombre, $contrasenia){
    if(!(empty($nombre) || empty($contrasenia)){
        return true;
    }
    else{
        return false;
    }
}
function redirect() {
    echo '<h1>"Los valores ingresados no son válidos."</h1>';
    header("Refresh: 3; url=index.php");
  }
include_once("conexion.php");
if(!empty($_POST['inicio_nombre'])){
	$nombre = filter_var($_POST['inicio_nombre'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}
if(!empty($_POST['inicio_contrasenia'])){
    $contrasenia = md5($_POST['inicio_contrasenia']);
}

if(validarValores($nombre, $contrasenia)){
    $result = consulta("SELECT contrasenia,tipo FROM usuarios, tipo_usuario WHERE usuario = '$usuario'");
    $row = $result;
    if($row[0]['contrasenia'] == $password){
        $_SESSION['username'] = $usuario;
        $_SESSION['type'] = $row[0]['tipo'];
        header("location:index.php");
        }
        else{
            if($flag === 'true'){
                redirect();
                $flag = 'false';
              }
        }

}
else{
	redirect();
}
?>