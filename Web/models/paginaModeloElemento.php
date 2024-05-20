<?php

use function PHPSTORM_META\type;

session_start(); ?>
<?php

// include('../backend/buscar/get_src.php');
$conn = include '../conexion/conexion.php';
$tabla = $_GET['elemento'];
$table = strtolower($tabla);
$fmt = $tabla == "uinal" ? "svg" : "png";
$datos = $conn->query("SELECT nombre,significado,htmlCodigo FROM tiempomaya." . $table . ";");
$elementos = $datos;
$informacion = $conn->query("SELECT htmlCodigo FROM tiempomaya.pagina WHERE nombre='" . $tabla . "';");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="icon" href="../img/piramide-maya.png">
	<title>Tiempo Maya - <?php echo $tabla; ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<?php include "../blocks/bloquesCss.html" ?>
	<link rel="stylesheet" href="../css/estilo.css?v=<?php echo (rand()); ?>" />
	<link rel="stylesheet" href="../css/estiloAdmin.css?v=<?php echo (rand()); ?>" />
	<link rel="stylesheet" href="../css/paginaModelo.css?v=<?php echo (rand()); ?>" />
	<link rel="stylesheet" href="../css/animation.css" />
	<link rel="stylesheet" href="../css/index.css?v=<?php echo (rand()); ?>" />

</head>
<?php include "../NavBar2.php" ?>

<body>
	<section id="inicio">
		<div id="inicioContainer" class="inicio-container">

			<?php echo "<h1>" . $tabla . " </h1>";
			?>
			<a href='#informacion' class='btn-get-started'>Informacion</a>
			<a href='#elementos' class='btn-get-started'>Elementos</a>
		</div>
	</section>
	<section id="information">
		<div class="container">
			<div class="row about-container">
				<div class="section-header">
					<h3 class="section-title">INFORMACION</h3>
				</div>
				<?php foreach ($informacion as $info) {
					echo $info['htmlCodigo'];
				} ?>
			</div>

		</div>
	</section>
	<hr>

	<section id="elementos">
		<div class="container">
			<div class="row about-container">
				<div class="section-header">
					<h3 class="section-title">Elementos</h3>
				</div>
				<?php foreach ($datos as $dato) {
					$id = getId($dato["nombre"]);
					$src = getImgSrc($id, "../img/$table", $fmt);
					$html = "<div class='card mb-3 data' id='$id'>";
					$html .= "<div class='card-img-container'><img src='$src' class='card-img-top card-image' alt='" . $dato["nombre"] . "' /></div>";
					$html .= "<div class='card-body'>";
					$html .= "<h1 class='card-title'>" . $dato["nombre"] . "</h1>";
					$html .= "<p class='card-text'><strong>Significado:</strong> " . $dato["significado"] . "</p>";
					$html .= "<p class='card-text'>" . $dato["htmlCodigo"] . "</p>";
					$html .= "</div>";
					$html .= "</div>";
					echo $html;
				} ?>
			</div>

		</div>
	</section>


	<?php include "../blocks/bloquesJs.html" ?>
	<script src="../js/animation.js"></script>
	<script src="../js/changeBackground.js"></script>

</body>

</html>