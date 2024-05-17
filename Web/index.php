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

$hour = date('H');
$fondo = '/img/FondoDia.jpg';
if ($hour >= 6 && $hour < 12) 
{
    $fondo = '/img/FondoDia.jpg';
} 
elseif ($hour >= 12 && $hour < 18) 
{
    $fondo = '/img/FondoDia.jpg';
} 
else 
{
    $fondo = '/img/FondoNoche.jpg';
}

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
		<section id="inicio" style="background: url(<?php echo $fondo; ?>) top center;">
			<div id="inicioContainer" class="inicio-container">
				<div class="row">
					<div class="col text-center">
						<h1>
							<div class="effect">
								<span>Bienvenido al Tiempo  Maya</span>
								<span>Bienvenido al Tiempo  Maya</span>
							</div>
						</h1>
					</div>
				</div>

				<div class="row my-4">
					<div class="col principal" style="">
						<?php
							echo "<img src='img/uinal/$img1.png' alt='imagen de $img1' class='index-img' />";
							echo "<h4 class='text-white text-center mt-4 info w-full'>$haab</h4>";
						?>
					</div>
					<div class="col principal">
						<?php
							echo "<img src='img/nahual/$img2.png' alt='imagen de $img2' class='index-img' />";
							echo "<h4 class='text-white text-center mt-4 info'>$cholquij</h4>";
						?>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div class='principal' style="padding: 15px; width: auto;">
							<table class="tabla-info">
								<tr>
									<th><i class='fas fa-arrow-right' style="font-size: 0.55rem; color:rgb(248, 248, 96)"></i> Calendario Haab</th>
									<td><?php echo isset($haab) ? $haab : ''; ?></td>
								</tr>
								<tr>
									<th><i class='fas fa-arrow-right' style="font-size: 0.55rem; color:rgb(248, 248, 96)"></i> Calendario Cholquij</th>
									<td><?php echo isset($cholquij) ? $cholquij : ''; ?></td>
								</tr>
								<tr>
									<th><i class='fas fa-arrow-right' style="font-size: 0.55rem; color:rgb(248, 248, 96)"></i> Cuenta Larga</th>
									<td><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></td>
								</tr>
								<tr>
									<th><i class='fas fa-arrow-right' style="font-size: 0.55rem; color:rgb(248, 248, 96)"></i> Fecha a Consultar</th>
									<td><?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php include "blocks/bloquesJs1.html" ?>
    <script src="https://cdn.skypack.dev/spltjs@1.0.8"></script>
    <script src="https://cdn.skypack.dev/animejs@3.2.1"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            splt({});

            anime({
                targets: '.char',
                loop: true,
                direction: 'alternate',
                translateY: [0, -20],
                delay: anime.stagger(25),
            });
        });
    </script>

</body>

</html>