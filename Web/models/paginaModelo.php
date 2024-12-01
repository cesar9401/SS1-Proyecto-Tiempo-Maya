<?php session_start(); ?>
<?php

$conn = include '../conexion/conexion.php';
$pagina = $_GET['pagina'];
$informacion = $conn->query("SELECT htmlCodigo,seccion,nombre FROM tiempomaya.pagina WHERE categoria='" . $pagina . "' order by orden;");
<<<<<<< Updated upstream
$secciones = $conn->query("SELECT seccion FROM tiempomaya.pagina WHERE categoria='" . $pagina . "' group by seccion order by orden;");
$elementos = $conn->query("SELECT nombre FROM tiempomaya.pagina WHERE categoria='" . $pagina . "' AND nombre!='Informacion' AND seccion!='Informacion' order by orden;");
=======
$secciones = $conn->query("SELECT seccion FROM tiempomaya.pagina WHERE categoria='" . $pagina . "' group by seccion  order by orden;");
$elementos = $conn->query("SELECT nombre FROM tiempomaya.pagina WHERE categoria='" . $pagina . "' AND nombre!='Informacion' AND seccion!='Informacion' order by orden;");

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

>>>>>>> Stashed changes

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="icon" href="../img/piramide-maya.png">
	<title>Tiempo Maya - <?php echo $pagina ?></title>
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
	<section id="inicio"  style="background: url(<?php echo $fondo; ?>) top center;">
		<div id="inicioContainer" class="inicio-container">

			<?php echo "<h1>" . $pagina . " </h1>";
			foreach ($secciones as $seccion) {
				echo " <a href='#" . $seccion['seccion'] . "' class='btn-get-started'>" . $seccion['seccion'] . "</a>";
			}
			?>
		</div>
	</section>

	<?php


<<<<<<< Updated upstream
	foreach ($secciones as $seccion) {
		$stringPrint = "<section id='" . $seccion['seccion'] . "'> <div class='container'> <div class='section-header'><h3 class='section-title'>" . $seccion['seccion'] . " </h3> </div>";
		foreach ($informacion as $info) {
			if ($seccion['seccion'] == $info['seccion']) {
				if ($info['seccion'] != "Informacion") {
=======
    foreach ($secciones as $seccion) {
        $stringPrint = "<section id='" . $seccion['seccion'] . "'> <div class='container'> <div class='section-header'><h3 class='section-title'>" . $seccion['seccion'] . " </h3> </div>";
        foreach ($informacion as $info) {
            if ($seccion['seccion'] == $info['seccion']) {
                if ($info['seccion'] != "Informacion") {

                    $stringPrint .= "<h2><a href='paginaModeloElemento.php?elemento=" . $info['nombre'] . "'/>" . $info['nombre'] . " </a></h2>";
                }
                $stringPrint .= "<hr>";
                $stringPrint .= $info['htmlCodigo'];
                foreach ($elementos as $elemento) {
                    if ($elemento['nombre'] != 'Uayeb' && $elemento['nombre'] == $info['nombre']) {
                        $tabla = strtolower($elemento['nombre']);
                        $elementosEl = $conn->query("SELECT nombre FROM tiempomaya." . $tabla . ";");
                        $stringPrint .= "<ul>";
                        foreach ($elementosEl as $el) {
                            if ($el['nombre'] == "Informacion") {
                                $stringPrint .= "<li> <a href='#'>" . $el['nombre'] . " </a> </li>";
                            } else {
                                $stringPrint .= "<li> <a href='paginaModeloElemento.php?elemento=" . $info['nombre'] . "#" . $el['nombre'] . "'>" . $el['nombre'] . " </a> </li>";
                            }
                        }
                        $stringPrint .= "</ul>";
                    }
                }
            }
        }
        $stringPrint .= "</div> </section> <hr>";
        echo $stringPrint;
    }

    ?>





    <?php include "../blocks/bloquesJs.html" ?>
>>>>>>> Stashed changes

					$stringPrint .= "<h2><a href='paginaModeloElemento.php?elemento=" . $info['nombre'] . "'/>" . $info['nombre'] . " </a></h2>";
				}
				$stringPrint .= "<hr>";
				$stringPrint .= $info['htmlCodigo'];
				foreach ($elementos as $elemento) {
					if ($elemento['nombre'] != 'Uayeb' && $elemento['nombre'] == $info['nombre']) {
						$tabla = strtolower($elemento['nombre']);
						$elementosEl = $conn->query("SELECT nombre FROM tiempomaya." . $tabla . ";");
						$stringPrint .= "<ul>";
						foreach ($elementosEl as $el) {
							if ($el['nombre'] == "Informacion") {
								$stringPrint .= "<li> <a href='#'>" . $el['nombre'] . " </a> </li>";
							} else {
								$stringPrint .= "<li> <a href='paginaModeloElemento.php?elemento=" . $info['nombre'] . "#" . $el['nombre'] . "'>" . $el['nombre'] . " </a> </li>";
							}
						}
						$stringPrint .= "</ul>";
					}
				}
			}
		}
		$stringPrint .= "</div> </section> <hr>";
		echo $stringPrint;
	}

	?>

	<?php include "../blocks/bloquesJs1.html" ?>
	<script src="../js/animation.js"></script>
	<script src="../js/changeBackground.js"></script>

</body>

</html>