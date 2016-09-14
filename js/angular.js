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
		.success(function(data2)
		{
			$scope.datosTareas = data2;
			console.log("---------------");
			console.log(data2);
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
	}).when("/reportes",
	{
		templateUrl: "./reportes.php"
	}).otherwise(
	{
		redirectTo: "/tareas"
	})
});