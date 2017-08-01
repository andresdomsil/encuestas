<?php 
require_once "views/modules/template/header2.php";
?>
<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h3><i class="icon-file-text position-left"></i> <span class="text-semibold">Vista previa de la encuesta</span></h3>
                <h6>Si alguna letra con acento se llega a ver en minuscula este problema se cambiará al registrar la encuesta. En la vista previa puede notarce aun asi. </h6>
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
						<h3 class="panel-title col-lg-8 col-lg-offset-2"><i class="icon-pencil position-left"></i> <?php echo $_SESSION["nombre_vp"]; ?></h3>
                        
						<br><br><br>
					</div>
					<div class="panel-body">
						<div class="col-lg-6 col-lg-offset-3">
							<form id="formencuesta" class="form-horizontal">
							<?php 
                            $j=1;
                            foreach ($_SESSION['preguntas_vp'] as $a){
								echo '<div class="form-group"><label class="text-bold h5 display-block">'.$j.'.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.strtoupper($a[0]).'</label>';
                                if($a[1]==1){
                                    foreach ($a[2] as $r){
                                        echo '<div class="radio-inline"><label>'.
                                                '<input type="radio" name="respuestaspreg'.$j.'" class="styled">'.
                                                strtoupper($r).
                                            '</label></div>';
                                    }
                                }else if($a[1]==2){
                                    $i=1;
                                    foreach ($a[2] as $r){
                                        echo '<div class="checkbox"><label>'.
                                                    '<input type="checkbox" class="styled">'.
                                                    strtoupper($r).
                                                '</label></div>';
                                        $i++;
                                    }
                                }else if($a[1]==3){
                                    echo '<input type="text" class="form-control maxlength-threshold" maxlength="100" placeholder="Respuesta....">';
                                }
                                echo '</div>';
                                $j++;
                            }
							?>
							</form>
						</div>
					</div>
				</div>			
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->
        <h2>Para terminar de ver la vista previa solo cierre esta pestaña y continue con su encuesta.</h2>

	</div>
	<!-- /page container -->
	<script type="text/javascript" src="recursos/js/encuestasRealizadas.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/forms/styling/switchery.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/forms/styling/switch.min.js"></script>

	<script type="text/javascript" src="recursos/js/pages/form_checkboxes_radios.js"></script>
	