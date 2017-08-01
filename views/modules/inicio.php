<?php 
if(isset($_SESSION["correo"])){
	header("location:index.php?action=realizar_encuesta");
}
if(!isset($_SESSION["tipo_user"])){
	header("location:index.php");
}else if($_SESSION["tipo_user"]!=1){
	header("location:index.php");
}
require_once "views/modules/template/header.php";
$a = new controllerEncuestas();
$b = new controllerEncuestado();
?>
<script type="text/javascript">
	titulo="Inicio";
	id="p_inicio";
</script>
<!-- Page header -->
<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h3><i class="icon-graduation2 position-left"></i> <span class="text-semibold">Totales</span></h3>
		</div>
	</div>
</div>
<!-- /page header -->
<div class="page-container">
	<div class="row">
		<div class="col-lg-4">
			<!-- Today's revenue -->
			<div class="panel bg-blue-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
		            		<li><a data-action="reload" onclick="actualizacion('EncuestasContestadas')"></a></li>
		            	</ul>
		        	</div>

					<h4 class="no-margin">Encuestas Contestadas</h4>
					<p>Las encuestas que hay han sido contstadas</p>
					<h3 id="EncuestasContestadas"><?php $a->encuestasRealizadasController(); ?></h3>
				</div>
			</div>
			<!-- /today's revenue -->

		</div>
		<div class="col-lg-4">
			<!-- Today's revenue -->
			<div class="panel bg-blue-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
		            		<li><a data-action="reload" onclick="actualizacion('EncuestasCreadas')"></a></li>
		            	</ul>
		        	</div>

					<h4 class="no-margin">Encuestas creadas</h4>
					Todas la encuestas creadas por administradores
					<h3 id="EncuestasCreadas"><?php $a->encuestasCreadasController(); ?></h3>
				</div>
			</div>
			<!-- /today's revenue -->

		</div>
		<div class="col-lg-4">
			<!-- Today's revenue -->
			<div class="panel bg-blue-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
		            		<li><a data-action="reload" onclick="actualizacion('TotalDeEncuestados')"></a></li>
		            	</ul>
		        	</div>

					<h4 class="no-margin">Total de encuestados</h4>
					Total de alumnos, residentes y egresados.
					<h3 id="TotalDeEncuestados"><?php $b->TotalEncuestadosController(); ?></h3>
				</div>
			</div>
			<!-- /today's revenue -->

		</div>
	</div>

	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">			

			<!-- Main content -->
			<div class="content-wrapper">


			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 ">

				<div class="panel panel-white">
					<div class="panel-heading">
						<h5 class="panel-title"><i class="icon-pencil position-left"></i> Enviar correos a los encuestados</h5>
					</div>
					<div class="panel-body">
						<form id="formcarrera" method="post" class="form-horizontal">
							
								<div class="form-group text-center">
									<label class="control-label">Al dar click se enviaran correos a todos las personas a encuestar registradas hasta el momento.</label>
								</div>
								<div class="text-center">
									<input type="button" class="btn btn-primary" onclick="enviarCorreso()" value="Enviar correos"/>
								</div>
							
						</form>
					</div>
					
				</div>
			</div>
			</div>

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>


</div>
<script type="text/javascript" src="recursos/js/actualizaciones.js"></script>
<script type="text/javascript" src="recursos/js/correos.js"></script>
<?php 
$a=null;
$b=null;
?>