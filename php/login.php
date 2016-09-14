<?php 
session_start();

$data = json_decode(file_get_contents("php://input"));

$usuario = addslashes(htmlspecialchars($data->usuario));
$clave =addslashes(htmlspecialchars($data->clave));

include("config.php");

$result = mysql_query('SELECT * FROM tecnico WHERE usuario = "'.$usuario.'" AND clave = "'.$clave.'" ')  or trigger_error(mysql_error());

$acceso = false;

if($row = mysql_fetch_array($result))
{
	$acceso = true;
	$_SESSION["celular"] = $row["celular"];
	$_SESSION["usuario"] = $row["usuario"];
	$_SESSION["id"] = $row["id"];
}

echo json_encode($acceso);


?>