<?php
function consulta($consulta){
	$con = pg_connect("host=127.0.0.1 port=5432 dbname=prestashop user=prestashop_usuario password='contraseniaPrestashop'") or die("No se puede establecer conexion a la BD");
	$query = pg_query($con,$consulta);
	$resp = pg_fetch_all($query);
	return $resp;
}
?>
