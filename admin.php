<div class="row">
	<div class="col-md-11 no-float center-block">
		<h1>Administración</h1>
		<form action="import.php" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
			<div class="form-group">
				<label for="">Importar base de datos:</label>
				<input name="csv" type="file" id="csv" /> 
			</div>
			<input type="text" name="coso" style="display:none">
			<div class="form-group">
				<button class="btn btn-success">Importar</button>
			</div>
		</form> 
	</div>
</div>
