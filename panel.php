<header>
	<nav>
		<ul class="nav nav-tabs">
			<li>
				<a>Bienvenido <?php echo $_SESSION["usuario"] ?></a>
			</li>
			<li>
				<a class="pointer" ng-click="logout()">Cerrar sesión</a>
			</li>
		</ul>
	</nav>
</header>

<div ng-controller='miAdmin' ng-view></div>