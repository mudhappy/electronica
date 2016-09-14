<?php
session_start();


include('config.php'); 

if(isset($_GET["tecnico"]))
{
	$result = mysql_query("SELECT * FROM tecnico WHERE activo = 0") or trigger_error(mysql_error()); 
}

if(isset($_GET["tareas"]))
{
	$result = mysql_query("SELECT * FROM marca") or trigger_error(mysql_error()); 
}

##Devuelve arreglo

$datos = array();

while($row = mysql_fetch_array($result))
{
	$datos[] = $row;
}

echo json_encode($datos);



?>