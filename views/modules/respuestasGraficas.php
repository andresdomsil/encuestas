<?php 
if(!isset($_SESSION["tipo_user"])){
	header("location:index.php");
}else if($_SESSION["tipo_user"]!=1){
	header("location:index.php");
}
require_once "views/modules/template/header.php";
?>
<script type="text/javascript">
	titulo="Estadisticas en graficas";
	id="p_estadisticas";
	id2="p_respcharts";
</script>
<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-file-text position-left"></i> <span class="text-semibold">Estadisticas en Graficas</span></h3>
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
						<h5 class="panel-title"><i class="icon-search4 position-left"></i> Buscar encuesta</h5>
					</div>
					
					<div class="panel-body">
							
						<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
							<div class="form-group">
								<label class="col-lg-12 h4 control-label">Nombre de la encuesta</label>
								<div class="col-lg-12">
									<select data-placeholder="Selecione una encuesta" id="id_3" name="id_3" onchange="llenargraficas(this.value)" class="select">
										<option></option>
										<?php
											$c = new controllerEncuestas();
											$c->visualizarEncuestasControllerSelect();
										?>
									</select>
								</div>
								
							</div>
							
						</div>

						
					</div>
				</div>	

				<div class="panel panel-white">
					<div class="panel-heading">
						<h5 class="panel-title"><i class="icon-pie-chart5 position-left"></i> Estadisticas</h5>
					</div>
					
					<div id="panelesGraficas" class="panel-body">
								
					</div>
				</div>				

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<script type="text/javascript" src="recursos/js/plugins/Charts/Chart.js"></script>
	<script type="text/javascript" src="recursos/js/respuestasGraficas.js"></script>