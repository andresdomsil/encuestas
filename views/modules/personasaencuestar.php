<?php 
if(!isset($_SESSION["tipo_user"])){
	header("location:index.php");
}else if($_SESSION["tipo_user"]!=1){
	header("location:index.php");
}
echo "<script>correo=".$_SESSION['correoadmin']."</script>";
require_once "views/modules/template/header.php";
echo '<input type="text" id="siteroot" class="noVisible" value="'.SITE_ROOT.'">';
?>
<script type="text/javascript">
	titulo="Personas a encuestar";
	id="p_datos";
	id2="p_personasaencuestar";
</script>
<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-people position-left"></i> <span class="text-semibold">Personas a encuestar</span></h3>
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
				<div class="col-lg-4">

					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-pencil position-left"></i> Insertar perosnas a encuestar</h5>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label">Seleccione la carrera</label>
								<select data-placeholder="Carreras" id="id_1" name="id_1" class="select">
									<option></option>
									<?php 
										$a = new controllerCarreras();
										$a->visualizarCarreraControllerSelect();
									?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Tipo de personas</label>
								<select data-placeholder="A quien" name="newperosnasaencuestar" id="newperosnasaencuestar" class="select">
									<option></option>
									<?php 
										$a = new controllerTipoEncuestado();
										$a->visualizarTipoEncuestadoControllerSelect();
									?>
								</select>
							</div>

							<div class="form-group">
								<label class="control-label text-semibold">Seleccione el arvhivo excel.xlsx</label>
								 <form action="#" class="dropzone" id="dropzone_file_limits"></form>



							</div>

							<div class="text-center">
								<input type="submit" class="btn btn-primary" onclick="newPersonasAEncuestar()" value="Registrar encuestados"/>
							</div>
						</div>
						
					</div>
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-pencil position-left"></i> Eliminar todos los encuestados registrados</h5>
						</div>
						<div class="panel-body">
							<div class="text-center">
								<input type="submit" class="btn btn-danger" onclick="borrarTabla()" value="Eliminar encuestados"/>
							</div>
						</div>
						
					</div>

				</div>
				<div class="col-lg-8">
					<div class="panel panel-white">
						<table id="tabla_Personasaencuestar" class="table datatable-button-init-basic table-hover table-framed table-striped table-bordered bg-blue-800">
							<thead>
								<tr>
									<th>NOMBRE</th>
									<th>CORREO</th>
									<th>CARRERA</th>
									<th>TIPO DE PERSONA</th>
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
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<!-- Modal -->
	<div class="modal fade" id="editpersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modificar persona</h4>
	      </div>
	      <div class="modal-body">
	      	<form id="formactualizar">
		        <div class="form-group">
					<label class="control-label">Nombre</label>
					<input type="text" name="nom" id="nom" required class="form-control">
				</div>
				<div class="form-group">
					<label class="control-label">Correo</label>
					<input type="email" name="correo" id="correo" required class="form-control">
				</div>
				<div class="form-group noVisible">
					<input type="text" name="id" id="id" required>
				</div>
		        <div class="form-group">
					<label class="control-label">Tipo de encuestado</label>
					<select data-placeholder="A quien" name="sel" id="sel" class="select">
						<option></option>
						<?php 
							$a = new controllerTipoEncuestado();
							$a->visualizarTipoEncuestadoControllerSelect();
						?>
					</select>
				</div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        <button type="button" class="btn btn-primary" onclick="modificarEncuestado()">Editar</button>
	      </div>
	    </div>
	  </div>
	</div>
	
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/dataTables.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="recursos/js/pages/datatables_extension_buttons_init.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/uploaders/dropzone.js"></script>
	<script type="text/javascript" src="recursos/js/pages/uploader_dropzone.js"></script>
	<script type="text/javascript" src="recursos/js/tablas/tablapersonasaencuestar.js"></script>