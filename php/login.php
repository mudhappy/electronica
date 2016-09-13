<?php 
session_start();

$data = json_decode(file_get_contents("php://input"));

$user = addslashes(htmlspecialchars($data->user));
$pass =addslashes(htmlspecialchars($data->pass));

include("config.php");

$result = mysql_query('SELECT * FROM tecnico WHERE user = "'.$user.'" AND pass = "'.$pass.'" ')  or trigger_error(mysql_error());

$acceso = false;

if($row = mysql_fetch_array($result))
{
	$acceso = true;
	$_SESSION["nombre"] = $row["nombre"];
	$_SESSION["celular"] = $row["celular"];
	$_SESSION["user"] = $row["user"];
}

echo json_encode($acceso);


?>