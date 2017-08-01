<?php 
if(!isset($_SESSION["tipo_user"])){
	header("location:index.php");
}else if($_SESSION["tipo_user"]!=1){
	header("location:index.php");
}
require_once "views/modules/template/header.php";
$c = new controllerEncuestas();
?>
<script type="text/javascript">
	titulo="Editar encuesta";
	id="p_encuestas";
	id2="p_editencuestas";
</script>
	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-file-text position-left"></i> <span class="text-semibold">Edición de encuestas</span></h3>
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
					<form id="formencuesta_preguntas" method="POST" class="form-horizontal">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-pencil position-left"></i> Agregar nuevas preguntas</h5>
						</div>
						
						<div class="panel-body">
								
							<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
								<div class="form-group">
									<label class="col-lg-12 h4 control-label">Nombre de la encuesta</label>
									<div class="col-lg-12">
										<select data-placeholder="Selecione una encuesta" id="id_3" name="id_3" class="select">
											<option></option>
											<?php
												$c->visualizarEncuestasControllerSelect();
											?>
										</select>
									</div>
									
								</div>
								<h4>Preguntas</h4>
							</div>

							<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2" id="preguntas">
							
							</div>
							<input type="text" id="op" name="op" class="noVisible" value="3">
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
								<br><input type="button" class="btn btn-primary col-md-12" onclick="mostrarlista()" value="Registrar Encuesta con Preguntas"/>
									<!--
									<br><button type="submit" class="btn btn-primary col-md-12">Finalizar encuesta <i class="icon-arrow-right14 position-right"></i></button>
									-->
								</div>
							</div>
						</div>
					</form>
				</div>	
				<div class="row">
					<div class="col-lg-4">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-trash position-left"></i> Modificar encuesta</h5>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" id="modificar1">
									<div class="form-group">
										<label class="h6 control-label">Encuesta</label>
										<select data-placeholder="Selecione una encuesta" id="selEcnuestas4" name="selEcnuestas4" class="select" onchange="llenarEncuesta(this.value)">
											<option></option>
											<?php
												$c->visualizarEncuestasControllerSelect();
											?>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">Nuevo nombre de la Encuesta</label>
										<input type="text" name="nombreEncuesta" id="nombreEncuesta" class="form-control" disabled>
									</div>
								</form>
								<input type="button" class="btn btn-success col-lg-12" onclick="modificarEncuesta()" value="Modificar encuesta"/>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-trash position-left"></i> Modificar pregunta</h5>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" id="modificar2">
									<div class="form-group">
										<label class="h6 control-label">Encuesta</label>
										<select data-placeholder="Selecione una encuesta" onchange="llenarpreguntas(this.value,5)" id="selEcnuestas5" name="selEcnuestas5" class="select">
											<option></option>
											<?php 
												$c->visualizarEncuestasControllerSelect();
											?>
										</select>
									</div>
									<div class="form-group">
										<label class="h6 control-label">Pregunta</label>
										<select data-placeholder="Seleccione una pregunta" id="selPreguntas5" name="selPreguntas5" class="select" disabled onchange="llenarPregunta(this.value)">			
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">Nuevo nombre de la pregunta</label>
										<input type="text" name="nombrePregunta" id="nombrePregunta" class="form-control" disabled>
									</div>
								</form>
								<input type="button" class="btn btn-success col-lg-12" onclick="modificarpregunta()" value="Modificar pregunta"/>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-trash position-left"></i> Modificar respuesta</h5>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" id="modificar3">
									<div class="form-group">
										<label class="h6 control-label">Encuesta</label>
										<select data-placeholder="Selecione una encuesta" onchange="llenarpreguntas(this.value,4)" id="selEcnuestas6" name="selEcnuestas6" class="select">
											<option></option>
											<?php 
												$c->visualizarEncuestasControllerSelect();
											?>
										</select>
									</div>
									<div class="form-group">
										<label class="h6 control-label">Pregunta</label>
										<select data-placeholder="Seleccione una pregunta" onchange="llenarRespuestas(this.value,1)" id="selPreguntas4" name="selPreguntas4" class="select" disabled>
										</select>
									</div>
									<div class="form-group">
										<label class="h6 control-label">Respuesta</label>
										<select data-placeholder="Seleccione una respuesta" id="selRespuestas1" name="selRespuestas1" class="select" disabled onchange="llenarRespuesta(this.value)">	
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">Nuevo nombre de la respuesta</label>
										<input type="text" name="nombreResp" id="nombreResp" class="form-control" disabled>
									</div>
								</form>
								<input type="button" class="btn btn-success col-lg-12" onclick="modificarRespuesta()" value="Modificar respuesta"/>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-trash position-left"></i> Eliminar encuesta</h5>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" id="delete1">
									<div class="form-group">
										<label class="h6 control-label">Encuesta</label>
										<select data-placeholder="Selecione una encuesta" id="selEcnuestas1" name="selEcnuestas1" class="select">
											<option></option>
											<?php
												$c->visualizarEncuestasControllerSelect();
											?>
										</select>
									</div>
								</form>
								<input type="button" class="btn btn-danger col-lg-12" onclick="deleteEncuesta()" value="Eliminar encuesta"/>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-trash position-left"></i> Eliminar pregunta</h5>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" id="delete2">
									<div class="form-group">
										<label class="h6 control-label">Encuesta</label>
										<select data-placeholder="Selecione una encuesta" onchange="llenarpreguntas(this.value,2)" id="selEcnuestas2" name="selEcnuestas2" class="select">
											<option></option>
											<?php 
												$c->visualizarEncuestasControllerSelect();
											?>
										</select>
									</div>
									<div class="form-group">
										<label class="h6 control-label">Pregunta</label>
										<select data-placeholder="Seleccione una pregunta" id="selPreguntas2" name="selPreguntas2" class="select" disabled>			
										</select>
									</div>
								</form>
								<input type="button" class="btn btn-danger col-lg-12" onclick="deletepregunta()" value="Eliminar pregunta"/>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h5 class="panel-title"><i class="icon-trash position-left"></i> Eliminar respuesta</h5>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" id="delete3">
									<div class="form-group">
										<label class="h6 control-label">Encuesta</label>
										<select data-placeholder="Selecione una encuesta" onchange="llenarpreguntas(this.value,3)" id="selEcnuestas3" name="selEcnuestas3" class="select">
											<option></option>
											<?php 
												$c->visualizarEncuestasControllerSelect();
											?>
										</select>
									</div>
									<div class="form-group">
										<label class="h6 control-label">Pregunta</label>
										<select data-placeholder="Seleccione una pregunta" onchange="llenarRespuestas(this.value,2)" id="selPreguntas3" name="selPreguntas3" class="select" disabled>
										</select>
									</div>
									<div class="form-group">
										<label class="h6 control-label">Respuesta</label>
										<select data-placeholder="Seleccione una respuesta" id="selRespuestas2" name="selRespuestas2" class="select" disabled>	
										</select>
									</div>
								</form>
								<input type="button" class="btn btn-danger col-lg-12" onclick="deleteRespuesta()" value="Eliminar respuesta"/>
							</div>
						</div>
					</div>
				</div>		

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<script type="text/javascript" src="recursos/js/preguntas.js"></script>
	<script type="text/javascript" src="recursos/js/editEncuestas.js"></script>