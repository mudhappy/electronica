<div class="row pd-20">
	<div class="col-md-2">
		<div class="form-group">
			<label for="">Cliente {{id_coso}}</label>
			<div class="row">
				<div class="col-md-6">
					<input type="text" placeholder="Nombre" class="form-control" ng-model="nombre">
				</div>
				<div class="col-md-6">
					<input type="text" placeholder="Apellido" class="form-control" ng-model="apellido">
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<input type="text" placeholder="Telefono" class="form-control" ng-model="telefono">
				</div>
			</div>
		</div>

		<div class="form-group">
		<label for="">Estado</label>
			<div class="row">
				<div class="col-md-12">
					<select ng-model="estado" ng-init="listarEstados()">
						<option value="">
							Cualquiera
						</option>
						<option ng-repeat="dato in datosEstados" value="{{dato.id}}">
							{{dato.nombre}}
						</option>
					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
		<label for="">Técnico</label>
			<div class="row">
				<div class="col-md-12">
					<select ng-model="tecnico" ng-init="listarTecnicos()">
						<option value="">
							Cualquiera
						</option>
						<option ng-repeat="dato in datosTecnico" value="{{dato.usuario}}">
							{{dato.usuario}}
						</option>
					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
		<label for="">Serie</label>
			<div class="row">
				<div class="col-md-12">
					<input type="text" placeholder="Serie" ng-model="serie">
				</div>
			</div>
		</div>

		
		<div class="form-group">
		<label for="">Aceptado</label>
			<div class="row">
				<div class="col-md-12">
					<select ng-model="presupuestoaceptado">
						<option value="">
							Cualquiera
						</option>
						<option value="0">
							No
						</option>
						<option value="1">
							Si
						</option>
						<option value="2">
							Sin definir
						</option>
					</select>
				</div>
			</div>
		</div>

		
		<div class="form-group">
		<label for="">Orden</label>
			<div class="row">
				<div class="col-md-12">
					<input type="text" ng-model="orden" placeholder="Nro de orden">
				</div>
			</div>
		</div>

	</div>
	<div class="col-md-10">
		<h3>
			<span>Reportes</span> 
			<button class="btn btn-info" onclick="window.print()">Imprimir</button>
			<button id="btnExport" class="btn btn-success" onclick="fnExcelReport();"> Exportar a excel </button>
		</h3>
		<table id="section-to-print" class="table table-striped table-responsive no-float" ng-init="listarTodo()">
			<tr>
				<!--<th>Acción</th>-->
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
			<tr ng-repeat="dato in datosTodo | filter:{ 
				nombre: nombre, 
				apellido: apellido, 
				telefono: telefono,
				id_estado: estado,
				tecnico: tecnico,
				serie: serie,
				presupuestoaceptado: presupuestoaceptado,
				orden: orden
				}">
				<!--
				<td>
					<button class="btn btn-edit btn-info"><i class="glyphicon glyphicon-edit"></i></button>
					<button class="btn btn-edit btn-success"><i class="glyphicon glyphicon-search"></i></button>
				</td>
				-->
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