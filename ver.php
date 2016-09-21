<div ng-init="listarEquipo(paramEquipo)" class="row hidden-to-print">
	<div class="col-md-10 center-block no-float">
		<!-- Cliente -->
		<div class="row">
			<h2 style="margin: 0;line-height:41px">Reparación</h2>
			<div>
				<h4 style="display:inline-block;margin-right:100px">Orden : <span id="orden">{{ paramEquipo }}</span></h4>
				<h4 style="display:inline-block;margin-right:100px">Estado : <span id="orden">{{ estado }}</span></h4>
				<h4 style="display:inline-block;margin-right:100px">Entregado : <span id="orden">{{ entregado }}</span></h4>
			</div>
			<div class="col-md-6">
				<div class="row">
					<h3>Cliente</h3>
					<div class="col-md-12">
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
						<!-- <div class="form-group">
							<label for="fechaingreso">Ingreso : </label> 
							<input id="fechaingreso" ng-model="fechaingreso" class='datepicker'> 
						</div> -->
						<div class="form-group">
							<label for="fechaprometido">Reparación prometida para : </label> 
							<input ng-model="fechaprometido" id="fechaprometido"> 
						</div>
						<div class="form-group">
							<label for="">Presupuestado:  </label> 
							<input ng-model="presupuestado" id="fechaprometido"> 
						</div>
						<div class="form-group">
							<label for="">Presupuesto aceptado:  </label> 
							<input value="{{presupuestoaceptado  | nombrePresupuesto}}"> 
						</div>
						<div class="form-group">
							<label for="">Costo: </label> 
							<input value="{{simbolo}} {{presupuesto}}"> 
						</div>
						<div class="form-group">
							<label for="">Avisado: </label> 
							<input value="{{avisado}}"> 
						</div>
						<div class="form-group">
							<label for="">Fecha de aviso: </label> 
							<input value="{{fechaaviso}}"> 
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-6">
				<h3>Equipo</h3>	
				<div class="form-group">
					<label for="familia">Familia:</label>
					<input ng-model="familia" id="familia" placeholder="Familia" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="tipoequipo">Tipo de Equipo:</label>
					<input ng-model="tipoequipo" id="tipoequipo" placeholder="Tipo de equipo" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="marca">Marca:</label>
					<input ng-model="marca" id="marca" placeholder="Marca" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label for="modelo">Modelo:</label>
					<input ng-model="modelo" type="text" id="modelo" placeholder="Modelo" class="form-control">
				</div>
				<div class="form-group">
					<label for="serie">Serie:</label>
					<input ng-model="serie" type="text" id="serie" placeholder="Serie" class="form-control">
				</div>
				<div class="form-group">
					<label for="ubicacion">Lugar físico:</label>
					<input ng-model="ubicacion" id="ubicacion" type="text" placeholder="Ubicación" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Técnico asinado:</label>
					<input ng-model="tecnico" id="tecnico" placeholder="Técnico" type="text" class="form-control">
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
						{{pilas}}
					</td>
					<td>
						{{cable}}
					</td>
					<td>
						{{transformador}}
					</td>
					<td>
						{{antena}}
					</td>
					<td>
						{{control}}
					</td>
				</table>
			</div>
		</div>

		<div class="row" style="margin-top:20px;border-bottom:1px solid rgba(0,0,0,0.3)">
			<div class="col-md-12">
				<div class="form-group">
					<label for="">Falla del equipo</label>
					<textarea ng-model="falla" id="falla" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
				<div class="form-group">
					<label for="">Observaciones</label>
					<textarea ng-model="observaciones" id="observaciones" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
				<div class="form-group">
					<label for="">Informe al cliente</label>
					<textarea ng-model="informecliente" id="falla" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
				<div class="form-group">
					<label for="">Informe Técnico 
					<button onclick="toggle_visibility('hideMe')" class="btn btn-primary"><i class="glyphicon glyphicon-sort"></i></button>
					</label>
					<textarea id="hideMe" style="display:none" ng-model="informetecnico" class="pd-20 form-control" rows="2" placeholder="No descrito aun ..."></textarea>
				</div>
			</div>
			<div class="col-md-12">

			</div>
		</div>

	</div>
	<div>
	</div>
</div>

<?php 
// Funciones PHP Date
function aMes($m)
{
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
	return $m;
}

?>