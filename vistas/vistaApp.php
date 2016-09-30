<header>
	<nav>
		<ul class="nav nav-tabs">
			<li role="presentation" class="active">
				<a href="#">Bienvenido <?php echo $_SESSION["usuario"]?></a>
			</li>
			<li class="float-right">
				<a class="pointer" ng-click="cerrarSesion()">Cerrar sesión</a>
			</li>
			<?php 
			if($_SESSION["id"] == 1)
			{
				echo 
				'<li role="presentation" class="float-right">
				<a href="#/admin">Administración</a>
			</li>';
			}
			?>
			<?php 
			if($_SESSION["id"] == 1 || $_SESSION["id"] == 2 )
			{
				echo 
				'<li role="presentation" class="float-right">
				<a href="#/paraavisar">Para avisar</a>
			</li>';
			}
			?>

		<li role="presentation" class="float-right">
			<a href="#/reportes">Reportes</a>
		</li>
		<li role="presentation" class="float-right">
			<a href="#/entregados">Entregados</a>
		</li>
		<li role="presentation" class="float-right">
			<a href="#/terminados">Terminados</a>
		</li>
		<li role="presentation" class="float-right">
			<a href="#/taller">Taller</a>
		</li>
		<li role="presentation" class="float-right">
			<a href="#/tareas">Mis tareas</a>
		</li>
		<li role="presentation" class="float-right">
			<a href="#/agregar">Agregar equipo</a>
		</li>
	</ul>
</nav>
</header>

<div ng-view></div>