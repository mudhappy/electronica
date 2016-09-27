var electronica = angular.module("electronica",["ngRoute"]);

electronica.controller("loginController",function($scope,$http)
{
	$scope.login = {
		usuario: '',
		clave: ''
	};

	$scope.listarTecnicosActivos = function()
	{
		$http.get("./php/list.php?tecnicoActivo")
		.success(function(data)
		{
			$scope.datosTecnicoActivo = data;
		})
		.error(function(data){
			console.log("Error " + data);
		});
	}

	$scope.iniciarSesion = function()
	{
		if($scope.login.usuario != "" && $scope.login.clave != "")
		{
			$http.post("./php/login.php",{
				"usuario":$scope.login.usuario,
				"clave":$scope.login.clave
			})
			.success(function(data)
			{
				if(data === "true")
				{
					location.href= "./";
				}else if(data === "false")
				{
					$scope.login.clave = "";
				}
			})
			.error(function(data){
				console.log("Error " + data);
			});
		}else
		{
			console.log("Completa tus datos");
		}
	}
});

electronica.controller("appController",function($scope,$http,$filter)
{
	$scope.cerrarSesion = function()
	{
		$http.post("./php/acciones.php?cerrarSesion",{})
		.success(function(data)
		{
			location.href= "./";
		})
		.error(function(data){
			console.log("Error " + data);
		});
	}


	$scope.verNuevaFamilia = function()
	{
		var familia = prompt("Ingresa una nueva familia", "");
		if (familia != null) 
		{
			$http.post("./php/acciones.php?agregarFamilia",{"texto":familia})
			.success(function()
			{
				$scope.listarFamilia();
			})
			.error(function(data){
				console.log("Error " + data);
			});
		}
	}

	$scope.verNuevoTipoEquipo = function()
	{
		var textFamilia = document.getElementById("familia").options[document.getElementById('familia').selectedIndex].text;
		var idFamilia = document.getElementById("familia").value;

		if(idFamilia === "")
		{
			alert("Selecciona una Familia");
		}else
		{
			var tipoequipo = prompt("Ingresa un nuevo tipo de equipo [Familia:" + textFamilia +"]" , "");
			if (tipoequipo != null) 
			{
				$http.post("./php/acciones.php?agregarTipoEquipo",{"tipoequipo":tipoequipo,"idFamilia":idFamilia})
				.success(function()
				{
					$scope.listarTipoEquipo();
				})
				.error(function(data){
					console.log("Error " + data);
				});
			}
		}
	}



	$scope.listarTecnicos = function()
	{
		$http.get("./php/list.php?tecnico")
		.success(function(data)
		{
			$scope.datosTecnico = data;
		})
		.error(function(data){
			console.log("Error " + data);
		});
	}



	$scope.verNuevaMarca = function()
	{
		var marca = prompt("Ingresa una nueva marca", "");
		if (marca != null) 
		{
			$http.post("./php/acciones.php?agregarMarca",{"texto":marca})
			.success(function()
			{
				$scope.listarMarca();
			})
			.error(function(data, status, headers, config){
				console.log("Error " + data);
			});
		}
	}

	$scope.listarTareas= function()
	{
		$http.get("./php/list.php?tareas")
		.success(function(data)
		{
			$scope.datosTareas = data;
		})
		.error(function(data){
			console.log("Error " + data);
		});
	}

	$scope.listarMonedas= function()
	{
		$http.get("./php/list.php?monedas")
		.success(function(data)
		{
			$scope.datosMonedas = data;
		})
		.error(function(data){
			console.log("Error " + data);
		});
	}

	$scope.listarTaller= function()
	{
		$http.get("./php/list.php?taller")
		.success(function(data)
		{
			$scope.datosTaller = data;
		})
		.error(function(data){
			console.log("Error " + data);
		});
	}

	$scope.listarFamilia = function()
	{
		$http.get("./php/list.php?familia")
		.success(function(data)
		{
			$scope.datosFamilia = data;
		});
	}

	$scope.listarTipoEquipo = function()
	{
		$http.get("./php/list.php?tipoequipo")
		.success(function(data)
		{
			$scope.datosTipoEquipo = data;
		});
	}

	$scope.listarMarca = function()
	{
		$http.get("./php/list.php?marca")
		.success(function(data)
		{
			$scope.datosMarca = data;
		});
	}


	$scope.listarEstados = function()
	{
		$http.get("./php/list.php?estados")
		.success(function(data)
		{
			$scope.datosEstados = data;
		});
	}

	$scope.listarTecnicosActivos = function()
	{
		$http.get("./php/list.php?tecnicoActivo")
		.success(function(data)
		{
			$scope.datosTecnicoActivo = data;
		})
		.error(function(data){
			console.log("Error " + data);
		});
	}

	$scope.getOrden= function()
	{
		$http.get("./php/list.php?orden")
		.success(function(data)
		{
			if(data[0] === undefined)
			{
				$scope.datosOrden = 1;
			}else
			{
				$scope.datosOrden = parseInt(data[0].orden) + 1 ;
			}
		})
		.error(function(data){
			$scope.datosOrden = 0;
		});
	}

	$scope.eliminarEquipo = function(data)
	{

		var r = confirm("¿Estás seguro que deseas eliminar este equipo?");
		if (r == true) {
			$http.post("./php/acciones.php?eliminarEquipo",{"orden":data})
			.success(function()
			{
				$scope.listarEntregados();
			})
			.error(function(data, status, headers, config){
				console.log("Error " + data);
			});
		} else {
			console.log("no");
		}
	}


	$scope.eliminarEntregados= function()
	{

		var r = confirm("¿Estás seguro que deseas eliminar TODOS los equipos?");
		if (r == true) {
			$http.post("./php/acciones.php?eliminarEntregados",{"orden": 0})
			.success(function()
			{
				$scope.listarEntregados();
			})
			.error(function(data, status, headers, config){
				console.log("Error " + data);
			});
		} else {
			console.log("no");
		}
	}

	$scope.listarTerminados= function()
	{
		$http.get("./php/list.php?terminados")
		.success(function(data)
		{
			$scope.datosTerminados = data;
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
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}



	$scope.listarTodo= function()
	{
		$http.get("./php/list.php?todo")
		.success(function(data)
		{
			$scope.datosTodo = data;
			console.log(data);
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

	$scope.equipoTerminado = function(data,data2)
	{
		$http.post("./php/acciones.php?terminado",{
			"orden":data,
			"valor":data2
		})
		.success(function()
		{
			if(data2 == 0)
			{
				$scope.listarEntregados();
			}else if(data2 == 1)
			{
				$scope.listarTerminados();
			}
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

	$scope.tecnicoInactivo = function(id)
	{
		$http.post("./php/acciones.php?tecnicoInactivo",{"id":id})
		.success(function()
		{
			$scope.listarTecnicos();
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}


	$scope.tecnicoActivo = function(id)
	{
		$http.post("./php/acciones.php?tecnicoActivo",{"id":id})
		.success(function()
		{
			$scope.listarTecnicos();
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

	$scope.tecnico = {
		usuario: '',
		celular: '',
		clave: ''
	}
	$scope.nuevoTecnico = function()
	{
		if($scope.tecnico.usuario === "" || $scope.tecnico.celular === "" || $scope.tecnico.clave === "" )
		{
			alert("*Completa todos los campos");
		}else
		{
			$scope.messageTecnico = "...";
			$http.post("./php/acciones.php?agregarTecnico",{
				"usuario": $scope.tecnico.usuario,
				"celular": $scope.tecnico.celular,
				"clave": $scope.tecnico.clave
			})
			.success(function()
			{
				$scope.listarTecnicos();
				console.log("Agregado");
			})
			.error(function(data){
				console.log("Error " + data);
			});
		}
	}

	$scope.equipo = {
		nombre: '',
		celular: '',
		telefono: '',
		domicilio: '',
		fechaingreso: $filter('date')(new Date(), "dd-MM-yyyy"),
		fechaprometido: '',
		familia: '',
		tipoequipo: '',
		marca: '',
		modelo: '',
		serie: '',
		pilas: 0,
		cable: 0,
		transformador: 0,
		antena: 0,
		control: 0,
		tecnico: '',
		observaciones: '',
		falla: '',
		ubicacion: '',
	};



	$scope.nuevoEquipo = function()
	{	
		console.log("Nuevo equipo");
		
		if($scope.equipo.serie === "" || $scope.equipo.nombre === "" || $scope.equipo.celular === "" || $scope.equipo.domicilio === "" || $scope.equipo.familia === "" || $scope.equipo.tipoequipo === "" || $scope.equipo.marca === "" || $scope.equipo.tecnico === "" )
		{
			alert("Te faltan completar campos obligatorios");
		}else
		{
			var cfechaingreso = $scope.equipo.fechaingreso.split("-");
			$scope.equipo.fechaingreso = new Date(cfechaingreso[2],cfechaingreso[1]-1,cfechaingreso[0]);

			var cfechaprometido = $scope.equipo.fechaprometido.split("-");
			$scope.equipo.fechaprometido = new Date(cfechaprometido[2],cfechaprometido[1]-1,cfechaprometido[0]);

			$http.post("./php/acciones.php?agregarEquipo",{
				"nombre": $scope.equipo.nombre,
				"celular": $scope.equipo.celular,
				"telefono": $scope.equipo.telefono,
				"domicilio": $scope.equipo.domicilio,
				"fechaingreso": $scope.equipo.fechaingreso,
				"fechaprometido": $scope.equipo.fechaprometido,
				"familia": $scope.equipo.familia,
				"tipoequipo": $scope.equipo.tipoequipo,
				"marca": $scope.equipo.marca,
				"modelo": $scope.equipo.modelo,
				"serie": $scope.equipo.serie,
				"pilas": $scope.equipo.pilas,
				"cable": $scope.equipo.cable,
				"transformador": $scope.equipo.transformador,
				"antena": $scope.equipo.antena,
				"control": $scope.equipo.control,
				"tecnico": $scope.equipo.tecnico,
				"observaciones": $scope.equipo.observaciones,
				"falla": $scope.equipo.falla,
				"ubicacion": $scope.equipo.ubicacion
			})
			.success(function()
			{
				$scope.equipo = {
					nombre: '',
					celular: '',
					telefono: '',
					domicilio: '',
					fechaingreso: $filter('date')(new Date(), "dd-MM-yyyy"),
					fechaprometido: '',
					familia: '',
					tipoequipo: '',
					marca: '',
					modelo: '',
					serie: '',
					pilas: 0,
					cable: 0,
					transformador: 0,
					antena: 0,
					control: 0,
					tecnico: '',
					observaciones: '',
					falla: '',
					ubicacion: '',
				};
				console.log("Agregado");
				location.href = "#/tareas";
			})
			.error(function(data, status, headers, config){
				console.log("Error " + data);
			});
		}
	}

	$scope.ingresarOtro = function()
	{
		console.log("Nuevo equipo");
		if($scope.equipo.serie === "" || $scope.equipo.nombre === "" || $scope.equipo.celular === "" || $scope.equipo.domicilio === "" || $scope.equipo.familia === "" || $scope.equipo.tipoequipo === "" || $scope.equipo.marca === "" || $scope.equipo.tecnico === "" )
		{
			alert("Te faltan completar campos obligatorios");
		}else
		{
			var cfechaingreso = $scope.equipo.fechaingreso.split("-");
			$scope.equipo.fechaingreso = new Date(cfechaingreso[2],cfechaingreso[1]-1,cfechaingreso[0]);

			var cfechaprometido = $scope.equipo.fechaprometido.split("-");
			$scope.equipo.fechaprometido = new Date(cfechaprometido[2],cfechaprometido[1]-1,cfechaprometido[0]);

			$http.post("./php/acciones.php?agregarEquipo",{
				"nombre": $scope.equipo.nombre,
				"celular": $scope.equipo.celular,
				"telefono": $scope.equipo.telefono,
				"domicilio": $scope.equipo.domicilio,
				"fechaingreso": $scope.equipo.fechaingreso,
				"fechaprometido": $scope.equipo.fechaprometido,
				"familia": $scope.equipo.familia,
				"tipoequipo": $scope.equipo.tipoequipo,
				"marca": $scope.equipo.marca,
				"modelo": $scope.equipo.modelo,
				"serie": $scope.equipo.serie,
				"pilas": $scope.equipo.pilas,
				"cable": $scope.equipo.cable,
				"transformador": $scope.equipo.transformador,
				"antena": $scope.equipo.antena,
				"control": $scope.equipo.control,
				"tecnico": $scope.equipo.tecnico,
				"observaciones": $scope.equipo.observaciones,
				"falla": $scope.equipo.falla,
				"ubicacion": $scope.equipo.ubicacion
			})
			.success(function()
			{
				$scope.equipo = {
					nombre: '',
					celular: '',
					telefono: '',
					domicilio: '',
					fechaingreso: $filter('date')(new Date(), "dd-MM-yyyy"),
					fechaprometido: '',
					familia: '',
					tipoequipo: '',
					marca: '',
					modelo: '',
					serie: '',
					pilas: 0,
					cable: 0,
					transformador: 0,
					antena: 0,
					control: 0,
					tecnico: '',
					observaciones: '',
					falla: '',
					ubicacion: '',
				};
				console.log("Agregado");
				$scope.getOrden();
				location.href = "#/agregar";
			})
			.error(function(data, status, headers, config){
				console.log("Error " + data);
			});
			
		}
	}



	$scope.imprimirAgregado = function()
	{	
		if($scope.equipo.serie === "" || $scope.equipo.nombre === "" || $scope.equipo.celular === "" || $scope.equipo.domicilio === "" || $scope.equipo.familia === "" || $scope.equipo.tipoequipo === "" || $scope.equipo.marca === "" || $scope.equipo.tecnico === "" )
		{
			alert("Te faltan completar campos obligatorios");
		}else
		{
			window.print();

			console.log("Nuevo equipo");
			var cfechaingreso = $scope.equipo.fechaingreso.split("-");
			$scope.equipo.fechaingreso = new Date(cfechaingreso[2],cfechaingreso[1]-1,cfechaingreso[0]);

			var cfechaprometido = $scope.equipo.fechaprometido.split("-");
			$scope.equipo.fechaprometido = new Date(cfechaprometido[2],cfechaprometido[1]-1,cfechaprometido[0]);

			$http.post("./php/acciones.php?agregarEquipo",{
				"nombre": $scope.equipo.nombre,
				"celular": $scope.equipo.celular,
				"telefono": $scope.equipo.telefono,
				"domicilio": $scope.equipo.domicilio,
				"fechaingreso": $scope.equipo.fechaingreso,
				"fechaprometido": $scope.equipo.fechaprometido,
				"familia": $scope.equipo.familia,
				"tipoequipo": $scope.equipo.tipoequipo,
				"marca": $scope.equipo.marca,
				"modelo": $scope.equipo.modelo,
				"serie": $scope.equipo.serie,
				"pilas": $scope.equipo.pilas,
				"cable": $scope.equipo.cable,
				"transformador": $scope.equipo.transformador,
				"antena": $scope.equipo.antena,
				"control": $scope.equipo.control,
				"tecnico": $scope.equipo.tecnico,
				"observaciones": $scope.equipo.observaciones,
				"falla": $scope.equipo.falla,
				"ubicacion": $scope.equipo.ubicacion
			})
			.success(function()
			{
				$scope.equipo = {
					nombre: '',
					celular: '',
					telefono: '',
					domicilio: '',
					fechaingreso: $filter('date')(new Date(), "dd-MM-yyyy"),
					fechaprometido: '',
					familia: '',
					tipoequipo: '',
					marca: '',
					modelo: '',
					serie: '',
					pilas: 0,
					cable: 0,
					transformador: 0,
					antena: 0,
					control: 0,
					tecnico: '',
					observaciones: '',
					falla: '',
					ubicacion: '',
				};
				console.log("Agregado imprimir");
				location.href = "#/tareas";
			})
			.error(function(data, status, headers, config){
				console.log("Error " + data);
			});

		}
	}

});

electronica.controller('equipoContenido', function($scope, $routeParams,$http,$filter) 
{
	$scope.equipo = {
		id: parseInt($routeParams.idReparacion),
		nombre: '',
		celular: '',
		telefono: '',
		domicilio: '',
		fechaingreso: '',
		fechaprometido: '',
		familia: '',
		tipoequipo: '',
		marca: '',
		modelo: '',
		serie: '',
		pilas: 0,
		cable: 0,
		transformador: 0,
		antena: 0,
		control: 0,
		tecnico: '',
		observaciones: '',
		falla: '',
		ubicacion: '',
	};

	$scope.listarEquipo = function(idEquipo)
	{
		$http.get("./php/list.php?equipo="+idEquipo)
		.success(function(data)
		{
			$scope.equipo.nombre = data[0].nombre;
			$scope.equipo.celular = data[0].celular;
			$scope.equipo.telefono = data[0].telefono;
			$scope.equipo.domicilio = data[0].domicilio;

			var fechaingreso = (data[0].fechaingreso).split("-");
			$scope.equipo.fechaingreso = data[0].fechaingreso

			var fechaprometido = (data[0].fechaprometido).split("-");
			$scope.equipo.fechaprometido = fechaprometido[2] +"-"+ fechaprometido[1]+"-"+fechaprometido[0];

			if(data[0].fechaaviso === null)
			{
				$scope.equipo.fechaaviso = "";
			}else
			{
				var fechaaviso = (data[0].fechaaviso).split("-");
				$scope.equipo.fechaaviso = fechaaviso[2] +"-"+ fechaaviso[1]+"-"+fechaaviso[0];
			}
			

			$scope.equipo.avisado = noToBool(data[0].avisado);
			$scope.equipo.avisadonum = data[0].avisado;

			$scope.equipo.familia = data[0].familia;
			$scope.equipo.familiaid = data[0].familiaid;

			$scope.equipo.tipoequipo = data[0].tipoequipo;
			$scope.equipo.tipoequipoid = data[0].tipoequipoid;

			$scope.equipo.marca = data[0].marca;
			$scope.equipo.marcaid= data[0].marcaid;

			$scope.equipo.modelo = data[0].modelo;
			$scope.equipo.serie = data[0].serie;

			$scope.equipo.tecnico = data[0].tecnico;
			$scope.equipo.tecnicoid = data[0].tecnicoid;

			$scope.equipo.observaciones = data[0].observaciones;
			$scope.equipo.falla = data[0].falla;

			$scope.equipo.ubicacion = data[0].ubicacion;

			$scope.equipo.moneda = data[0].moneda;

			$scope.equipo.pilas = noToBool(data[0].pilas);
			$scope.equipo.cable = noToBool(data[0].cable);
			$scope.equipo.transformador = noToBool(data[0].transformador);
			$scope.equipo.antena = noToBool(data[0].antena);
			$scope.equipo.control = noToBool(data[0].control);

			$scope.equipo.pilasnum = data[0].pilas;
			$scope.equipo.cablenum = data[0].cable;
			$scope.equipo.transformadornum = data[0].transformador;
			$scope.equipo.antenanum = data[0].antena;
			$scope.equipo.controlnum = data[0].control;


			$scope.equipo.estado = data[0].estado;
			$scope.equipo.estadoid = data[0].estadoid;

			$scope.equipo.entregado = noToBool(data[0].entregado);
			console.log(data[0].entregado);

			$scope.equipo.presupuestado = isNull(data[0].presupuesto);
			$scope.equipo.presupuestoaceptado = data[0].presupuestoaceptado;
			
			$scope.equipo.presupuesto = parseFloat(data[0].presupuesto);

			if($scope.equipo.presupuestado === "No")
			{
				$scope.equipo.simbolo = "";
			}else
			{
				$scope.equipo.simbolo = data[0].simbolo;
			}	

			$scope.equipo.informecliente = data[0].informecliente;
			$scope.equipo.informetecnico = data[0].informetecnico;

		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}


	$scope.actualizarEquipo = function(paramEquipo)
	{
		console.log($scope.equipo.id +"-"+$scope.equipo.nombre);

		var fechaprometido = ($scope.equipo.fechaprometido).split("-");
		$scope.equipo.fechaprometido = fechaprometido[2] +"-"+ fechaprometido[1]+"-"+fechaprometido[0];

		var fechaaviso = ($scope.equipo.fechaaviso).split("-");
		$scope.equipo.fechaaviso = fechaaviso[2] +"-"+ fechaaviso[1]+"-"+fechaaviso[0];

		$http.post("./php/acciones.php?actualizarEquipo",{
			"id": $scope.equipo.id,
			"nombre": $scope.equipo.nombre,
			"celular": $scope.equipo.celular,
			"telefono": $scope.equipo.telefono,
			"domicilio": $scope.equipo.domicilio,
			"fechaprometido": $scope.equipo.fechaprometido,
			"fechaaviso": $scope.equipo.fechaaviso,
			"familia": $scope.equipo.familiaid,
			"tipoequipo": $scope.equipo.tipoequipoid,
			"marca": $scope.equipo.marcaid,
			"modelo": $scope.equipo.modelo,
			"serie": $scope.equipo.serie,
			"tecnico": $scope.equipo.tecnicoid,
			"ubicacion": $scope.equipo.ubicacion,
			"informecliente": $scope.equipo.informecliente,
			"informetecnico": $scope.equipo.informetecnico,
			"avisado": $scope.equipo.avisadonum,
			"estado": $scope.equipo.estadoid,
			"presupuestoaceptado": $scope.equipo.presupuestoaceptado,
			"pilas": $scope.equipo.pilasnum,
			"cable": $scope.equipo.cablenum,
			"transformador": $scope.equipo.transformadornum,
			"antena": $scope.equipo.antenanum,
			"control": $scope.equipo.controlnum,
			"moneda": $scope.equipo.moneda,
			"presupuesto": parseFloat($scope.equipo.presupuesto)
		})
		.success(function()
		{
			console.log("Actualizado");
			// location.href = "#/tareas";
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

});


function noToBool(v)
{
	if(v == 1)
	{
		return "Si"
	}else
	{
		return "No"
	}
}

function isNull(v)
{
	if(v == null)
	{
		return "No"
	}else
	{
		return "Si"
	}
}

function toggle_visibility(id) 
{
	var e = document.getElementById(id);
	if (e.style.display == 'block' || e.style.display=='')
	{
		e.style.display = 'none';
	}
	else 
	{
		e.style.display = 'block';
	}
}



electronica.filter("nombreActivo",function()
{
	var nombreActivo = function(data) 
	{ 
		if(data == 1) 
		{ 
			return "Activo"; 
		}else if(data == 0) 
		{ 
			return "Inactivo" 
		}
	} 
	return nombreActivo;
})

electronica.directive('jqdatepicker', function () {
	return {
		restrict: 'A',
		require: 'ngModel',
		link: function(scope, element, attrs, ctrl) {
			$(element).datepicker({
				dateFormat: 'dd-mm-yy',
				onSelect: function(date) {
					ctrl.$setViewValue(date);
					ctrl.$render();
					scope.$apply();
				}
			});
		}
	};
});

electronica.filter("nombrePresupuesto",function()
{
	var presupuestoaceptado = function(data) 
	{ 
		if(data== 2) 
		{ 
			return "Sin definir"; 
		}else if(data == 0) 
		{ 
			return "no" 
		}else if(data == 1) 
		{ 
			return "si" 
		} 
	} 
	return presupuestoaceptado;
})

electronica.config(function($routeProvider)
{
	$routeProvider.when("/tareas",
	{
		templateUrl: "./vistas/vistaTareas.php"
	}).when("/entregados",
	{
		templateUrl: "./vistas/vistaEntregados.php"
	}).when("/terminados",
	{
		templateUrl: "./vistas/vistaTerminados.php"
	}).when("/reportes",
	{
		templateUrl: "./vistas/vistaReportes.php"
	}).when("/admin",
	{
		templateUrl: "./vistas/vistaAdmin.php"
	}).when("/taller",
	{
		templateUrl: "./vistas/vistaTaller.php"
	}).when("/agregar",
	{
		templateUrl: "./vistas/vistaAgregar.php"
	}).when("/ver/:idReparacion",
	{
		templateUrl: "./vistas/vistaVer.php",
		controller: "equipoContenido"
	}).when("/edit/:idReparacion",
	{
		templateUrl: "./vistas/vistaEdit.php",
		controller: "equipoContenido"
	}).otherwise(
	{
		redirectTo: "/tareas"
	})
});



function fnExcelReport()
{
	var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
	var textRange; var j=0;
    tab = document.getElementById('section-to-print'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
    	tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
    	txtArea1.document.open("txt/html","replace");
    	txtArea1.document.write(tab_text);
    	txtArea1.document.close();
    	txtArea1.focus(); 
    	sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
    	sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
