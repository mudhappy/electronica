var miApp = angular.module("miApp",[]);

miApp.controller("loginController",function($scope,$http)
{
	$scope.usuario = "";
	$scope.clave = "";

	$scope.listarTecnicos= function()
	{
		$http.get("./php/list.php?tecnico")
		.success(function(data)
		{
			$scope.datosTecnico = data;
			console.log(data);
		});
	}
	
	$scope.set_usuario = function($usuario)
	{
		$scope.usuario = $usuario;
		console.log($scope.usuario);
	}

	$scope.linkstart = function()
	{
		console.log($scope.usuario + "" + $scope.clave);
		$scope.mensaje = "Conectando ...";
		if($scope.usuario != "")
		{
			if($scope.usuario != "" || $scope.clave != "")
			{
				$http.post("./php/login.php",{"usuario":$scope.usuario,"clave":$scope.clave})
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

})