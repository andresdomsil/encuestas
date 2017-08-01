<?php 
if(!isset($_SESSION["tipo_user"])){
	header("location:index.php");
}else if($_SESSION["tipo_user"]!=1){
	header("location:index.php");
}
require_once "views/modules/template/header.php";
?>
<script type="text/javascript">
	titulo="Tipo de Ecuestado";
	id="p_datos";
	id2="p_tipoencuestado";
</script>
<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-graduation2 position-left"></i> <span class="text-semibold">Tipo de encuestado</span></h3>
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
				
						<!-- Title with left icon -->
						<div class="panel panel-white">
							<div class="panel-heading">
								<h6 class="panel-title"><i class="icon-pencil position-left"></i> Nuevo tipo de encuestado</h6>
							</div>
							
							<div class="panel-body">
								<form id="formTipoEncuestado" method="post" class="form-horizontal">
							<div class="">
								<div class="form-group">
									<label class="control-label">Nombre de el tipo encuestado</label>
									<div class="">
										<input type="text" id="newTipoEncuestado" name="newTipoEncuestado" class="form-control" placeholder="alumno ....">
									</div>
									<input type="text" id="op" name="op" class="noVisible" value="2">
								</div>
							</div>
							<div class="">
								<div class="text-center">
									<input type="button" class="btn btn-primary" onclick="newTipo_Encuestado()" value="Registrar tipo de encuestado"/>
								</div>
							</div>
						</form>
							</div>
						</div>
						<!-- /title with left icon -->
				</div>
				<div class="col-md-8">

					<div class="panel panel-white">
					
					
					
						<table id="tabla_TipoEncuestado" class="table datatable-button-init-basic table-hover table-framed table-striped table-bordered bg-blue-800">
							<thead>
								<tr>
									<th width="80%">NOMBRE</th>
									<th width="20%">OPCIONES</th>
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

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/dataTables.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="recursos/js/pages/datatables_extension_buttons_init.js"></script>
	<script type="text/javascript" src="recursos/js/tablas/tablaTipoEncuestado.js"></script>