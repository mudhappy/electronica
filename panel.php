<header>
	<nav>
		<ul class="nav nav-tabs">
			<li>
				<a>Bienvenido <?php echo $_SESSION["usuario"]?></a>
			</li>
			<li class="float-right">
				<a class="pointer" ng-click="logout()">Cerrar sesión</a>
			</li>
		</ul>
	</nav>
</header>

<div ng-view></div>

<script src="./js/angular.js"></script>