var miApp = angular.module("miApp",["ngRoute"]);

miApp.controller("adminController",function($scope,$http)
{
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

	$scope.listarTareas= function()
	{
		$http.get("./php/list.php?tareas")
		.success(function(data)
		{
			$scope.datosTareas = data;
			console.log("---------------");
			console.log(data);
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

	$scope.listarTaller= function()
	{
		$http.get("./php/list.php?taller")
		.success(function(data)
		{
			$scope.datosTaller = data;
			console.log("---------------");
			console.log(data);
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

	$scope.listarTerminados= function()
	{
		$http.get("./php/list.php?terminados")
		.success(function(data)
		{
			$scope.datosTerminados = data;
			console.log("---------------");
			console.log(data);
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

	$scope.listarEntregados= function()
	{
		$http.get("./php/list.php?entregados")
		.success(function(data)
		{
			$scope.datosEntregados = data;
			console.log("---------------");
			console.log(data);
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

})

miApp.filter("nombrePresupuesto",function()
{
	var presupuestoaceptado = function(data) 
	{ 
		if(data==null) 
		{ 
			return "no"; 
		}else 
		{ 
			return "si" 
		} 
	} 
	return presupuestoaceptado;
})


miApp.config(function($routeProvider)
{
	$routeProvider.when("/tareas",
	{
		templateUrl: "./tareas.php"
	}).when("/entregados",
	{
		templateUrl: "./entregados.php"
	}).when("/terminados",
	{
		templateUrl: "./terminados.php"
	}).when("/reportes",
	{
		templateUrl: "./reportes.php"
	}).when("/admin",
	{
		templateUrl: "./admin.php"
	}).when("/taller",
	{
		templateUrl: "./taller.php"
	}).otherwise(
	{
		redirectTo: "/tareas"
	})
});