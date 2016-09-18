<header>
	<nav>
		<ul class="nav nav-tabs">
			<li>
				<a class="titulo">Bienvenido <?php echo $_SESSION["usuario"]?></a>
			</li>
			<li class="float-right">
				<a class="pointer" ng-click="logout()">Cerrar sesión</a>
			</li>
			<?php 
			if($_SESSION["id"] == 1)
			{
				echo 
				'<li class="float-right">
				<a href="#/admin">Administración</a>
				</li>';
			}
			?>
			
			<li class="float-right">
				<a href="#/reportes">Reportes</a>
			</li>
			<li class="float-right">
				<a href="#/entregados">Entregados</a>
			</li>
			<li class="float-right">
				<a href="#/terminados">Terminados</a>
			</li>
			<li class="float-right">
				<a href="#/taller">Taller</a>
			</li>
			<li class="float-right">
				<a href="#/tareas">Mis tareas</a>
			</li>
			<li class="float-right">
				<a href="#/agregar">Agregar equipo</a>
			</li>
		</ul>
	</nav>
</header>

<div ng-view></div>

<script src="./js/angular.js"></script>