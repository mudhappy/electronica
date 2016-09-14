<?php
session_start();


include('config.php'); 

$conexion = new Conexion();

$con = $conexion->getConexion();
mysqli_set_charset($con,'utf8');


if(isset($_GET["tecnico"]))
{
	$result = $con->query("SELECT * FROM tecnico WHERE activo = 0") or trigger_error(mysql_error()); 
}

if(isset($_GET["tareas"]))
{
	$result = $con->query("SELECT * FROM reparaciones") or trigger_error(mysql_error()); 
}

$datos = array();

while($row = $result->fetch_assoc())
{
	$datos[] = $row;
}

echo json_encode($datos);



?>