<div class="row">
	<div class="col-md-12 center-block no-float">
		<form >
			<div class="row">
				<div class="col-md-6 center-block no-float">
					<h1 class="text-center">ElectronicaApp</h1>
					<h3 class="text-center">Escoje tu usuario</h3>
					<div ng-init="listarTecnicosActivos()" class="radio row text-center">
						<label ng-repeat="data in datosTecnicoActivo" class="col-md-2 no-float center-block inline-block">
							<input ng-model="login.usuario" type="radio" value="{{data.usuario}}">
							<i class="icon-login glyphicon glyphicon-user"></i>
							<h5>{{data.usuario}}</h5>
						</label>
					</div>
				</div>
				<div class="col-md-3 center-block no-float">
					<div class="form-group">
						<label for="">Contraseña</label>
						<input type="password" ng-model="login.clave" class="form-control">
					</div>
					<div class="form-group">
						<button ng-click="iniciarSesion()" class="btn btn-success center-block">Iniciar sesión</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>