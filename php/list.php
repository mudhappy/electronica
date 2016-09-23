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

if(isset($_GET["todoTecnico"]))
{
	$result = $con->query("SELECT * FROM tecnico ORDER BY id DESC") or trigger_error(mysql_error()); 
}

if(isset($_GET["estados"]))
{
	$result = $con->query("SELECT * FROM estados") or trigger_error(mysql_error()); 
}

if(isset($_GET["familia"]))
{
	$result = $con->query("SELECT * FROM familia") or trigger_error(mysql_error()); 
}

if(isset($_GET["tipoequipo"]))
{
	$result = $con->query("SELECT * FROM tipoequipo") or trigger_error(mysql_error()); 
}

if(isset($_GET["familiatipoequipo"]))
{
	$familia = $_GET["familiatipoequipo"];
	$result = $con->query("SELECT * FROM tipoequipo WHERE familia = $familia ") or trigger_error(mysql_error()); 
}

if(isset($_GET["equipo"]))
{
	$idEquipo = $_GET["equipo"];
	$result = $con->query("
		SELECT 
		rep.orden,
		rep.nombre,
		rep.celular, 
		rep.telefono, 
		rep.domicilio, 
		fam.nombre as familia,
		fam.id as familiaid,
		tip.nombre as tipoequipo, 
		tip.id as tipoequipoid, 
		mar.nombre as marca,
		mar.id as marcaid,
		rep.modelo as modelo,
		rep.serie as serie,
		rep.serie as serie,
		rep.observaciones,
		rep.falla,
		rep.ubicacion,
		est.nombre as estado,
		est.id as estadoid,
		rep.fechaprometido,
		rep.presupuestoaceptado,
		tec.usuario as tecnico,
		tec.id as tecnicoid,
		rep.fechaingreso,
		rep.presupuesto,
		rep.informecliente,
		rep.informetecnico,
		mon.simbolo,
		rep.pilas,
		rep.cable,
		rep.transformador,
		rep.antena,
		rep.control,
		rep.avisado,
		rep.fechaaviso
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		INNER JOIN monedas AS mon ON rep.nonedapresupuesto = mon.id

		WHERE rep.orden = $idEquipo ") or trigger_error(mysql_error()); 
}

if(isset($_GET["marca"]))
{
	$result = $con->query("SELECT * FROM marca") or trigger_error(mysql_error()); 
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
		rep.presupuestoaceptado,
		tec.usuario as tecnico,
		rep.fechaingreso,
		rep.presupuesto,
		mon.simbolo
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		INNER JOIN monedas AS mon ON rep.nonedapresupuesto = mon.id
		WHERE rep.tecnico = '".$_SESSION['id']."' 
		AND rep.entregado = 0 ORDER BY orden ASC
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
		rep.presupuestoaceptado,
		tec.usuario as tecnico,
		rep.fechaingreso,
		rep.presupuesto,
		mon.simbolo
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		INNER JOIN monedas AS mon ON rep.nonedapresupuesto = mon.id
		WHERE rep.estado = 5 
		AND rep.entregado = 0 ORDER BY orden ASC
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
		rep.presupuestoaceptado,
		tec.usuario as tecnico,
		rep.fechaingreso,
		rep.presupuesto,
		mon.simbolo
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		INNER JOIN monedas AS mon ON rep.nonedapresupuesto = mon.id
		WHERE rep.entregado = 1 ORDER BY orden ASC
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
		rep.presupuestoaceptado,
		tec.usuario as tecnico,
		rep.fechaingreso,
		rep.presupuesto,
		mon.simbolo
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		INNER JOIN monedas AS mon ON rep.nonedapresupuesto = mon.id
		WHERE rep.entregado = 0 ORDER BY orden ASC
		") or trigger_error(mysql_error()); 
}

if(isset($_GET["todo"]))
{
	//$result = $con->query("SELECT * FROM reparaciones 
	//	WHERE tecnico = ".$_SESSION['id']." 
	//	AND estado = 1 
	//	OR NOT estado = 5 
	//	ORDER BY orden ASC") 

	$result = $con->query("SELECT 
		rep.orden, 
		rep.nombre,
		rep.apellido,
		rep.telefono,
		tip.nombre as tipoequipo, 
		mar.nombre as marca,
		rep.falla,
		est.nombre as estado,
		rep.estado as id_estado,
		rep.fechaprometido,
		rep.presupuestoaceptado,
		tec.usuario as tecnico,
		rep.fechaingreso,
		rep.presupuesto,
		mon.simbolo,
		rep.serie
		FROM reparaciones AS rep 
		INNER JOIN familia AS fam ON rep.familia = fam.id 
		INNER JOIN tipoequipo AS tip ON rep.tipoequipo = tip.id
		INNER JOIN marca AS mar ON rep.marca = mar.id 
		INNER JOIN tecnico AS tec ON rep.tecnico = tec.id
		INNER JOIN estados AS est ON rep.estado = est.id
		INNER JOIN monedas AS mon ON rep.nonedapresupuesto = mon.id ORDER BY orden ASC
		") or trigger_error(mysql_error()); 
}

if(isset($_GET["orden"]))
{
	$result = $con->query("SELECT 
		rep.orden
		FROM reparaciones AS rep ORDER BY rep.orden DESC LIMIT 1
		") or trigger_error(mysql_error()); 
}

$datos = array();

while($row = $result->fetch_assoc())
{
	$datos[] = $row;
}

echo json_encode($datos);



?>
