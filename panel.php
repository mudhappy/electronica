<header>
	<nav>
		<ul class="nav nav-tabs">
			<li>
				<a class="titulo">Bienvenido <?php echo $_SESSION["usuario"]?></a>
			</li>
			<li class="float-right">
				<a class="pointer" ng-click="logout()">Cerrar sesión</a>
			</li>
			<li class="float-right">
				<a href="#/reportes">Reportes</a>
			</li>
			<li class="float-right">
				<a href="#/entregados">Equipos entregados</a>
			</li>
			<li class="float-right">
				<a href="#/terminados">Equipos terminados</a>
			</li>
			<li class="float-right">
				<a href="#/taller">Equipos en taller</a>
			</li>
			<li class="float-right">
				<a href="#/tareas">Mis tareas</a>
			</li>
		</ul>
	</nav>
</header>

<div ng-view></div>

<script src="./js/angular.js"></script>