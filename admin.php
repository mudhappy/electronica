<div class="row pd-20">
	<div class="col-md-9 no-float center-block">
		<h2>Administración</h2>
		<h3>Base de datos</h3>
		<div class="row">
			<div class="col-md-6 center-block">
				<div class="form-group">
					<label for="">Exportar copia de seguridad</label>
				</div>
				<div class="form-group">
					<a href="./exportar.php" class="btn btn-primary">Crear copia de seguridad</a>
				</div>
			</div>
			<div class="col-md-6 center-block">
				<form action="importar.php" method="post" enctype="multipart/form-data" name="form1" id="form1"> 

					<div class="form-group">
						<label for="">Importar copia de seguridad</label>
						<input required="required" name="miDatabase" type="file" id="miDatabase" /> 
					</div>
					<?php 
						if (isset($_GET["msg"])) {
							echo $_GET["msg"];
						}
					?>
					<div class="form-group">
						<input class="btn btn-success" type="submit" name="Submit" value="Restaurar" />
					</div>
				</form> 
			</div>
		</div>
	</div>
</div>