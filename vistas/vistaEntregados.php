<table id="section-to-print" class="table table-striped table-responsive no-float none" ng-init="listarEntregados()">
	<tr>
		<th>Nombre</th> 
		<th>Estado</th>

		<th>Celular</th>
		<th>Teléfono</th>
		<th>Domicilio</th>

		<th>Familia</th>
		<th>Tipo</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Serie</th>

		<th>Ubicación</th>

		<th>Pilas</th>
		<th>Cable</th>
		<th>Transformador</th>
		<th>Antena</th>
		<th>Control</th>

		<th>Falla</th>
		<th>Observaciones</th>
		
		<th>Aceptado</th>
		<th>Técnico</th>
		<th>Ingresado</th>
		<th>Prometido</th>
		<th>Presupuesto</th>

		<th>Avisado</th>
		<th>Fecha Aviso</th>

		<th>Informe al cliente</th>
		<th>Informe técnico</th>


	</tr>
	<tr ng-repeat="dato in datosEntregados  | filter:{nombre: nombre} ">
		<!-- <td>{{dato.orden}}</td> -->
		<td>{{dato.nombre}}</td>
		<td>{{dato.estado}}</td>
		<td>{{dato.celular}}</td>
		<td>{{dato.telefono}}</td>
		<td>{{dato.domicilio}}</td>
		<td>{{dato.familia}}</td>
		<td>{{dato.tipoequipo}}</td>
		<td>{{dato.marca}}</td>
		<td>{{dato.modelo}}</td>
		<td>{{dato.serie}}</td>

		<td>{{dato.ubicacion}}</td>

		<td>{{dato.pilas | sino }}</td>
		<td>{{dato.cable | sino }}</td>
		<td>{{dato.transformador | sino }}</td>
		<td>{{dato.antena | sino }}</td>
		<td>{{dato.control | sino }}</td>

		<td>{{dato.falla}}</td>
		<td>{{dato.observaciones}}</td>
		<td>{{dato.presupuestoaceptado | nombrePresupuesto}}</td>
		<td>{{dato.tecnico}}</td>
		<td>{{dato.fechaingreso}}</td>
		<td>{{dato.fechaprometido}}</td>

		<td>
			<span ng-show="dato.presupuesto != null  ">
				<span ng-show="dato.presupuesto != 0  ">
					{{dato.simbolo}} {{dato.presupuesto}}
				</span>
			</span>
		</td>

		<td>{{dato.avisado | nombrePresupuesto}}</td>
		<td>{{dato.fechaaviso}}</td>

		<td>{{dato.informecliente}}</td>
		<td>{{dato.informetecnico}}</td>

	</tr>
</table>
<div class="row">
	<div class="col-md-11 center-block no-float">
		<h3>
			<span>Equipos entregados</span>
			<button  class="btn btn-primary" ng-click="listarEntregados()">
				<i class="glyphicon glyphicon-refresh"></i>
			</button>
			<button id="btnExport" class="btn btn-success" onclick="fnExcelReport();"> Exportar a excel </button>
			<button class="btn btn-default float-right" ng-click="eliminarEntregados()" > Eliminar entregados </button>
		</h3>
		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<input class="form-control" type="text" ng-model="nombre" placeholder="Buscar por nombre del cliente">
				</div>
			</div>
		</div>
		<table class="table table-striped table-responsive no-float" ng-init="listarEntregados()">
			<tr>
				<th>Acción</th>
				<th>Nombre</th> 
				<th>Tipo</th>
				<th>Marca</th>
				<th>Falla</th>
				<th>Aceptado</th>
				<th>Estado</th>
				<th>Técnico</th>
				<th>Ingresado</th>
				<th>Prometido</th>
				<th>Presupuesto</th>
			</tr>
			<tr ng-repeat="dato in datosEntregados  | filter:{nombre: nombre} ">
				<td class="col-actions">
					<a href="#/ver/{{dato.orden}}" class="btn btn-edit btn-info"><i class="glyphicon glyphicon-search"></i></a>
					<button ng-click="eliminarEquipo(dato.orden)" class="btn btn-edit btn-default"><i class="glyphicon glyphicon-remove"></i></button>
				</td>
				<td>{{dato.nombre}}</td>
				<td>{{dato.tipoequipo}}</td>
				<td>{{dato.marca}}</td>
				<td>{{dato.falla}}</td>
				<td>{{dato.presupuestoaceptado | nombrePresupuesto}}</td>
				<td>{{dato.estado}}</td>
				<td>{{dato.tecnico}}</td>
				<td>{{dato.fechaingreso}}</td>
				<td>{{dato.fechaprometido}}</td>
				<td>
					<span ng-show="dato.presupuesto != null  ">
						<span ng-show="dato.presupuesto != 0  ">
							{{dato.simbolo}} {{dato.presupuesto}}
						</span>
					</span>
				</td>
			</tr>
		</table>
	</div>
</div>