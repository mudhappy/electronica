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

if(isset($_GET["agregarFamilia"]))
{
	$texto = $data->texto;
	$con->query("INSERT INTO familia (nombre) VALUES ('".$texto."') ");
}

if(isset($_GET["agregarTipoEquipo"]))
{
	$tipoequipo = $data->tipoequipo;
	$idFamilia = $data->idFamilia;
	$con->query("INSERT INTO tipoequipo (nombre,familia) VALUES ('".$tipoequipo."','".$idFamilia."') ");
}

if(isset($_GET["agregarMarca"]))
{
	$texto = $data->texto;
	$con->query("INSERT INTO marca (nombre) VALUES ('".$texto."') ");
}


if(isset($_GET["agregarEquipo"]))
{
	$nombre = $data->nombre;
	$celular = $data->celular;
	$telefono = $data->telefono;
	$domicilio = $data->domicilio;
	$fechaingreso = $data->fechaingreso;
	$fechaprometido = $data->fechaprometido;
	$familia = $data->familia;
	$tipoequipo = $data->tipoequipo;
	$marca = $data->marca;
	$modelo = $data->modelo;
	$serie = $data->serie;
	$pilas = $data->pilas;
	$cable = $data->cable;
	$transformador = $data->transformador;
	$antena = $data->antena;
	$control = $data->control;
	$tecnico = $data->tecnico;
	$observaciones = $data->observaciones;
	$falla = $data->falla;
	$ubicacion = $data->ubicacion;
	$nonedapresupuesto = 1;
	$presupuestoaceptado = 2;

	$con->query("INSERT INTO reparaciones 
		(
		nombre,celular,telefono,domicilio,
		fechaingreso,fechaprometido,
		familia,tipoequipo,marca,modelo,serie,
		pilas,cable,transformador,antena,control,
		tecnico,
		observaciones,
		falla,
		ubicacion,
		nonedapresupuesto,
		presupuestoaceptado
		) 
		VALUES 
		(
		'".$nombre."',
		'".$celular."',
		'".$telefono."',
		'".$domicilio."',
		'".$fechaingreso."',
		'".$fechaprometido."',
		'".$familia."',
		'".$tipoequipo."',
		'".$marca."',
		'".$modelo."',
		'".$serie."',
		'".$pilas."',
		'".$cable."',
		'".$transformador."',
		'".$antena."',
		'".$control."',
		'".$tecnico."',
		'".$observaciones."',
		'".$falla."',
		'".$ubicacion."',
		'".$nonedapresupuesto."',
		'".$presupuestoaceptado."'
		) ");
}


if(isset($_GET["actualizarEquipo"]))
{
	$id = $data->id;
	$nombre = $data->nombre;
	$celular = $data->celular;
	$telefono = $data->telefono;
	$domicilio = $data->domicilio;
	$fechaprometido = $data->fechaprometido;
	$fechaaviso = $data->fechaaviso;
	$familia = $data->familia;
	$tipoequipo = $data->tipoequipo;
	$marca = $data->marca;
	$modelo = $data->modelo;
	$serie = $data->serie;
	$tecnico = $data->tecnico;
	$ubicacion = $data->ubicacion;
	$informecliente = $data->informecliente;
	$informetecnico = $data->informetecnico;
	$avisado = $data->avisado;
	$estado = $data->estado;
	$presupuestoaceptado = $data->presupuestoaceptado;

	$pilas = $data->pilas;
	$cable = $data->cable;
	$transformador = $data->transformador;
	$antena = $data->antena;
	$control = $data->control;


	$con->query("UPDATE reparaciones 
		SET 
		nombre = '".$nombre."',
		celular = '".$celular."',
		telefono = '".$telefono."',
		domicilio = '".$domicilio."',
		fechaprometido = '".$fechaprometido."',
		fechaaviso = '".$fechaaviso."',
		familia = '".$familia."',
		tipoequipo = '".$tipoequipo."',
		marca = '".$marca."',
		modelo = '".$modelo."',
		serie = '".$serie."',
		tecnico = '".$tecnico."',
		ubicacion = '".$ubicacion."',
		informecliente = '".$informecliente."',
		informetecnico = '".$informetecnico."',
		avisado = '".$avisado."',
		presupuestoaceptado = '".$presupuestoaceptado."',
		estado = '".$estado."',
		pilas = '".$pilas."',
		cable = '".$cable."',
		transformador = '".$transformador."',
		antena = '".$antena."',
		control = '".$control."'
		WHERE orden = '".$id."' ");
}

?>