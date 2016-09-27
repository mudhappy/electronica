<div id="section-to-print" class="row w-100 none">
	<div class="col-md-12">
		<h3>Reporte</h3>
		<h5>Reparación orden {{datosOrden}}</span></h5>
	</div>
	<div class="col-md-12">
		<table class="table table-striped table-responsive no-float">
			<tr>
				<th>Nombre</th>
				<th>Celular</th>
				<th>Teléfono</th>
				<th>Domicilio</th>
			</tr>
			<tr>
				<td>{{equipo.nombre}}</td>
				<td>{{equipo.celular}}</span></td>
				<td>{{equipo.telefono}}</span></td>
				<td>{{equipo.domicilio}}</span></td>
			</tr>
		</table>
		<table class="table table-responsive">
			<tr>
				<th>Familia</th>
				<th>Tipo de equipo</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Serie</th>
			</tr>
			<tr>
				<td>
					<span ng-repeat="dato in datosFamilia | filter:{ id: equipo.familia} : true">{{dato.nombre}}</span>
				</td>
				<td>
					<span ng-repeat="dato in datosTipoEquipo | filter:{ id: equipo.tipoequipo} : true">{{dato.nombre}}</span>
				</td>
				<td>
					<span ng-repeat="dato in datosMarca | filter:{ id: equipo.marca} : true">{{dato.nombre}}</span>
				</td>
				<td>{{equipo.modelo}}</span></td>
				<td>{{equipo.serie}}</span></td>
			</tr>
		</table>
		<table class="table table-responsive">
			<tr>
				<th>Pila</th>
				<th>Cable</th>
				<th>Transformador</th>
				<th>Antena</th>
				<th>Control</th>
			</tr>
			<tr>
				<td>{{equipo.pilas | nombrePresupuesto}}</span></td>
				<td>{{equipo.cable | nombrePresupuesto}}</span></td>
				<td>{{equipo.transformador | nombrePresupuesto}}</span></td>
				<td>{{equipo.antena | nombrePresupuesto}}</span></td>
				<td>{{equipo.control | nombrePresupuesto}}</span></td>
			</tr>
		</table>
		<table class="table table-responsive">
			<tr>
				<th>Observaciones</th>
				<th>Falla</th>
			</tr>
			<tr>
				<td>{{equipo.observaciones}}</span></td>
				<td>{{equipo.falla}}</span></td>
			</tr>
		</table>
		<table class="table table-responsive">
			<tr>
				<th>Fecha ingreso</th>
				<th>Prometido</th>
				<th>Técnico</th>
				<th>Ubicación</th>
			</tr>
			<tr>
				<td>{{equipo.fechaingreso}}</span></td>
				<td>{{equipo.fechaprometido}}</span></td>
				<td>{{equipo.tecnico}}</span></td>
				<td>{{equipo.ubicacion}}</span></td>
			</tr>
		</table>
	</div>
