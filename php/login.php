<?php 
session_start();

$data = json_decode(file_get_contents("php://input"));

$usuario = addslashes(htmlspecialchars($data->usuario));
$clave =addslashes(htmlspecialchars($data->clave));

include("config.php");

$conexion = new Conexion();

$con = $conexion->getConexion();
mysqli_set_charset($con,'utf8');

$result = $con->query('SELECT * FROM tecnico WHERE usuario = "'.$usuario.'" AND clave = "'.$clave.'" ')  or trigger_error(mysql_error());

$acceso = false;

while($row = $result->fetch_assoc())
{
	$acceso = true;
	$_SESSION["celular"] = $row["celular"];
	$_SESSION["usuario"] = $row["usuario"];
	$_SESSION["id"] = $row["id"];
}


echo json_encode($acceso);


?>