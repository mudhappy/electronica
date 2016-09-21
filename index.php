<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php include("sources.php") ?>	
</head>
<body class="body" ng-app="miApp">
	<?php 
		if(isset($_SESSION["usuario"]))
		{
			echo '<div ng-controller="adminController">';
			include("panel.php");
			echo '</div>';
		}else
		{
			echo '<div ng-controller="loginController">';
			include("login.php");
			echo '</div>';
		}
	?>

</body>
</html>
