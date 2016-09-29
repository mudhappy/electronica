<div class="row">
	<div class="col-md-11 center-block no-float">
		<h3>Equipos terminados <button  class="btn btn-primary" ng-click="listarTerminados()"><i class="glyphicon glyphicon-refresh"></i></button></h3>
		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<input class="form-control" type="text" ng-model="nombre" placeholder="Buscar por nombre del cliente">
				</div>
			</div>
		</div>
		<table class="table table-striped table-responsive no-float" ng-init="listarTerminados()">
			<tr>
				<th>Acción</th>
				<!-- <th>Orden</th>  -->
				<th>Cliente</th> 
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
			<tr ng-repeat="dato in datosTerminados | filter:{nombre: nombre} ">
				<td class="col-actions">
					<button ng-click="equipoTerminado(dato.orden,1)" class="btn btn-edit btn-success"><i class="glyphicon glyphicon-transfer"></i></button>
				</td>
				<!-- <td>{{dato.orden}}</td> -->
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