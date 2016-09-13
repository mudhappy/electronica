<div class="row" ng-init="listarTecnicos()">
	<div class="col-md-3 center-block no-float">
		<h1 class="text-center">ElectronicaApp</h1>
		<h3 class="text-center">Escoje tu usuario</h3>
		<div>
			<div >
				<div class="row text-center">
					<div class="col-md-3 center-block text-center btn-login no-float inline-block pointer" ng-repeat="dato in datosTecnico" ng-click="set_user(dato.user)">
						<i class="icon-login glyphicon glyphicon-user"></i>
						<h5>{{dato.user}}</h5>
					</div>
				</div>
				<div class="form-group">
					<label for="">Contraseña</label>
					<input ng-model="pass" type="password" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-info center-block" ng-click="linkstart()">Ingresar</button>
				</div>
				<p class="text-center">{{mensaje}}</p>
			</div>
		</div>
	</div>
</div>