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
$img1 = strtolower(str_replace("'", "", preg_replace("/([\']|\w+) (\d+)/", '${1}', $haab)));
$img2 = strtolower(str_replace("'", "", preg_replace("/([\']+|\w+) (\d+)/", '${1}', $cholquij)));

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="icon" href="img/piramide-maya.png">
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
				<div class="row">
					<div class="col text-center">
						<h1><br><br>Bienvenido al Tiempo Maya</h1>
					</div>
				</div>

				<div class="row my-4">
					<div class="col">
						<?php
							echo "<img src='img/uinal/$img1.svg' alt='imagen de $img1' class='index-img' />";
							echo "<h4 class='text-white text-center mt-4 info'>$haab</h4>";
						?>
					</div>
					<div class="col">
						<?php
							echo "<img src='img/nahual/$img2.png' alt='imagen de $img2' class='index-img' />";
							echo "<h4 class='text-white text-center mt-4 info'>$cholquij</h4>";
						?>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div id='formulario' style="padding: 15px; width: auto;">
							<h5 style="color: whitesmoke;">Calendario Haab : <?php echo isset($haab) ? $haab : ''; ?></h5>
							<h5 style="color: whitesmoke;">Calendario Cholquij : <?php echo isset($cholquij) ? $cholquij : ''; ?></h5>
							<h5 style="color: whitesmoke;">Cuenta Larga : <?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></h5>
							<label style="color: whitesmoke;"><?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></label>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php include "blocks/bloquesJs1.html" ?>
	<script src="js/animation.js"></script>

</body>

</html>