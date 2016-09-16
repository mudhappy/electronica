<?php 

session_start();

include('config.php'); 

$conexion = new Conexion();

$con = $conexion->getConexion();
mysqli_set_charset($con,'utf8');

$data = json_decode(file_get_contents("php://input"));

if(isset($_GET["terminado"]))
{
	$orden = $data->orden;
	$valor = $data->valor;
	$con->query("UPDATE reparaciones SET entregado = '".$valor."' WHERE orden = '".$orden."' ");
}

if(isset($_GET["eliminarEquipo"]))
{
	$orden = $data->orden;
	$con->query("DELETE FROM reparaciones WHERE orden = '".$orden."' ");
}


if(isset($_GET["eliminarEntregados"]))
{
	$con->query("DELETE FROM reparaciones WHERE entregado = '1' ");
}





?>