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
					<input type="text" ng-model="orden" placeholder="Buscar por orden">
				</div>
			</div>
		</div>
		<table id="section-to-print" class="table table-striped table-responsive no-float" ng-init="listarEntregados()">
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
			<tr ng-repeat="dato in datosEntregados  | filter:{orden: orden} ">
				<td class="col-actions">
					<a href="#/ver/{{dato.orden}}" class="btn btn-edit btn-info"><i class="glyphicon glyphicon-search"></i></a>
					<button ng-click="eliminarEquipo(dato.orden)" class="btn btn-edit btn-default"><i class="glyphicon glyphicon-remove"></i></button>
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