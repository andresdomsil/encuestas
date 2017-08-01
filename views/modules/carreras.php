<?php 
if(!isset($_SESSION["tipo_user"])){
	header("location:index.php");
}else if($_SESSION["tipo_user"]!=1){
	header("location:index.php");
}
require_once "views/modules/template/header.php";
?>
<script type="text/javascript">
	titulo="Carreras";
	id="p_datos";
	id2="p_carreras";
</script>
<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-graduation2 position-left"></i> <span class="text-semibold">Carreras</span></h3>
			</div>
		</div>
	</div>
	<!-- /page header -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">			

			<!-- Main content -->
			<div class="content-wrapper">


			<div class="row">
				<div class="col-md-4">

				<div class="panel panel-white">
					<div class="panel-heading">
						<h5 class="panel-title"><i class="icon-pencil position-left"></i> Nueva Carrera</h5>
					</div>
					<div class="panel-body">
						<form id="formcarrera" method="post" class="form-horizontal">
							
								<div class="form-group">
									<label class="control-label">Nombre de la Carrera</label>
									<div class="">
										<input type="text" id="newcarrera" name="newcarrera" class="form-control" placeholder="Ingeniería ....">
									</div>
									<input type="text" id="op" name="op" class="noVisible" value="2">
								</div>
							
							
								<div class="text-center">
									<input type="button" class="btn btn-primary" onclick="newCarrera()" value="Registrar Carrera"/>
								</div>
							
						</form>
					</div>
					
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-white">
					
					
					<div class="dtcarrera">
						<table id="tabla_Carreras" class="table datatable-button-init-basic table-hover table-framed table-striped table-bordered bg-blue-800">
							<thead>
								<tr>
									<th width="80%">NOMBRE</th>
									<th>OPCIONES</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
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
	
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/dataTables.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="recursos/js/pages/datatables_extension_buttons_init.js"></script>
	<script type="text/javascript" src="recursos/js/tablas/tablacarreras.js"></script>