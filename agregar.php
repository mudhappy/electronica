<div class="row" ng-init="cargarCalendario()">
	<div class="col-md-11 center-block no-float">
		<div class="row">
			<div class="row" style="margin-top:20px;border-bottom:1px solid rgba(0,0,0,0.3)">
				<div class="col-md-4">
					<h2  style="margin: 0;line-height:41px">Ingresar reparación</h2>
					<h5>Orden 4</h5>
				</div>
				<div class="col-md-8" style="text-align:right">
					<h5>
						<div style="position:relative">
							<label for="fechaingreso">Ingreso : </label> 
							<?php 
							$todayh = getdate();
							$d = $todayh['mday'];
							$m = $todayh['month'];
							switch ($m)
							{
								case "January":
								$m = "Ene";
								break;
								case "February":
								$m = "Feb";
								break;
								case "March":
								$m = "Mar";
								break;
								case "April":
								$m = "Abr";
								break;
								case "May":
								$m = "May";
								break;
								case "June":
								$m = "Jun";
								break;
								case "July":
								$m = "Jul";
								break;
								case "August":
								$m = "Ago";
								break;
								case "September":
								$m = "Sep";
								break;
								case "October":
								$m = "Oct";
								break;
								case "November":
								$m = "Nov";
								break;
								case "December":
								$m = "Dic";
								break;
							}
							$y = $todayh['year'];
							?>
							<input id="fechaingreso" value="<?php echo $d."-".$m."-".$y ?>" class='datepicker'> 
						</div>
						<label for="fechaprometido">Prometido : </label> 
						<input id="fechaprometido" class='datepicker'> 
					</h5>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<h3>Cliente</h3>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<input id="nombre" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="celular">Celular:</label>
							<input id="celular" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="telefono">Teléfono:</label>
							<input id="telefono" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label for="domicilio">Domicilio:</label>
							<input id="domicilio" type="text" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<h3>Equipo</h3>
				<div class="row">
					<div class="col-md-3">
						
						<div class="form-group">
							<select ng-init="listarFamilia()" id="familia" class="w-100" >
								<option value="">Familia</option>
								<option ng-repeat="dato in datosFamilia" value="{{dato.id}}">{{dato.nombre}}</option>
							</select>
							<a ng-click="verNuevaFamilia()" class="pointer">Nueva familia</a>
						</div>

						<div class="form-group">
							<select ng-init="listarTipoEquipo()" id="tipoequipo" class="w-100" ng-model="tipoequipo">
								<option value="">Tipo de equipo</option>
								<option ng-repeat="dato in datosTipoEquipo" value="{{dato.id}}">{{dato.nombre}}</option>
							</select>
							<a ng-click="verNuevoTipoEquipo()" class="pointer">Nuevo tipo de equipo</a>
						</div>

						<div class="form-group">
							<select ng-init="listarMarca()" id="marca" class="w-100" ng-model="marca">
								<option value="">Marca</option>
								<option ng-repeat="dato in datosMarca" value="{{dato.id}}">{{dato.nombre}}</option>
							</select>
							<a ng-click="verNuevaMarca()" class="pointer">Nueva marca</a>
						</div>
						<div class="form-group">
							<input type="text" id="modelo" placeholder="Modelo" class="form-control">
						</div>
						<div class="form-group">
							<input type="text" id="serie" placeholder="Serie" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Asignar reparación a:</label>
							<select id="tecnico" ng-init="listarTecnicos()" ng-model="tecnico">
								<option value="">Técnico</option>
								<option ng-repeat="dato in datosTecnico" value="{{dato.id}}">{{dato.usuario}}</option>
							</select>
						</div>
					</div>
					<div class="col-md-9">
						<div class="row">
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
										<label><input id="pilas" type="radio" name="pilas">Si</label>
										<label><input id="pilas" checked="checked" type="radio" name="pilas">No</label>
									</div>
								</td>
								<td>
									<div class="radio">
										<label><input id="cable" type="radio" name="cable">Si</label>
										<label><input id="cable" checked="checked" type="radio" name="cable">No</label>
									</div>
								</td>
								<td>
									<div class="radio">
										<label><input id="transformador" type="radio" name="transformador">Si</label>
										<label><input id="transformador" checked="checked" type="radio" name="transformador">No</label>
									</div>
								</td>
								<td>
									<div class="radio">
										<label><input id="antena" type="radio" name="antena">Si</label>
										<label><input id="antena" checked="checked" type="radio" name="antena">No</label>
									</div>
								</td>
								<td>
									<div class="radio">
										<label><input id="control" type="radio" name="control">Si</label>
										<label><input id="control" checked="checked" type="radio" name="control">No</label>
									</div>
								</td>
							</table>
						</div>
						<div class="form-group">
							<textarea id="observaciones" class="pd-20 form-control" rows="2" placeholder="Observaciones ..."></textarea>
						</div>
						<div class="form-group">
							<label for="">Falla</label>
							<textarea id="falla" class="pd-20 form-control" rows="2" placeholder="Describa la falla ..."></textarea>
						</div>
						<div class="form-group">
							<input id="ubicacion" type="text" placeholder="Ubicación" class="form-control">
						</div>
						<div class="row pd-20">
							<div class="col-md-4">
								{{messageInsert}}
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-4">
										<button ng-click="nuevoEquipo()" class="btn btn-success">Confirmar</button>
									</div>
									<div class="col-md-4">
										<button class="btn btn-primary">Ingresar otro</button>
									</div>
									<div class="col-md-4">
										<button class="btn btn-default">Imprimir</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
