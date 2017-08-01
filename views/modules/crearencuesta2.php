<?php 
if(!isset($_SESSION["tipo_user"])){
	header("location:index.php");
}else if($_SESSION["tipo_user"]!=1){
	header("location:index.php");
}
require_once "views/modules/template/header.php";
?>
<script type="text/javascript">
	titulo="Crear nueva Encuesta";
	id="p_encuestas";
	id2="p_crearencuesta2";
</script>
	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-file-text position-left"></i> <span class="text-semibold">Crear nueva encuesta</span></h3>
			</div>
		</div>
	</div>
	<!-- /page header -->
	<div class="page-container">
		<img src="recursos/images/espera.gif" class="gif" id="gif">
		<!-- Page content -->
		<div class="page-content">			

			<!-- Main content -->
			<div class="content-wrapper">

				<div class="panel panel-white">
					<form class="form-horizontal">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-pencil position-left"></i> Nueva encuesta</h5>
						</div>
						<div class="panel-body">
							<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
								<div class="form-group">
									<label class="col-lg-3 control-label">Nombre de la Encuesta</label>
									<div class="col-lg-9">
										<input type="text" name="nombre" id="nombre" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Seleccione la carrera</label>
									<div class="col-lg-9">
										<select data-placeholder="Carreras" id="id_1" name="id_1" class="select">
											<option></option>
											<?php 
												$a = new controllerCarreras();
												$a->visualizarCarreraControllerSelect();
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-3 control-label">Encuesta dirigida a</label>
									<div class="col-lg-9">
										<select data-placeholder="A quien" id="id_2" name="id_2" class="select">
											<option></option>
											<?php 
												$a = new controllerTipoEncuestado();
												$a->visualizarTipoEncuestadoControllerSelect();
											?>
										</select>
									</div>
								</div>
								<h4>Preguntas</h4>
							</div>

							<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2" id="preguntas">
							
							</div>
							<div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2">
								<div class="text-left">
									<input type="button" class="btn btn-success col-md-12" onclick="newquestion()" value="Nueva pregunta"/>
								</div>
							</div>
							<div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2">
								<div class="text-left">
									<input type="button" class="btn btn-danger col-md-12 noVisible" onclick="deletequestion()" id="removequestion" value="Eliminar ultima pregunta"/>
								</div>
							</div>

							<div class="col-lg-8 col-lg-offset-2 col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2">
								<div class="text-center">
									<br><input type="button" class="btn btn-primary col-md-12" onclick="mostrarlista2()" value="Finalzar Encuesta"/>
									<br>
									<br><input type="button" class="btn btn-succes col-md-12" onclick="vistaPrevia()" value="Visualizar encuesta"/>
								</div>
							</div>
						</div>
					</form>
				</div>

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<script type="text/javascript" src="recursos/js/preguntas.js"></script>