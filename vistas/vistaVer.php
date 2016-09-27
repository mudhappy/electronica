<div ng-init="listarEquipo(equipo.id)" class="row hidden-to-print">
	<div class="col-md-11 center-block no-float">
		<!-- Cliente -->
		<div class="row">
			<h2 style="margin: 0;margin-top:20px;line-height:41px">Reparación</h2>
			<div>
				<h4 style="display:inline-block;margin-right:100px">Orden : <span id="orden">{{ equipo.id }}</span></h4>
				<h4 style="display:inline-block;margin-right:100px">Estado : <span id="orden">{{ equipo.estado }}</span></h4>
				<h4 style="display:inline-block;margin-right:100px">Entregado : <span id="orden">{{ equipo.entregado }}</span></h4>
			</div>
			<div class="col-md-6">
				<div class="row">
					<h3>Cliente</h3>
					<div class="col-md-12">
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<input name="nombre" ng-model="equipo.nombre" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="celular">Celular:</label>
							<input name="celular" ng-model="equipo.celular" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="telefono">Teléfono:</label>
							<input name="telefono" ng-model="equipo.telefono" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="domicilio">Domicilio:</label>
							<input name="domicilio" ng-model="equipo.domicilio" type="text" class="form-control">
						</div>
						<!-- <div class="form-group">
							<label for="fechaingreso">Ingreso : </label> 
							<input id="fechaingreso" ng-model="fechaingreso" class='datepicker'> 
						</div> -->
						<div class="form-group">
							<label for="fechaprometido"><h3>Reparación prometida para : </h3></label> 
							<input class="form-control" ng-model="equipo.fechaprometido" name="fechaprometido"> 
						</div>
						<div class="form-group">
							<label for="">Presupuestado?:  </label> 
							<input class="form-control" ng-model="equipo.presupuestado" name="presupuestado"> 
						</div>
						<div class="form-group">
							<label for="">Presupuesto aceptado:  </label> 
							<input class="form-control" value="{{presupuestoaceptado  | nombrePresupuesto}}"> 
						</div>
						<div class="form-group">
							<label for="">Costo: </label> 
							<input class="form-control" value="{{equipo.simbolo}} {{equipo.presupuesto}}"> 
						</div>
						<div class="form-group">
							<label for="">Avisado: </label> 
							<input class="form-control" ng-model="equipo.avisado"> 
						</div>
						<div class="form-group">
							<label for="">Fecha de aviso: </label> 
							<input class="form-control" ng-model="equipo.fechaaviso" name="fechaaviso"> 
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-6">
				<h3>Equipo</h3>	
				<div class="form-group">
					<label for="familia">Familia:</label>
					<input ng-model="equipo.familia" name="familia" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="tipoequipo">Tipo de Equipo:</label>
					<input ng-model="equipo.tipoequipo" name="tipoequipo" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="marca">Marca:</label>
					<input ng-model="equipo.marca" name="marca" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label for="modelo">Modelo:</label>
					<input ng-model="equipo.modelo" type="text" name="modelo" class="form-control">
				</div>
				<div class="form-group">
					<label for="serie">Serie:</label>
					<input ng-model="equipo.serie" type="text" name="serie" class="form-control">
				</div>
				<div class="form-group">
					<label for="ubicacion">Lugar físico:</label>
					<input ng-model="equipo.ubicacion" name="ubicacion" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label for="tecnico">Técnico asinado:</label>
					<input ng-model="equipo.tecnico" name="tecnico" type="text" class="form-control">
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
						{{equipo.pilas}}
					</td>
					<td>
						{{equipo.cable}}
					</td>
					<td>
						{{equipo.transformador}}
					</td>
					<td>
						{{equipo.antena}}
					</td>
					<td>
						{{equipo.control}}
					</td>
				</table>
			</div>
		</div>

		<div class="row" style="margin-top:20px;border-bottom:1px solid rgba(0,0,0,0.3)">
			<div class="col-md-12">
				<div class="form-group">
					<label for=""><h3>Falla del equipo</h3></label>
					<textarea ng-model="equipo.falla" name="falla" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
				<div class="form-group">
					<label for="">Observaciones</label>
					<textarea ng-model="equipo.observaciones" name="observaciones" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
				<div class="form-group">
					<label for="">Informe al cliente</label>
					<textarea ng-model="equipo.informecliente" name="informecliente" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
				<div class="form-group">
					<label for="">Informe Técnico 
					<button onclick="toggle_visibility('hideMe')" class="btn btn-primary"><i class="glyphicon glyphicon-sort"></i></button>
					</label>
					<textarea id="hideMe" style="display:none" ng-model="equipo.informetecnico" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
			</div>
			<div class="col-md-12">

			</div>
		</div>

	</div>
	<div>
	</div>
</div>
