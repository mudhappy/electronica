var miApp = angular.module("miApp",[]);

miApp.controller("miController",function($scope,$http)
{
	$scope.user = "";
	$scope.pass = "";

	$scope.listarTecnicos= function()
	{
		$http.get("./php/list.php?tecnico")
		.success(function(data)
		{
			$scope.datosTecnico = data;
			console.log(data);
		});
	}
	$scope.set_user = function($user)
	{
		$scope.user = $user;
		console.log($scope.user);
	}

	$scope.linkstart = function()
	{
		console.log($scope.user + "" + $scope.pass);
		$scope.mensaje = "Conectando ...";
		if($scope.user != "")
		{
			if($scope.user != "" || $scope.pass != "")
			{
				$http.post("./php/login.php",{"user":$scope.user,"pass":$scope.pass})
				.success(function(data, status, headers, config)
				{
					if(data === "true")
					{
						$scope.mensaje = "Genial";
						location.href= "./";
					}else if(data === "false")
					{
						$scope.mensaje = "Contraseña incorrecta";
					}
				})
				.error(function(data, status, headers, config){
					console.log("Error " + data);
				});
			}
		}else
		{
			$scope.mensaje = "Selecciona un usuario";
		}
	}

	$scope.logout = function()
	{
		$http.post("logout.php",{})
		.success(function(data, status, headers, config)
		{
			console.log("Adios adios");
			location.href= "./";
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

})