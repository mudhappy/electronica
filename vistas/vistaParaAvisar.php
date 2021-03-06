<div class="row">
	<div class="col-md-11 center-block no-float">
		<h3>Equipos Para avisar <button  class="btn btn-primary" ng-click="listarParaAvisar()"><i class="glyphicon glyphicon-refresh"></i></button></h3>
		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<input class="form-control" type="text" ng-model="nombre" placeholder="Buscar por nombre del cliente">
				</div>
			</div>
		</div>
		<table class="table table-striped table-responsive no-float" ng-init="listarParaAvisar()">
			<tr>
				<th>Acción</th>
				<!-- <th>Orden</th>  -->
				<th>Cliente</th> 
				<th>Celular</th> 
				<th>Teléfono</th> 
				<th>Tipo</th>
				<th>Marca</th>
				<th>Aceptado</th>
				<th>Estado</th>
				<th>Técnico</th>
				<th>Ingresado</th>
				<th>Prometido</th>
				<th>Presupuesto</th>
			</tr>
			<tr ng-repeat="dato in datosParaAvisar | filter:{nombre: nombre} ">
				<td class="col-actions">
					<a href="#/edit/{{dato.orden}}" class="btn btn-edit btn-info"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="#/ver/{{dato.orden}}" class="btn btn-edit btn-success"><i class="glyphicon glyphicon-search"></i></a>
				</td>
				<!-- <td>{{dato.orden}}</td> -->
				<td>{{dato.nombre}}</td>
				<td>{{dato.celular}}</td>
				<td>{{dato.telefono}}</td>
				<td>{{dato.tipoequipo}}</td>
				<td>{{dato.marca}}</td>
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