</div>
<div class="row hidden-to-print" ng-init="cargarCalendario()">
	<div class="col-md-11 center-block no-float">

		<form name="formAgregar">
			<div class="row">
				<h2 style="margin: 0;margin-top:20px;line-height:41px">Ingresar reparación</h2>
				<div ng-init="getOrden()">
					<h4>Orden : <span id="orden">{{ datosOrden }}</span></h4>
				</div>
				<h3>Cliente</h3>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nombre">Nombre*:</label>
								<input ng-model="equipo.nombre" name="nombre" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="celular">Celular*:</label>
								<input ng-model="equipo.celular" name="celular" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="telefono">Teléfono:</label>
								<input ng-model="equipo.telefono" name="telefono" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="domicilio">Domicilio*:</label>
								<input ng-model="equipo.domicilio" name="domicilio" type="text" class="form-control">
							</div>
						</div>
					</div>

				</div>
				<div class="col-md-6">
					<div>
						<label for="fechaingreso">Ingreso : </label> 
						<input type="text" ng-model="equipo.fechaingreso" name="fechaingreso" jqdatepicker class="form-control" /> 
					</div>
				</div>
			</div>

			<div class="row" style="margin-top:20px;border-bottom:1px solid rgba(0,0,0,0.3)">
				<h3>Equipo</h3>	
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Familia*</label>
						<select id="familia" ng-init="listarFamilia()" name="familia" ng-model="equipo.familia" class="form-control" >
							<option value="">Familia</option>
							<option ng-repeat="dato in datosFamilia" value="{{dato.id}}">{{dato.nombre}}</option>
						</select>
						<a ng-click="verNuevaFamilia()" class="pointer">Nueva familia</a>
					</div>
					<div class="form-group">
						<label for="">Tipo de equipo*</label>
						<select ng-init="listarTipoEquipo()" name="tipoequipo" ng-model="equipo.tipoequipo" class="form-control">
							<option value="">Tipo de equipo</option>
							<option ng-repeat="dato in datosTipoEquipo| filter:{ familia: equipo.familia }" value="{{dato.id}}">
								{{dato.nombre}}
							</option>
						</select>
						<a ng-click="verNuevoTipoEquipo()" class="pointer">Nuevo tipo de equipo</a>
					</div>

					<div class="form-group">
						<label for="">Marca*</label>
						<select ng-init="listarMarca()" name="marca" ng-model="equipo.marca" class="form-control" >
							<option value="">Marca</option>
							<option ng-repeat="dato in datosMarca" value="{{dato.id}}">{{dato.nombre}}</option>
						</select>
						<a ng-click="verNuevaMarca()" class="pointer">Nueva marca</a>
					</div>

					<div class="form-group">
						<label for="modelo">Modelo</label>
						<input type="text" name="modelo" ng-model="equipo.modelo" class="form-control">
					</div>
					<div class="form-group">
						<label for="serie">Serie*</label>
						<input type="text" name="serie" ng-model="equipo.serie" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<table class="table table-responsive table-striped table-bordered">
						<tr>
							<th>Pilas</th>
							<th>Cable</th> 
							<th>Transformador</th>
							<th>Antena</th>
							<th>Control</th>
						</tr>
						<td>
							<div class="radio">
								<label><input name="pilas" ng-model="equipo.pilas" value="1" type="radio">Si</label>
								<label><input name="pilas" ng-model="equipo.pilas" value="0" type="radio">No</label>
							</div>
						</td>
						<td>
							<div class="radio">
								<label><input name="cable" ng-model="equipo.cable" value="1" type="radio">Si</label>
								<label><input name="cable" ng-model="equipo.cable" value="0" type="radio">No</label>
							</div>
						</td>
						<td>
							<div class="radio">
								<label><input name="transformador" ng-model="equipo.transformador" value="1" type="radio">Si</label>
								<label><input name="transformador" ng-model="equipo.transformador" value="0" type="radio">No</label>
							</div>
						</td>
						<td>
							<div class="radio">
								<label><input name="antena" ng-model="equipo.antena" value="1" type="radio">Si</label>
								<label><input name="antena" ng-model="equipo.antena" value="0" type="radio">No</label>
							</div>
						</td>
						<td>
							<div class="radio">
								<label><input name="control" ng-model="equipo.control" value="1" type="radio">Si</label>
								<label><input name="control" ng-model="equipo.control" value="0" type="radio">No</label>
							</div>
						</td>
					</table>
					<div class="form-group">
						<label for="observaciones">Observaciones</label>
						<textarea name="observaciones" ng-model="equipo.observaciones" class="pd-20 form-control" rows="2" ></textarea>
					</div>
					<div class="form-group">
						<label for="">Falla</label>
						<textarea name="falla" ng-model="equipo.falla" class="pd-20 form-control" rows="2" placeholder="Describa la falla ..."></textarea>
					</div>
					<div class="form-group">
						<label for="ubicacion">Ubicación</label>
						<input name="ubicacion" ng-model="equipo.ubicacion" type="text" class="form-control">
					</div>
				</div>
				<div class="col-md-12">

				</div>
			</div>

			<div class="row pd-20">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Reparación por*:</label>
						<select name="tecnico" ng-model="equipo.tecnico" ng-init="listarTecnicosActivos()" class="form-control" >
							<option value="">Técnico</option>
							<option ng-repeat="dato in datosTecnicoActivo" value="{{dato.id}}">{{dato.usuario}}</option>
						</select>
					</div>
				</div>

				<div class="col-md-6">
					<label for="fechaprometido">Prometido : </label> 
					<input type="text" ng-model="equipo.fechaprometido" name="fechaprometido" jqdatepicker class="form-control" /> 
				</div>
			</div>
		</form>

		<div class="row  pd-20 text-center">
			<div class="col-md-4">
				<button ng-click="nuevoEquipo()" class="btn btn-success">CONFIRMAR</button>
				{{messageInsert}}
			</div>
			<div class="col-md-4">
				<button ng-click="ingresarOtro()" class="btn btn-primary">INGRESAR OTRO</button>
				{{messageOther}}
			</div>
			<div class="col-md-4">
				<button  ng-click="imprimirAgregado()" class="btn btn-default">IMPRIMIR</button>
				{{messageImprimir}}
			</div>
		</div>

	</div>
	<div>
	</div>
</div>
