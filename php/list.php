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
	//$result = $con->query("SELECT * FROM reparaciones 
	//	WHERE tecnico = ".$_SESSION['id']." 
	//	AND estado = 1 
	//	OR NOT estado = 5 
	//	ORDER BY orden ASC") 

	$result = $con->query("SELECT 
		rep.orden, 
		tip.nombre as tipoequipo, 
		mar.nombre as marca,
		rep.falla,
		est.nombre as estado,
		rep.fechaprometido,
		rep.presupuestoaceptado
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		WHERE rep.tecnico = '".$_SESSION['id']."' 
		AND rep.entregado = 0
		") or trigger_error(mysql_error()); 
}

if(isset($_GET["terminados"]))
{
	//$result = $con->query("SELECT * FROM reparaciones 
	//	WHERE tecnico = ".$_SESSION['id']." 
	//	AND estado = 1 
	//	OR NOT estado = 5 
	//	ORDER BY orden ASC") 

	$result = $con->query("SELECT 
		rep.orden, 
		tip.nombre as tipoequipo, 
		mar.nombre as marca,
		rep.falla,
		est.nombre as estado,
		rep.fechaprometido,
		rep.presupuestoaceptado
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		WHERE rep.estado = 5 
		AND rep.entregado = 0
		") or trigger_error(mysql_error()); 
}

if(isset($_GET["entregados"]))
{
	//$result = $con->query("SELECT * FROM reparaciones 
	//	WHERE tecnico = ".$_SESSION['id']." 
	//	AND estado = 1 
	//	OR NOT estado = 5 
	//	ORDER BY orden ASC") 

	$result = $con->query("SELECT 
		rep.orden, 
		tip.nombre as tipoequipo, 
		mar.nombre as marca,
		rep.falla,
		est.nombre as estado,
		rep.fechaprometido,
		rep.presupuestoaceptado
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		WHERE rep.entregado = 1
		") or trigger_error(mysql_error()); 
}


if(isset($_GET["taller"]))
{
	//$result = $con->query("SELECT * FROM reparaciones 
	//	WHERE tecnico = ".$_SESSION['id']." 
	//	AND estado = 1 
	//	OR NOT estado = 5 
	//	ORDER BY orden ASC") 

	$result = $con->query("SELECT 
		rep.orden, 
		tip.nombre as tipoequipo, 
		mar.nombre as marca,
		rep.falla,
		est.nombre as estado,
		rep.fechaprometido,
		rep.presupuestoaceptado
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		WHERE rep.entregado = 0
		") or trigger_error(mysql_error()); 
}


$datos = array();

while($row = $result->fetch_assoc())
{
	$datos[] = $row;
}

echo json_encode($datos);



?>
