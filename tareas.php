<div class="row">
	<div class="col-md-11 center-block no-float">
		<h3>Mis tareas</h3>
		<table class="table table-striped table-responsive no-float" ng-init="listarTareas()">
			<tr>
				<th>ED</th>
				<th>Orden</th> 
				<th>Tipo</th>
				<th>Marca</th>
				<th>Falla</th>
				<th>Aceptado</th>
				<th>Estado</th>
				<th>Prometido</th>
			</tr>
			<tr ng-repeat="dato in datosTareas">
				<td><button>#</button></td>
				<td>{{dato.orden}}</td>
				<td>{{dato.tipoequipo}}</td>
				<td>{{dato.marca}}</td>
				<td>{{dato.informetecnico}}</td>
				<td>{{dato.presupuestoaceptado}}</td>
				<td>{{dato.estado}}</td>
				<td>{{dato.fechaprometido}}</td>
			</tr>
		</table>
	</div>
</div>