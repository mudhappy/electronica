<div class="row pd-20">
	<div class="col-md-2">
		<div class="form-group">
			<label for="">Cliente</label>
			<input type="text" placeholder="Nombre" class="form-control" ng-model="buscador.nombre">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<input type="text" placeholder="Apellido" class="form-control" ng-model="buscador.apellido">
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<input type="text" placeholder="Telefono" class="form-control" ng-model="buscador.telefono">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="">Estado</label>
			<div class="row">
				<div class="col-md-12">
					<select ng-model="buscador.estado" ng-init="listarEstados()">
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
					<select ng-model="buscador.tecnico" ng-init="listarTecnicos()">
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
					<input type="text" placeholder="Serie" ng-model="buscador.serie">
				</div>
			</div>
		</div>

		
		<div class="form-group">
			<label for="">Aceptado</label>
			<div class="row">
				<div class="col-md-12">
					<select ng-model="buscador.presupuestoaceptado">
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
					<input type="text" ng-model="buscador.orden" placeholder="Nro de orden">
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
				<th>Nro</th> 
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
			nombre: buscador.nombre, 
			apellido: buscador.apellido, 
			telefono: buscador.telefono,
			id_estado: buscador.estado,
			tecnico: buscador.tecnico,
			serie: buscador.serie,
			presupuestoaceptado: buscador.presupuestoaceptado,
			orden: buscador.orden
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
			<td><span ng-show="dato.presupuesto != null">{{dato.simbolo}} {{dato.presupuesto}}</span></td>
		</tr>
	</table>
</div>
</div>