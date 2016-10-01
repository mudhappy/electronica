<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

	<!-- BOOTSTRAP -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="./css/bootstrap.min.css">

	<!-- Jquery -->
	<script src="./js/jquery-3.1.0.min.js"></script>
	<script src="./js/jquery-ui.min.js"></script>

	<!-- Angular 1.5 de mi vida <3 -->
	<script src="./js/angular.min.js"></script>
	<!-- Angular 1.5 - Rutas -->
	<script src="./js/angular-route.min.js"></script>

	<!-- Personal -->
	<link rel="stylesheet" href="./css/jquery-ui.css">
	<link rel="stylesheet" href="./css/estilos.css">
	<script src="./js/jquery.js"></script>
    <script src="./js/moment.min.js"></script>
	<title>Electronica UY</title>
	<script src="./js/script.js"></script>
</head>
<body ng-app="electronica">
	<?php 
	if(isset($_SESSION["usuario"]))
	{
		echo '<div ng-controller="appController">';
		include("./vistas/vistaApp.php");
		echo '</div>';
	}else
	{
		echo '<div ng-controller="loginController">';
		include("./vistas/vistaLogin.php");
		echo '</div>';
	}
	?>
</body>
</html>