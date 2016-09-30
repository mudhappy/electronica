<?php session_start() ?>
<div class="row hidden-to-print" ng-init="listarEquipo(equipo.id)">
	<div class="col-md-11 center-block no-float">
		<div class="row">
			<div class="col-md-12">
				<h2 style="margin: 0;margin-top:20px;line-height:41px">Reparación</h2>
				<div>
					<h4 style="display:inline-block;margin-right:100px">Orden : <span id="orden">{{ equipo.id }}</span></h4>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Estado</label>
					<select ng-init="listarEstados()" name="estado" ng-model="equipo.estadoid" class="form-control">
						<option ng-repeat="dato in datosEstados" value="{{dato.id}}">
							{{dato.nombre}}
						</option>
					</select>
				</div>
				<h3>Datos del cliente</h3>
				<div class="form-group">
					<label for="nombre">Nombre:</label>
					<input name="nombre" type="text" ng-model="equipo.nombre" class="form-control">
				</div>
				<div class="form-group">
					<label for="celular">Celular:</label>
					<input name="celular" type="text" ng-model="equipo.celular" class="form-control">
				</div>
				<div class="form-group">
					<label for="telefono">Teléfono:</label>
					<input name="telefono" type="text" ng-model="equipo.telefono" class="form-control">
				</div>
				<div class="form-group">
					<label for="domicilio">Domicilio:</label>
					<input name="domicilio" type="text" ng-model="equipo.domicilio" class="form-control">
				</div>

				<div class="form-group relative">
					<label for="fechaprometido">Prometido : </label> 
					<input type="text" ng-model="equipo.fechaprometido" name="fechaprometido" jqdatepicker class="form-control" /> 
				</div>

				<?php 

				if($_SESSION["id"] == 1 || $_SESSION["id"] == 2 )
				{
					echo 
					'
					<div class="form-group">
						<label for="">Presupuesto aceptado:  </label> 
						<select ng-model="equipo.presupuestoaceptado" class="form-control" name="presupuestoaceptado">
							<option value="2">Sin definir</option>
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
					</div>';
				}

				?>



				<div class="form-group">
					<div class="row">


						<?php 

						if($_SESSION["id"] == 1 || $_SESSION["id"] == 2 )
						{
							echo 
							'
							<div class="col-md-6">
								<label for="">Moneda presupuesto:  </label> 
								<select ng-init="listarMonedas()" ng-model="equipo.moneda" class="form-control" name="moneda">
									<option value="">Selecciona una moneda</option>
									<option ng-repeat="dato in datosMonedas" value="{{dato.id}}">
										{{dato.nombre + " (" + dato.simbolo + ")"}}
									</option>
								</select>
							</div>
							<div class="col-md-6 form-group">
								<label for="fechaaviso">Presupuesto : </label> 
								<input type="number" step="0.01" name="presupuesto" ng-model="equipo.presupuesto" class="form-control"> 
							</div>
							';
						}

						?>





						<div class="col-md-6 form-group">
							<label for="fechaaviso">Presupuesto hecho : </label> 
							<select class="form-control" ng-model="equipo.phecho">
								<option value="0">No</option>
								<option value="1">Si</option>
							</select>
						</div>
					</div>
				</div>


				<?php 

				if($_SESSION["id"] == 1 || $_SESSION["id"] == 2 )
				{
					echo 
					'
					<div class="form-group">
						<label for="">Avisado:</label> 
						<select ng-model="equipo.avisadonum" class="form-control" name="avisadonum" >
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
					</div>

					<div class="form-group relative">
						<label for="fechaaviso">Fecha Aviso : </label> 
						<input type="text" name="fechaaviso" ng-model="equipo.fechaaviso" jqdatepicker class="form-control"> 
					</div>
					';
				}

				?>





				<div class="form-group">
					<label for="">Informe al cliente : </label> 
					<textarea ng-model="equipo.informecliente" name="informecliente" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Técnico</label>
					<select ng-init="listarTecnicosActivos()" name="tecnico" ng-model="equipo.tecnicoid" class="form-control">
						<option ng-repeat="dato in datosTecnicoActivo" value="{{dato.id}}">
							{{dato.usuario}}
						</option>
					</select>
				</div>

				<h3>Equipo</h3>	
				<div class="form-group">
					<select id="familia" ng-init="listarFamilia()" name="familia" ng-model="equipo.familiaid" class="form-control" >
						<option ng-repeat="dato in datosFamilia" value="{{dato.id}}">{{dato.nombre}}</option>
					</select>
					<a ng-click="verNuevaFamilia()" class="pointer">Nueva familia</a>
				</div>
				<div class="form-group">
					<select ng-init="listarTipoEquipo()" name="tipoequipo" class="form-control" ng-model="equipo.tipoequipoid">
						<option ng-repeat="dato in datosTipoEquipo| filter:{ familia: equipo.familiaid }" value="{{dato.id}}">{{dato.nombre}}</option>
					</select>
					<a ng-click="verNuevoTipoEquipo()" class="pointer">Nuevo tipo de equipo</a>
				</div>

				<div class="form-group">
					<select ng-init="listarMarca()" name="marca" class="form-control" ng-model="equipo.marcaid">
						<option ng-repeat="dato in datosMarca" value="{{dato.id}}">{{dato.nombre}}</option>
					</select>
					<a ng-click="verNuevaMarca()" class="pointer">Nueva marca</a>
				</div>

				<div class="form-group">
					<label for="modelo">Modelo:</label>
					<input ng-model="equipo.modelo" type="text" name="modelo" class="form-control">
				</div>
				<div class="form-group">
					<label for="serie">Serie:</label>
					<input name="serie" ng-model="equipo.serie" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label for="ubicacion">Lugar físico:</label>
					<input name="ubicacion" ng-model="equipo.ubicacion" type="text" class="form-control">
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
							<label><input ng-model="equipo.pilasnum" value="1" type="radio" name="pilas">Si</label>
							<label><input ng-model="equipo.pilasnum" value="0" type="radio" name="pilas">No</label>
						</div>
					</td>
					<td>
						<div class="radio">
							<label><input ng-model="equipo.cablenum" value="1" type="radio" name="cable">Si</label>
							<label><input ng-model="equipo.cablenum" value="0" type="radio" name="cable">No</label>
						</div>
					</td>
					<td>
						<div class="radio">
							<label><input ng-model="equipo.transformadornum" value="1" type="radio" name="transformador">Si</label>
							<label><input ng-model="equipo.transformadornum" value="0" type="radio" name="transformador">No</label>
						</div>
					</td>
					<td>
						<div class="radio">
							<label><input ng-model="equipo.antenanum" value="1" type="radio" name="antena">Si</label>
							<label><input ng-model="equipo.antenanum" value="0" type="radio" name="antena">No</label>
						</div>
					</td>
					<td>
						<div class="radio">
							<label><input ng-model="equipo.controlnum" value="1" type="radio" name="control">Si</label>
							<label><input ng-model="equipo.controlnum" value="0" type="radio" name="control">No</label>
						</div>
					</td>
				</table>
				
				<?php 

				if($_SESSION["id"] != 2 )
				{
					echo 
					'
					<div class="form-group">
						<label for="">Informe Interno </label>
						<textarea name="informetecnico" ng-model="equipo.informetecnico" class="pd-20 form-control" rows="6" placeholder="No descrito aun ..."></textarea>
					</div>
					';
				}

				?>

			</div>
		</div>
		<div class="row  pd-20 text-center">
			<div class="col-md-12">
				<button ng-click="actualizarEquipo(equipo.id)" class="btn btn-primary">GUARDAR CAMBIOS</button>
				{{messageOther}}
			</div>
		</div>
	</div>
</div>