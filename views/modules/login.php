<?php
	if(isset($_SESSION["tipo_user"]) || isset($_SESSION["correo"])){
		if($_SESSION["tipo_user"]==1){
			header('location:index.php?action=inicio');
		}
		if(isset($_SESSION["correo"])){
			header('location:index.php?action=realizar_encuesta');
		}
	}
	
?>
<script type="text/javascript">titutlo="E2M";</script>
<body class="login-container login-cover">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
			<center>
			<img style="max-width: 80%; height: auto;" src="recursos/images/logo_1.png">
			</center>
			<br><br><br>
				<!-- tabbed form -->
				<div class="tabbable panel login-form width-400" >
					<ul class="nav nav-tabs nav-justified">
						<li class="active"><a href="#basic-tab1" data-toggle="tab"><h6 class="text-semibold">Encuestado</h6></a></li>
						<li><a href="#basic-tab2" data-toggle="tab"><h6 class="text-semibold">Administrador</h6></a></li>
					</ul>

					<div class="tab-content panel-body">
						<div class="tab-pane fade in active" id="basic-tab1">
							<!-- Advanced login -->
							<form id="login_1" method="POST" class="form-horizontal form-validate">
								
									<br><br>
										

										<div class="form-group has-feedback has-feedback-left"> <!-- has-feedback has-feedback-left -->
											<input type="email" name="correo" id="correo" style="" class="form-control" placeholder="ejemplo@gmail.com" required="required">
											
											<div class="form-control-feedback">
												<i class="icon-envelop text-muted"></i>
											</div>
											
										</div>
										<input type="text" id="op" name="op" class="noVisible" value="1">
										
										<br>	

										<div class="form-group">
											<div class="text-center">
												<input type="button" class="btn btn-block btn-lg btn-itslp" onclick="login_1();" value="Iniciar Encuesta"/>
											</div>
											<!--
											<button type="submit" class="btn btn-block btn-lg btn-itslp">Iniciar Encuesta <i class="icon-arrow-right14 position-right"></i></button>
											-->
										</div>	
								
							</form>

						
						</div>

						<div class="tab-pane fade" id="basic-tab2">
							<!-- Advanced login -->
							<form id="login_2" method="POST" class="form-horizontal form-validate">
							
									<br><br>
										

										<div class="form-group has-feedback has-feedback-left "> <!-- has-feedback has-feedback-left -->
											<input type="email" name="correo2" id="correo2" class="form-control" placeholder="ejemplo@gmail.com" required="required">
											
											<div class="form-control-feedback">
												<i class="icon-envelop text-muted"></i>
											</div>
											
										</div>

										<div class="form-group has-feedback has-feedback-left "> <!-- has-feedback has-feedback-left -->
											<input type="password" name="pass" id="pass" class="form-control" placeholder="password" required="required">
											
											<div class="form-control-feedback">
												<i class="icon-key text-muted"></i>
											</div>
											
										</div>
										<input type="text" id="op" name="op" class="noVisible" value="2">	
										<br>	

										<div class="form-group">
											<div class="text-center">
												<input type="button" class="btn btn-block btn-lg btn-itslp" onclick="login_2();" value="Iniciar Sesión"/>
											</div>
										</div>	
								
							</form>
						</div>
					</div>
				</div>
				<!-- /tabbed form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<script type="text/javascript" src="recursos/js/login.js"></script>