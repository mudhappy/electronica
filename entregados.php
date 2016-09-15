<div class="row">
	<div class="col-md-11 center-block no-float">
		<h3>Equipos entregados <button ng-click="listarEntregados()"><i class="glyphicon glyphicon-refresh"></i></button></h3>
		<table class="table table-striped table-responsive no-float" ng-init="listarEntregados()">
			<tr>
				<th>Acción</th>
				<th>Orden</th> 
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
			<tr ng-repeat="dato in datosEntregados">
				<td>
					<button class="btn btn-edit btn-info"><i class="glyphicon glyphicon-edit"></i></button>
					<button class="btn btn-edit btn-success"><i class="glyphicon glyphicon-search"></i></button>
				</td>
				<td>{{dato.orden}}</td>
				<td>{{dato.tipoequipo}}</td>
				<td>{{dato.marca}}</td>
				<td>{{dato.falla}}</td>
				<td>{{dato.presupuestoaceptado | nombrePresupuesto}}</td>
				<td>{{dato.estado}}</td>
				<td>{{dato.tecnico}}</td>
				<td>{{dato.fechaingreso}}</td>
				<td>{{dato.fechaprometido}}</td>
				<td>{{dato.simbolo}} {{dato.presupuesto}}</td>
			</tr>
		</table>
	</div>
</div>