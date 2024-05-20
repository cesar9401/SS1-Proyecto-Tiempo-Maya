<?php session_start(); ?>
<?php
date_default_timezone_set('US/Central');
include("backend/buscar/conseguir_cruz.php");

$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
	$fecha_consultar = $_GET['fecha'];
} else {
	$fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual . " " . strval($energia);
$img1 = strtolower(str_replace("'", "", preg_replace("/([\']|\w+) (\d+)/", '${1}', $haab)));
$img2 = strtolower(str_replace("'", "", preg_replace("/([\']+|\w+) (\d+)/", '${1}', $cholquij)));

$cruz_info = getCruzInfo($nahual, $conn);
$nac_img = strtolower(str_replace("'", "", preg_replace("/([\']+|\w+) (\d+)/", '${1}', $cruz_info['nacimiento'])));
$conc_img = strtolower(str_replace("'", "", preg_replace("/([\']+|\w+) (\d+)/", '${1}', $cruz_info['concepcion'])));
$des_img = strtolower(str_replace("'", "", preg_replace("/([\']+|\w+) (\d+)/", '${1}', $cruz_info['destino'])));
$izq_img = strtolower(str_replace("'", "", preg_replace("/([\']+|\w+) (\d+)/", '${1}', $cruz_info['izquierdo'])));
$der_img = strtolower(str_replace("'", "", preg_replace("/([\']+|\w+) (\d+)/", '${1}', $cruz_info['derecho'])));

$fuerza = $energia;
$energia_info = getEnergiaInfo($fuerza, $conn);
$nahual_significado = getNahualSignificado($nahual, $conn);
$animal = getAnimalGuia($nahual, $conn);

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
	<link rel="stylesheet" href="./css/calculadora.css" />
	<!-- <link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" /> -->
</head>

<body>

	<?php include "NavBar.php" ?>
	<div>
		<section id="inicio">
			<div id="inicioContainer" class="inicio-container">

				<div id='formulario'>
					<h1>Calculadora</h1>
					<form action="#" method="GET">
						<div class="mb-1">
							<label for="fecha" class="form-label">Fecha</label>
							<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
						</div>
						<button type="submit" class="btn btn-get-started"><i class="far fa-clock"></i> Calcular</button>
					</form>

					<div class="info-container">
						<div>
							<?php
							echo "<img src='img/uinal/$img1.svg' alt='imagen de $img1' class='index-img' />";
							echo "<h4 class='text-white text-center mt-4 info'>$haab</h4>";
							?>
						</div>
						<div>
							<?php
							echo "<img src='./img/nahual/$img2.png' alt='imagen de $img2' class='index-img' />";
							echo "<h4 class='text-white text-center mt-4 info'>$cholquij</h4>";
							?>
						</div>
						<div>
							<?php
							echo "<img src='./img/calendario.png' alt='imagen de calendario' class='index-img' />";
							echo "<h4 class='text-white text-center mt-4 info'>$cuenta_larga</h4>";
							?>
						</div>
					</div>
				</div>
				<img class="row-img" src="./img/flecha.png" />
			</div>
		</section>
		<section id="details">
			<div>
				<h2>Infografía</h2>
				<div class="infografia-grid">
					<div>
						<h3 class="infografia-text">Tu fuerza</h3>
						<?php
							echo "<img src=\"./img/numeros/$fuerza.png\" class='index-img'/>"
						?>
					</div>
					<div>
						<h3 class="infografia-text">Tu nahual</h3>
						<?php
							echo "<img src=\"img/nahual/$nac_img.png\" alt=\"imagen de " . $nahual . "\" class='index-img' />"
						?>
					</div>
					<div>
						<h3 class="infografia-text">Fuerza en idioma maya</h3>
						<?php
							echo "<h4 class=\"infografia-text\">". $energia_info['nombre'] ."</h4>"
						?>
					</div>

					<div>
						<h3 class="infografia-text">Significado</h3>
						<?php
							echo "<h4 class=\"infografia-text\">". $nahual_significado ."</h4>"
						?>
					</div>
					<div>
						<h3 class="infografia-text">Capacidades</h3>
						<?php
							echo "<h4 class=\"infografia-text\">". $energia_info['significado'] ."</h4>"
						?>
					</div>
					<div>
						<h3 class="infografia-text">Animal guía</h3>
						<?php
							echo "<h4 class=\"infografia-text\">". $animal ."</h4>"
						?>
					</div>
				</div>
			</div>
			<div>
				<?php
				echo "<h3>Cruz Maya del ".$cruz_info['nacimiento']."</h3>"
				?>
				<div class="cruz-grid">
					<div class="cruz-nacimiento">
						<?php
						echo "<figure class=\"figure\">
								<img src=\"img/nahual/$nac_img.png\" alt=\"imagen de " . $cruz_info['nacimiento'] . "\" class='index-img' />
							</figure>
							<div class='text-center mt-4 info'>
								<h6 class='text-white'>Nacimiento</h6>
								<h4 class='text-white'>".$cruz_info['nacimiento']."</h4>
							</div>
						"
						?>
					</div>
					<div class="cruz-concepcion">
					<?php
						echo "<figure class=\"figure\">
								<img src=\"img/nahual/$conc_img.png\" alt=\"imagen de " . $cruz_info['concepcion'] . "\" class='index-img' />
							</figure>
							<div class='text-center mt-4 info'>
								<h6 class='text-white'>Concepción</h6>
								<h4 class='text-white'>".$cruz_info['concepcion']."</h4>
							</div>
							"	
						?>
					</div>
					<div class="cruz-destino">
					<?php
						echo "<figure class=\"figure\">
								<img src=\"img/nahual/$des_img.png\" alt=\"imagen de " . $cruz_info['destino'] . "\" class='index-img' />
							</figure>
							<div class='text-center mt-4 info'>
								<h6 class='text-white'>Destino</h6>
								<h4 class='text-white'>".$cruz_info['destino']."</h4>
							</div>
							"
						?>
					</div>
					<div class="cruz-izquierdo">
					<?php
						echo "<figure class=\"figure\">
								<img src=\"img/nahual/$izq_img.png\" alt=\"imagen de " . $cruz_info['izquierdo'] . "\" class='index-img' />
							</figure>
							<div class='text-center mt-4 info'>
								<h6 class='text-white'>Izquierda</h6>
								<h4 class='text-white'>".$cruz_info['izquierdo']."</h4>
							</div>

							"
						?>
					</div>
					<div class="cruz-derecho">
					<?php
						echo "<figure class=\"figure\">
								<img src=\"img/nahual/$der_img.png\" alt=\"imagen de " . $cruz_info['derecho'] . "\" class='index-img' />
							</figure>
							<div class='text-center mt-4 info'>
								<h6 class='text-white'>Derecha</h6>
								<h4 class='text-white'>".$cruz_info['derecho']."</h4>
							</div>
							"
						?>
					</div>
				</div>
			</div>
		</section>
	</div>


	<?php include "blocks/bloquesJs1.html" ?>
	<script src="js/animation.js"></script>
	<script src="js/changeBackground.js"></script>

</body>

</html>