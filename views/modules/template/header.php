<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php?action=inicio">Sistema de encuestas E2M</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="glyphicon glyphicon-option-vertical"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">

			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<span><?php echo $_SESSION['nombre'];?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="views/modules/salir.php"><i class="icon-switch2"></i> Cerrar Sesión</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	<!-- Second navbar -->
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav navbar-nav-material">
				<li id="p_inicio"><a href="index.php?action=inicio"><i class="icon-display4 position-left"></i> inicio</a></li>
				<li id="p_encuestas" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-file-text position-left"></i> Encuestas <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-250">
						<li class="dropdown-header">Encuestas</li>
						<ul class="menu-list">
							<li id="p_crearencuesta2">
								<a href="index.php?action=crearencuesta2"><i class="icon-plus3"></i> Crear nueva encuesta</a>
							</li>
							<li id="p_verEncuestas">
								<a href="index.php?action=verEncuestas"><i class="icon-eye"></i> Ver encuestas</a>
							</li>
							<li id="p_editencuestas">
								<a href="index.php?action=editencuesta"><i class="icon-pencil7"></i> Editar encuesta</a>
								
							</li>
						</ul>
					</ul>
				</li>

				<li id="p_datos" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-file-plus position-left"></i> Datos <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-250">
						<li class="dropdown-header">Datos</li>
						<ul class="menu-list">
							<li id="p_carreras">
								<a href="index.php?action=carreras"><i class="icon-graduation"></i> Carreras</a>
							</li>
							<li id="p_tipoencuestado">
								<a href="index.php?action=tipoencuestado"><i class="icon-users"></i> Tipo de encuestado</a>
							</li>
							<li id="p_tipoencuestado">
								<a href="index.php?action=personasaencuestar"><i class="icon-people"></i> Personas a encuestar</a>
							</li>
							<li id="p_usuarios">
								<a href="index.php?action=usuarios"><i class="icon-user-plus"></i> Usuarios</a>
							</li>
						</ul>
					</ul>
				</li>

				<li id="p_estadisticas" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-chart position-left"></i> Estadisticas <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li id="p_detalles_encuestados">
							<a href="index.php?action=detalles_encuestados"><i class="icon-table"></i>Detalles de encuestados</a>
						</li>
						<li class="dropdown-header">Tablas</li>
						<li id="p_respTable">
							<a href="index.php?action=respuestasTablas"><i class="icon-table"></i>Respuestas en Tablas</a>
						</li>
						<li class="dropdown-header">Graficas</li>
						<li id="p_respcharts">
							<a href="index.php?action=respuestasGraficas"><i class="icon-pie-chart5"></i>Graficas de Barras</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /second navbar -->