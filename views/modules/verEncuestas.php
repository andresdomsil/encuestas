<?php 
if(!isset($_SESSION["tipo_user"])){
	header("location:index.php");
}else if($_SESSION["tipo_user"]!=1){
	header("location:index.php");
}
require_once "views/modules/template/header.php";
?>
<script type="text/javascript">
	titulo="Ver Encuestas";
	id="p_encuestas";
	id2="p_verEncuestas";
</script>
<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-graduation2 position-left"></i> <span class="text-semibold">Visualización de encuestas</span></h3>
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
					
					<div class="dtEncuestas">
						<table id="tabla_Encuestas" class="table datatable-button-init-basic table-hover table-framed table-striped table-bordered bg-blue-800">
							<thead>
								<tr>
									<th width="50%">NOMBRE</th>
									<th>CARRERA</th>
									<th>TIPO DE ENCUESTADO</th>
									<th>TOTAL DE ENCUESTADOS</th>
									<th>CONTESTADAS</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
					
				</div>

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/dataTables.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="recursos/js/pages/datatables_extension_buttons_init.js"></script>
	<script type="text/javascript" src="recursos/js/tablas/tablaEncuestas.js"></script>