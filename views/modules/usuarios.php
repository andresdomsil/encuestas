<?php 
if(!isset($_SESSION["tipo_user"])){
	header("location:index.php");
}else if($_SESSION["tipo_user"]!=1){
	header("location:index.php");
}
require_once "views/modules/template/header.php";
?>
<script type="text/javascript">
	titulo="Usuarios";
	id="p_datos";
	id2="p_usuarios";
</script>
<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-users4 position-left"></i> <span class="text-semibold">Usuarios</span></h3>
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
						<h5 class="panel-title"><i class="icon-pencil position-left"></i> Nuevo Usuario</h5>
					</div>
					<div class="panel-body">
						<form id="formUsuario" method="post" class="form-horizontal">
							
								<div class="form-group">
									<label class="control-label">Nombres</label>
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Juan Jose">
								</div>
								<div class="form-group">
									<label class="control-label">Apellido paterno</label>
									<input type="text" id="ape_pat" name="ape_pat" class="form-control" placeholder="Lopez"> 		
								</div>
								<div class="form-group">
									<label class="control-label">Apellido materno</label>
									<input type="text" id="ape_mat" name="ape_mat" class="form-control" placeholder="Hernandez">
								</div>
								<div class="form-group">
									<label class="control-label">Correo</label>
									<input type="email" id="correo" name="correo" class="form-control" placeholder="ejemplo@ejemplo.com">
								</div>
								<div class="form-group">
									<label class="control-label">Contraseña</label>
									<div class="label-indicator-absolute">
										<input type="text" class="form-control maxlength-custom" maxlength="45" id="pass" name="pass" placeholder="Contraseña">
										<span class="label password-indicator-label-absolute"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Seleccione el tipo de usuario</label>
									<select data-placeholder="tipo de usuario" name="tipo" id="tipo" class="select">
										<option></option>
										<option value="1">Administrador</option>
									</select>
								</div>
							
							
								<div class="text-center">
									<input type="button" class="btn btn-primary" onclick="newUsuario()" value="Registrar Usuario"/>
								</div>
							
						</form>
					</div>
					
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-white">
					
					
					<div class="dtcarrera">
						<table id="tabla_Usuarios" class="table datatable-button-init-basic table-hover table-framed table-striped table-bordered bg-blue-800">
							<thead>
								<tr>
									<th>NOMBRE</th>
									<th>CORREO</th>
									<th>CONTRASEÑA</th>
									<th>TIPO DE USUARIO</th>
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
	<!-- Modal -->
	<div class="modal fade" id="editaruser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modificar Usuario</h4>
	      </div>
	      <div class="modal-body">
	      	<form id="formactualizarusuario">
		        <div class="form-group">
					<label class="control-label">Nombres</label>
					<input type="text" id="nombrem" name="nombrem" class="form-control" placeholder="Juan Jose">
				</div>
				<div class="form-group">
					<label class="control-label">Apellido paterno</label>
					<input type="text" id="ape_patm" name="ape_patm" class="form-control" placeholder="Lopez"> 		
				</div>
				<div class="form-group">
					<label class="control-label">Apellido materno</label>
					<input type="text" id="ape_matm" name="ape_matm" class="form-control" placeholder="Hernandez">
				</div>
				<div class="form-group">
					<label class="control-label">Correo</label>
					<input type="email" id="correom" name="correom" class="form-control" placeholder="ejemplo@ejemplo.com">
				</div>
				<div class="form-group noVisible">
					<input type="text" name="idm" id="idm">
				</div>
				<div class="form-group">
					<label class="control-label">Contraseña</label>
					<div class="label-indicator-absolute">
						<input type="text" class="form-control maxlength-custom" maxlength="45" id="passm" name="passm" placeholder="Contraseña">
						<span class="label password-indicator-label-absolute"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Seleccione el tipo de usuario</label>
					<select data-placeholder="tipo de usuario" name="tipom" id="tipom" class="select">
						<option></option>
						<option value="1">Administrador</option>
						<option value="2">Usuario</option>
					</select>
				</div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        <button type="button" class="btn btn-primary" onclick="modificarUsuario()">Editar</button>
	      </div>
	    </div>
	  </div>
	</div>


	<script type="text/javascript" src="recursos/js/plugins/forms/inputs/passy.js"></script>
	<script type="text/javascript" src="recursos/js/pages/form_controls_extended.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/forms/inputs/autosize.min.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/forms/inputs/formatter.min.js"></script>

	<script type="text/javascript" src="recursos/js/plugins/forms/inputs/maxlength.min.js"></script>
	
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/dataTables.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="recursos/js/pages/datatables_extension_buttons_init.js"></script>
	<script type="text/javascript" src="recursos/js/tablas/tablaUsuarios.js"></script>

