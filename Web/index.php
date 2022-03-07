<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
	$fecha_consultar = $_GET['fecha'];
} else {
	date_default_timezone_set('US/Central');
	$fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual . " " . strval($energia);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Tiempo Maya</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<?php include "blocks/bloquesCss.html" ?>
	<link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
	<link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo (rand()); ?>" />
	<link rel="stylesheet" href="css/animation.css" />
	<link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />


</head>

<body>

	<?php include "NavBar.php" ?>
	<div>
		<section id="inicio">
			<div id="inicioContainer" class="inicio-container">
				<h1><br><br>Bienvenido al Tiempo Maya</h1>
				<div id='formulario' style="padding: 15px; width: auto;">
					<h5 style="color: whitesmoke;">Calendario Haab : <?php echo isset($haab) ? $haab : ''; ?></h5>
					<h5 style="color: whitesmoke;">Calendario Cholquij : <?php echo isset($cholquij) ? $cholquij : ''; ?></h5>
					<h5 style="color: whitesmoke;">Cuenta Larga : <?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></h5>
					<label style="color: whitesmoke;"><?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></label>
				</div>
			</div>
		</section>
	</div>


	<?php include "blocks/bloquesJs1.html" ?>
	<script src="js/animation.js"></script>

</body>

</html>