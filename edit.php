<div class="row hidden-to-print" ng-init="listarEquipo(paramEquipo)">
	<div class="col-md-11 center-block no-float" ng-init="cargarCalendario()">
		<div class="row">
			<div class="col-md-12">
				<h2 style="margin: 0;margin-top:20px;line-height:41px">Reparación</h2>
				<div>
					<h4 style="display:inline-block;margin-right:100px">Orden : <span id="orden">{{ paramEquipo }}</span></h4>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Estado</label>
					<select ng-init="listarEstados()" id="estado" ng-model="estadoid" class="form-control">
						<option ng-repeat="dato in datosEstados" value="{{dato.id}}">
							{{dato.nombre}}
						</option>
					</select>
				</div>
				<h3>Datos del cliente</h3>
				<div class="form-group">
					<label for="nombre">Nombre:</label>
					<input id="nombre" type="text" ng-model="nombre" class="form-control">
				</div>
				<div class="form-group">
					<label for="celular">Celular:</label>
					<input id="celular" type="text" ng-model="celular" class="form-control">
				</div>
				<div class="form-group">
					<label for="telefono">Teléfono:</label>
					<input id="telefono" type="text" ng-model="telefono" class="form-control">
				</div>
				<div class="form-group">
					<label for="domicilio">Domicilio:</label>
					<input id="domicilio" type="text" ng-model="domicilio" class="form-control">
				</div>

				<div class="form-group relative">
					<label for="fechaprometido">Prometido : </label> 
					<input id="fechaprometido" id="fechaprometido" value="{{fechaprometido}}" class='datepicker form-control'> 
				</div>

				<div class="form-group">
					<label for="">Presupuesto aceptado:  </label> 
					<select ng-model="presupuestoaceptado" class="form-control" name="" id="presupuestoaceptado">
						<option value="2">Sin definir</option>
						<option value="1">Si</option>
						<option value="0">No</option>
					</select>
				</div>

				<div class="form-group">
					<label for="">Avisado:</label> 
					<select ng-model="avisadoid" class="form-control" name="" id="avisado">
						<option value="1">Si</option>
						<option value="0">No</option>
					</select>
				</div>

				<div class="form-group relative">
					<label for="fechaaviso">Fecha Aviso : </label> 
					<input id="fechaaviso" id="fechaaviso" value="{{fechaaviso}}" class='datepicker form-control'> 
				</div>

				<div class="form-group">
					<label for="">Informe al cliente : </label> 
					<textarea ng-model="informecliente" id="informecliente" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Técnico</label>
					<select ng-init="listarTecnicos()" id="tecnico" ng-model="tecnicoid" class="form-control">
						<option ng-repeat="dato in datosTecnico" value="{{dato.id}}">
							{{dato.usuario}}
						</option>
					</select>
				</div>
				<h3>Equipo</h3>	
				<div class="form-group">
					<select ng-init="listarFamilia()" id="familia" ng-model="familiaid" class="form-control" >
						<option ng-repeat="dato in datosFamilia" value="{{dato.id}}" ng-click="listarFamiliaTipoEquipo(dato.id)">{{dato.nombre}}</option>
					</select>
					<a ng-click="verNuevaFamilia()" class="pointer">Nueva familia</a>
				</div>

				<div class="form-group">
					<select id="tipoequipo" class="form-control" id="tipoequipo" ng-model="tipoequipoid">
						<option ng-repeat="dato in datosTipoEquipo" value="{{dato.id}}">{{dato.nombre}}</option>
					</select>
					<a ng-click="verNuevoTipoEquipo()" class="pointer">Nuevo tipo de equipo</a>
				</div>

				<div class="form-group">
					<select ng-init="listarMarca()" id="marca" class="form-control" ng-model="marcaid">
						<option ng-repeat="dato in datosMarca" value="{{dato.id}}">{{dato.nombre}}</option>
					</select>
					<a ng-click="verNuevaMarca()" class="pointer">Nueva marca</a>
				</div>

				<div class="form-group">
					<label for="modelo">Modelo:</label>
					<input id="modelo" ng-model="modelo" type="text" id="modelo" placeholder="Modelo" class="form-control">
				</div>
				<div class="form-group">
					<label for="serie">Serie:</label>
					<input id="serie" ng-model="serie" type="text" id="serie" placeholder="Serie" class="form-control">
				</div>
				<div class="form-group">
					<label for="ubicacion">Lugar físico:</label>
					<input id="ubicacion" ng-model="ubicacion" id="ubicacion" type="text" placeholder="Ubicación" class="form-control">
				</div>
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
							<label><input ng-model="pilas" value="1" id="pilas" type="radio" name="pilas">Si</label>
							<label><input ng-model="pilas" value="0" id="pilas" type="radio" name="pilas">No</label>
						</div>
					</td>
					<td>
						<div class="radio">
							<label><input ng-model="cable" value="1" id="cable" type="radio" name="cable">Si</label>
							<label><input ng-model="cable" value="0" id="cable" type="radio" name="cable">No</label>
						</div>
					</td>
					<td>
						<div class="radio">
							<label><input ng-model="transformador" value="1" id="transformador" type="radio" name="transformador">Si</label>
							<label><input ng-model="transformador" value="0" id="transformador" type="radio" name="transformador">No</label>
						</div>
					</td>
					<td>
						<div class="radio">
							<label><input ng-model="antena" value="1" id="antena" type="radio" name="antena">Si</label>
							<label><input ng-model="antena" value="0" id="antena" type="radio" name="antena">No</label>
						</div>
					</td>
					<td>
						<div class="radio">
							<label><input ng-model="control" value="1" id="control" type="radio" name="control">Si</label>
							<label><input ng-model="control" value="0" id="control" type="radio" name="control">No</label>
						</div>
					</td>
				</table>
				<div class="form-group">
					<label for="">Informe Técnico </label>
					<textarea id="informetecnico" ng-model="informetecnico" class="pd-20 form-control" rows="6" placeholder="No descrito aun ..."></textarea>
				</div>
			</div>
		</div>
		<div class="row  pd-20 text-center">
			<div class="col-md-12">
				<button ng-click="actualizarEquipo(paramEquipo)" class="btn btn-primary">GUARDAR CAMBIOS</button>
				{{messageOther}}
			</div>
		</div>
	</div>
</div>