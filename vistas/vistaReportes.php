<div class="row pd-20">
	<div class="col-md-2">

		
		<div class="form-group">
			<label for="">Orden</label>
			<div class="row">
				<div class="col-md-12">
					<input type="text" ng-model="buscador.orden" placeholder="Nro de orden">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="">Cliente</label>
			<input type="text" placeholder="Nombre" class="form-control" ng-model="buscador.nombre">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<input type="text" placeholder="Celular" class="form-control" ng-model="buscador.celular">
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
			<label for="">Tipo de equipo</label>
			<div class="row">
				<div class="col-md-12">
					<select ng-model="buscador.tipoequipo" ng-init="listarTipoEquipo()">
						<option value="">
							Cualquiera
						</option>
						<option ng-repeat="dato in datosTipoEquipo" value="{{dato.id}}">
							{{dato.nombre}}
						</option>
					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="">Marca</label>
			<div class="row">
				<div class="col-md-12">
					<select ng-model="buscador.marca" ng-init="listarMarca()">
						<option value="">
							Cualquiera
						</option>
						<option ng-repeat="dato in datosMarca" value="{{dato.id}}">
							{{dato.nombre}}
						</option>
					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="">Presupuesto hecho</label>
			<div class="row">
				<div class="col-md-12">
					<select ng-model="buscador.phecho">
						<option value="">
							Cualquiera
						</option>
						<option value="0">
							No
						</option>
						<option value="1">
							Si
						</option>
					</select>
				</div>
			</div>
		</div>


		<div class="form-group">
			<label for="">Avisado</label>
			<div class="row">
				<div class="col-md-12">
					<select ng-model="buscador.avisado">
						<option value="">
							Cualquiera
						</option>
						<option value="0">
							No
						</option>
						<option value="1">
							Si
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
			<div class="row">
				<div class="col-md-12">
					<label for="">Fecha Inicial</label>
					<input type="text" class="form-control" jqdatepicker ng-model="buscador.fechaInicial">
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<label for="">Fecha Final</label>
					<input type="text" class="form-control" jqdatepicker ng-model="buscador.fechaFinal">
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
				<th>Acción</th>
				<th>Cliente</th> 
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
			celular: buscador.celular, 
			telefono: buscador.telefono,
			avisado: buscador.avisado,
			phecho: buscador.phecho,
			id_estado: buscador.estado,
			id_tipoequipo: buscador.tipoequipo,
			id_marca: buscador.marca,
			tecnico: buscador.tecnico,
			serie: buscador.serie,
			presupuestoaceptado: buscador.presupuestoaceptado,
			orden: buscador.orden
		} | dateRange: buscador.fechaInicial : buscador.fechaFinal">

		
		<td class="col-actions">
			<a href="#/edit/{{dato.orden}}" class="btn btn-edit btn-info"><i class="glyphicon glyphicon-edit"></i></a>
			<a href="#/ver/{{dato.orden}}" class="btn btn-edit btn-success"><i class="glyphicon glyphicon-search"></i></a>
		</td>
		
		<td>{{dato.nombre}}</td>
		<td>{{dato.tipoequipo}}</td>
		<td>{{dato.marca}}</td>
		<td>{{dato.falla}}</td>
		<td>{{dato.presupuestoaceptado | nombrePresupuesto}}</td>
		<td>{{dato.estado}}</td>
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