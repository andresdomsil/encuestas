<?php 
if(!isset($_SESSION["correo"])){
	header("location:index.php");
}
$a = new controllerEncuestas();
$resp=$a->nombreEncuestaController($_SESSION['id_Carrera'],$_SESSION['idTipo_encuestado']);
$a->verificarEncuestaEncuestadoController($resp["nombre"],$_SESSION["correo"]);
require_once "views/modules/template/header2.php";
?>
<script type="text/javascript">
	titulo="Inicio";
	id="p_inicio";
</script>

<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-file-text position-left"></i> <span class="text-semibold">Realizar encuesta</span></h3>
			</div>
		</div>
	</div>
	<!-- /page header -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">			

			<!-- Main content -->
			<div class="content-wrapper">
				<div class="panel panel-white">
					<div class="panel-heading">
						<h3 class="panel-title col-lg-8 col-lg-offset-2"><i class="icon-pencil position-left"></i> <?php echo $resp["nombre"]; ?></h3>
						<br><br><br>
					</div>
					<div class="panel-body">
						<div class="col-lg-6 col-lg-offset-3">
							<form id="formencuesta" class="form-horizontal">
							<?php 
								echo '<input type="text" class="noVisible" id="id_encuesta" value="'.$resp["id_encuesta"].'"/>';
								$a->visualizarEncuestaEncuestadoController($resp);
							?>
							<div class="text-center">
								<?php echo '<br><input type="button" class="btn btn-primary col-md-12" onclick="registrar(\''.$resp["nombre"].'\',\''.$_SESSION["correo"].'\')" value="Finalzar Encuesta"/>';?>
							</div>
							</form>
						</div>
					</div>
				</div>			
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<script type="text/javascript" src="recursos/js/encuestasRealizadas.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/forms/styling/switchery.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/forms/styling/switch.min.js"></script>

	<script type="text/javascript" src="recursos/js/pages/form_checkboxes_radios.js"></script>
	