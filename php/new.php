<?php

include('config.php');

//Capturo datos 
$data = json_decode(file_get_contents("php://input"));

if(isset($_GET["tecnico"])){

	$tec_name = $data->tec_name;
	$tec_cel = $data->tec_cel;
	$tec_user = $data->tec_user;
	$tec_pass = $data->tec_pass;

	$sql = "INSERT INTO tecnico (tec_name, tec_cel, tec_user)
	VALUES( '".$tec_name."' ,  '".$tec_cel."' , ".$tec_user.", ".$tec_pass.") "; 
}

//Ejecuto la sentencia
mysql_query($sql) or die(mysql_error()); 

?>