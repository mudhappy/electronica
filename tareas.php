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
			<tr>
				<td><button>#</button></td>
				<td>5</td>
				<td>Televisor LED</td>
				<td>Samsung</td>
				<td>No prende! ... ah y le cayó un poquito de agua</td>
				<td>Si</td>
				<td>En reparación</td>
				<td>11/10/16</td>
			</tr>
			<button ng-click="listarTareas()">click</button>
			<p ng-repeat="dato in datosTareas">
				Si esto aparece es que hay un dato
			</p>
		</table>
	</div>
</div>