<div class="row">
	<div class="col-md-11 center-block no-float">
		<h3>Mis tareas <button class="btn btn-primary" ng-click="listarTareas()"><i class="glyphicon glyphicon-refresh"></i></button></h3>
		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<input type="text" ng-model="orden" placeholder="Buscar por orden">
				</div>
			</div>
		</div>

		<table class="table table-striped table-responsive no-float" ng-init="listarTareas()">
			<tr>
				<th>Acción</th>
				<th>Orden</th> 
				<th>Tipo</th>
				<th>Marca</th>
				<th>Falla</th>
				<th>Aceptado</th>
				<th>Estado</th>
				<th>Ingresado</th>
				<th>Prometido</th>
				<th>Presupuesto</th>
			</tr>
			<tr ng-repeat="dato in datosTareas | filter:{orden: orden} ">
				<td class="col-actions">
					<button class="btn btn-edit btn-info"><i class="glyphicon glyphicon-edit"></i></button>
					<a href="#/ver/{{dato.orden}}" class="btn btn-edit btn-success"><i class="glyphicon glyphicon-search"></i></a>
				</td>
				<td>{{dato.orden}}</td>
				<td>{{dato.tipoequipo}}</td>
				<td>{{dato.marca}}</td>
				<td>{{dato.falla}}</td>
				<td>{{dato.presupuestoaceptado | nombrePresupuesto}}</td>
				<td>{{dato.estado}}</td>
				<td>{{dato.fechaingreso}}</td>
				<td>{{dato.fechaprometido}}</td>
				<td>{{dato.simbolo}} {{dato.presupuesto}}</td>
			</tr>
		</table>
	</div>
</div>