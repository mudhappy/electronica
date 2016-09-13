<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php include("sources.php") ?>	
	<script src="./js/angular.js"></script>
</head>
<body class="body" ng-app="miApp" ng-controller="miController">
	<?php 
		if(isset($_SESSION["usuario"]))
		{
			include("panel.php");
		}else
		{
			include("login.php");
		}
	?>

</body>
</html>