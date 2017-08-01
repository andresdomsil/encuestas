<!DOCTYPE html>
<html lang="MX">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="recursos/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="recursos/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="recursos/css/core.css" rel="stylesheet" type="text/css">
	<link href="recursos/css/components.css" rel="stylesheet" type="text/css">
	<link href="recursos/css/colors.css" rel="stylesheet" type="text/css">

	<link href="recursos/css/estilos.css" rel="stylesheet" type="text/css">	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="recursos/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="recursos/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="recursos/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/ui/drilldown.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="recursos/js/alertas.js"></script>
	<script type="text/javascript" src="recursos/js/activos.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="recursos/js/plugins/forms/validation/validate.js"></script>
	<script type="text/javascript" src="recursos/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="recursos/js/core/app.js"></script>
	<script type="text/javascript" src="recursos/js/pages/form_layouts.js"></script>
	<script type="text/javascript" src="recursos/js/pages/login_validation.js"></script>

	<script type="text/javascript" src="recursos/js/plugins/ui/ripple.min.js"></script>

	<script type="text/javascript" src="recursos/js/plugins/notifications/sweet_alert.min.js"></script>
	<!-- /theme JS files -->

</head>

<?php

$mvc = new MvcController();
$mvc -> enlacesPaginasController();

?>

<!-- Footer -->
	<div class="footer text-muted text-center" id="footer1">
		&copy; 2017. <a href="http://www.itslp.edu.mx" target="_blank"> Instituto Tecnológico de San Luis Potosí. </a>Algunos derechos reservados.
	</div>
	<!-- /footer -->

</body>
</html>