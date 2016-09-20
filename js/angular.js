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

	$scope.listarTodo= function()
	{
		$http.get("./php/list.php?todo")
		.success(function(data)
		{
			$scope.datosTodo = data;
			console.log("---------------");
			console.log(data);
		})
		.error(function(data, status, headers, config){
			console.log("Error " + data);
		});
	}

	$scope.listarTecnicos= function()
	{
		$http.get("./php/list.php?tecnico")
		.success(function(data)
		{
			$scope.datosTecnico = data;
			console.log(data);
		});
	}

	$scope.listarEstados = function()
	{
		$http.get("./php/list.php?estados")
		.success(function(data)
		{
			$scope.datosEstados = data;
			console.log(data);
		});
	}

	$scope.listarFamilia = function()
	{
		$http.get("./php/list.php?familia")
		.success(function(data)
		{
			$scope.datosFamilia = data;
			console.log(data);
		});
	}

	$scope.listarTipoEquipo = function()
	{
		$http.get("./php/list.php?tipoequipo")
		.success(function(data)
		{
			$scope.datosTipoEquipo = data;
			console.log(data);
		});
	}

	$scope.listarMarca = function()
	{
		$http.get("./php/list.php?marca")
		.success(function(data)
		{
			$scope.datosMarca = data;
			console.log(data);
		});
	}

	$scope.getOrden= function()
	{
		$http.get("./php/list.php?orden")
		.success(function(data)
		{
			$scope.datosOrden = parseInt(data[0].orden) + 1 ;
			console.log(data[0].orden);
		})
		.error(function(data){
			$scope.datosOrden = 0;
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

	$scope.cargarCalendario = function()
	{
		//
		datePickerInit();
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
			.error(function(data, status, headers, config){
				console.log("Error " + data);
			});
		}
	}

	$scope.verNuevoTipoEquipo = function()
	{
		var textFamilia = document.getElementById("familia").options[document.getElementById('familia').selectedIndex].text;
		var idFamilia = document.getElementById("familia").value;

		if(textFamilia === "Familia")
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
				.error(function(data, status, headers, config){
					console.log("Error " + data);
				});
			}
		}
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



	$scope.limpiarIngresar = function()
	{
		var familia = document.getElementById("familia").value = "";
		var tipoequipo = document.getElementById("tipoequipo").value = "";
		var marca = document.getElementById("marca").value = "";
		var modelo = document.getElementById("modelo").value = "";
		var serie = document.getElementById("serie").value = "";

		var pilas = document.getElementById("pilas").checked = false;


		var pilas = document.getElementById("pilas").checked = false;
		var cable = document.getElementById("cable").checked = false;
		var transformador = document.getElementById("transformador").checked = false;
		var antena = document.getElementById("antena").checked = false;
		var control = document.getElementById("control").checked = false;


		var observaciones = document.getElementById("observaciones").value = "";
		var falla = document.getElementById("falla").value = "";

		var ubicacion = document.getElementById("ubicacion").value = "";


		var fechaprometido = document.getElementById("fechaprometido").value = "";

		$scope.messageOther = "Campos limpiados";
		$scope.messageInsert = "";
	}

	$scope.imprimirAgregado = function()
	{

		document.getElementById("print_nombre").innerHTML = document.getElementById("nombre").value;
		document.getElementById("print_celular").innerHTML = document.getElementById("celular").value;
		document.getElementById("print_telefono").innerHTML = document.getElementById("telefono").value;
		document.getElementById("print_domicilio").innerHTML = document.getElementById("domicilio").value;

		document.getElementById("print_familia").innerHTML = document.getElementById("familia").options[document.getElementById('familia').selectedIndex].text;
		document.getElementById("print_tipoequipo").innerHTML = document.getElementById("tipoequipo").options[document.getElementById('tipoequipo').selectedIndex].text;
		document.getElementById("print_marca").innerHTML = document.getElementById("marca").options[document.getElementById('marca').selectedIndex].text;
		document.getElementById("print_modelo").innerHTML = document.getElementById("modelo").value;
		document.getElementById("print_serie").innerHTML = document.getElementById("serie").value;

		document.getElementById("print_pila").innerHTML =  noToBool(toBool(document.getElementById("pilas").checked));
		document.getElementById("print_cable").innerHTML = noToBool(toBool(document.getElementById("cable").checked));
		document.getElementById("print_transformador").innerHTML = noToBool(toBool(document.getElementById("transformador").checked));
		document.getElementById("print_antena").innerHTML = noToBool(toBool(document.getElementById("antena").checked));
		document.getElementById("print_control").innerHTML = noToBool(toBool(document.getElementById("control").checked));

		document.getElementById("print_observaciones").innerHTML = document.getElementById("observaciones").value;
		document.getElementById("print_falla").innerHTML = document.getElementById("falla").value;

		document.getElementById("print_ingreso").innerHTML = document.getElementById("fechaingreso").value;
		document.getElementById("print_prometido").innerHTML = document.getElementById("fechaprometido").value;
		document.getElementById("print_tecnico").innerHTML = document.getElementById("tecnico").options[document.getElementById('tecnico').selectedIndex].text;
		document.getElementById("print_ubicacion").innerHTML = document.getElementById("ubicacion").value;

		document.getElementById("print_orden").innerHTML = document.getElementById("orden").innerHTML;

		window.print();
	}

	$scope.nuevoEquipo = function()
	{
		$scope.messageInsert = "...";
		/*
		nombre,celular,telefono,domicilio,
		fechaingreso,fechaprometido,
		familia,tipoequipo,marca,modelo,serie,
		pilas,cable,transformador,antena,control,
		tecnico,
		observaciones,falla,
		ubicacion
		*/
		var nombre = document.getElementById("nombre").value;
		var celular = document.getElementById("celular").value;
		var telefono = document.getElementById("telefono").value;
		var domicilio = document.getElementById("domicilio").value;

		var fechaprometido = document.getElementById("fechaprometido").value;
		var cfechaprometido = fechaprometido.split("-");
		fechaprometido = new Date(cfechaprometido[2],toMes(cfechaprometido[1]),cfechaprometido[0]);

		var fechaingreso = document.getElementById("fechaingreso").value;
		var cfechaingreso = fechaingreso.split("-");
		fechaingreso = new Date(cfechaingreso[2],toMes(cfechaingreso[1]),cfechaingreso[0]);



		var familia = document.getElementById("familia").value;
		var tipoequipo = document.getElementById("tipoequipo").value;
		var marca = document.getElementById("marca").value;
		var modelo = document.getElementById("modelo").value;
		var serie = document.getElementById("serie").value;
		

		var pilas = toBool(document.getElementById("pilas").checked);
		var cable = toBool(document.getElementById("cable").checked);
		var transformador = toBool(document.getElementById("transformador").checked);
		var antena = toBool(document.getElementById("antena").checked);
		var control = toBool(document.getElementById("control").checked);

		var tecnico = document.getElementById("tecnico").value;

		var observaciones = document.getElementById("observaciones").value;
		var falla = document.getElementById("falla").value;

		var ubicacion = document.getElementById("ubicacion").value;

		

		if(nombre === "" || celular === "" || telefono === "" || domicilio === "" )
		{
			$scope.messageInsert = "*Falta completar cliente";
		}else if(tecnico === "")
		{
			$scope.messageInsert = "*Tienes que seleccionar un técnico"
		}else if(familia === "")
		{
			$scope.messageInsert = "*Tienes que seleccionar una familia"
		}else if(tipoequipo === "")
		{
			$scope.messageInsert = "*Tienes que seleccionar un tipo de equipo"
		}else if(marca === "")
		{
			$scope.messageInsert = "*Tienes que seleccionar una marca"
		}else
		{
			$scope.messageInsert = "Agregando ...";

			/*
				"nombre": nombre,
				"celular": celular,
				"telefono": telefono,
				"domicilio": domicilio,
				"fechaingreso": fechaingreso,
				"fechaprometido": fechaprometido,
				"familia": familia,
				"tipoequipo": tipoequipo,
				"marca": marca,
				"modelo": modelo,
				"serie": serie,
				"pilas": pilas,
				"cable": cable,
				"transformador": transformador,
				"antena": antena,
				"control": control,
				"tecnico": tecnico,
				"observaciones": observaciones,
				"falla": falla,
				"ubicacion": ubicacion
				*/


				$http.post("./php/acciones.php?agregarEquipo",{
					"nombre": nombre,
					"celular": celular,
					"telefono": telefono,
					"domicilio": domicilio,
					"fechaingreso": fechaingreso,
					"fechaprometido": fechaprometido,
					"familia": familia,
					"tipoequipo": tipoequipo,
					"marca": marca,
					"modelo": modelo,
					"serie": serie,
					"pilas": pilas,
					"cable": cable,
					"transformador": transformador,
					"antena": antena,
					"control": control,
					"tecnico": tecnico,
					"observaciones": observaciones,
					"falla": falla,
					"ubicacion": ubicacion
				})
				.success(function()
				{
					$scope.messageInsert = "Agregado";
					$scope.messageOther = "";

				//$scope.listarMarca();
			})
				.error(function(data, status, headers, config){
					console.log("Error " + data);
				});
			}


		}


	})

miApp.filter("nombrePresupuesto",function()
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
	}).when("/agregar",
	{
		templateUrl: "./agregar.php"
	}).otherwise(
	{
		redirectTo: "/tareas"
	})
});

function toMes(mes)
{
	switch(mes)
	{
		case "Ene":
		mes = "01";
		break; 
		case "Feb":
		mes = "02";
		break; 
		case "Mar":
		mes = "03";
		break; 
		case "Abr":
		mes = "04";
		break; 
		case "May":
		mes = "05";
		break; 
		case "Jun":
		mes = "06";
		break; 
		case "Jul":
		mes = "07";
		break; 
		case "Ago":
		mes = "08";
		break; 
		case "Sep":
		mes = "09";
		break; 
		case "Oct":
		mes = "10";
		break; 
		case "Nov":
		mes = "11";
		break; 
		case "Dic":
		mes = "12";
		break; 
	}
	return mes;
}


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



function toBool(v)
{
	if(v == true)
	{
		return 1
	}else
	{
		return 0
	}
}


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