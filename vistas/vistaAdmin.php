<div class="row pd-20">
	<div class="col-md-9 no-float center-block">
		<h2>Administración</h2>
		<div class="row">
			<div class="col-md-4 center-block">
				<h3>Base de datos</h3>
				<div class="form-group">
					<label for="">Exportar copia de seguridad</label>
				</div>
				<div class="form-group">
					<a href="./php/exportar.php" class="btn btn-primary">Crear copia de seguridad</a>
				</div>
			</div>
			<div class="col-md-8">
				<h3>Técnicos</h3>
				<form>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Nombre de usuario</label>
								<input name="usuario" ng-model="tecnico.usuario"  type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Clave</label>
								<input name="clave" ng-model="tecnico.clave"  type="password" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Celular</label>
								<input name="celular" ng-model="tecnico.celular"  type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<button ng-click="nuevoTecnico()" class="btn btn-success">Agregar</button>
						{{messageTecnico}}
					</div>
				</form>
				<h4>Lista</h4>
				<table ng-init="listarTecnicos()" class="table table-responsive table-striped">
					<tr>
						<th>Nombre</th>
						<th>Celular</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
					<tr ng-repeat="dato in datosTecnico">
						<td>{{dato.usuario}}</td>
						<td>{{dato.celular}}</td>
						<td>{{dato.activo | nombreActivo }}</td>
						<td><btn ng-click="tecnicoInactivo(dato.id)" class="btn btn-edit btn-default"><i class="glyphicon glyphicon-arrow-down"></i></btn>
							<btn ng-click="tecnicoActivo(dato.id)" class="btn btn-edit btn-default"><i class="glyphicon glyphicon-arrow-up"></i></btn></td>
					</tr>
				</table>
			</div>
			<!-- <div class="col-md-6 center-block">
				<form action="./php/importar.php" method="post" enctype="multipart/form-data" name="form1" id="form1"> 

					<div class="form-group">
						<label for="">Importar copia de seguridad</label>
						<input required="required" name="miDatabase" type="file" id="miDatabase" /> 
					</div> -->
					<?php 
						// if (isset($_GET["msg"])) {
						// 	echo $_GET["msg"];
						// }
					?>
					<!-- <div class="form-group">
						<input class="btn btn-success" type="submit" name="Submit" value="Restaurar" />
					</div>
				</form> 
			</div> -->
		</div>
	</div>
</div>