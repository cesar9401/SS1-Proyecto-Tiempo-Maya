<?php session_start(); ?>
<?php
date_default_timezone_set('US/Central');
include("backend/buscar/conseguir_cruz.php");
include("backend/buscar/conseguir_infografia.php");

$conn = include "conexion/conexion.php";

date_default_timezone_set('US/Central');

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
<<<<<<< HEAD
	$fecha_consultar = date("Y-m-d");
=======
    $fecha_consultar = date("Y-m-d");
>>>>>>> 156e4d905f28022a54848bc4b1cba2a82b9b4dbb
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual . " " . strval($energia);
<<<<<<< HEAD
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
=======
$nahuals = $nahual;
$energias = $energia;

// Función para obtener el animal guía basado en el nahual
function getAnimalGuia($nahual, $conn)
{
    $query = $conn->query("SELECT nombre FROM animal_nahuatl WHERE nahuatl = '" . $conn->real_escape_string($nahual) . "'");
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        return $row['nombre'] ?? 'Información no disponible';
    } else {
        return "Error en la consulta: " . $conn->error;
    }
}

function getEnergiaInfo($Id, $conn)
{
    $query = $conn->query("SELECT nombre, significado FROM energia WHERE id = " . $Id);
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    } else {
        return "Error en la consulta: " . $conn->error;
    }
}



// Obtiene el animal guía utilizando la función definida anteriormente
$animalGuia = getAnimalGuia($nahual, $conn);
$energiaInfo = getEnergiaInfo($energia, $conn);
$animalGuias = $animalGuia;

$hour = date('H');
$fondo = '/img/FondoDia.jpg';
if ($hour >= 6 && $hour < 12) {
    $fondo = '/img/FondoDia.jpg';
} elseif ($hour >= 12 && $hour < 18) {
    $fondo = '/img/FondoDia.jpg';
} else {
    $fondo = '/img/FondoNoche.jpg';
}

>>>>>>> 156e4d905f28022a54848bc4b1cba2a82b9b4dbb

?>
<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
	<meta charset="utf-8">
	<link rel="icon" href="img/piramide-maya.png">
	<title>Tiempo Maya - Calculadora</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<?php include "blocks/bloquesCss.html" ?>
	<link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
	<link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo (rand()); ?>" />
	<link rel="stylesheet" href="css/animation.css" />
	<link rel="stylesheet" href="./css/calculadora.css" />
	<link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />
=======
    <meta charset="utf-8">
    <link rel="icon" href="img/piramide-maya.png">
    <title>Tiempo Maya - Calculadora de Mayas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/animation.css" />
    <link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />
>>>>>>> 156e4d905f28022a54848bc4b1cba2a82b9b4dbb
</head>

<body>
    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio" style="background: url(<?php echo $fondo; ?>) top center;">
            <div id="inicioContainer" class="inicio-container">
                <div class='principal'>
                    <h1>Calculadora</h1>
                    <form action="#" method="GET">
                        <div class="mb-1">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha"
                                value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-get-started"><i class="far fa-clock"></i> Calcular</button>
                    </form>
                    <div class="principal">
                        <table class="tabla-info">
                            <tbody>
                                <tr>
                                    <th scope="row">Calendario Haab</th>
                                    <td><b><?php echo isset($haab) ? $haab : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <th scope="row">Calendario Cholquij</th>
                                    <td><b><?php echo isset($cholquij) ? $cholquij : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <th scope="row">Cuenta Larga</th>
                                    <td><b><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></b></td>
                                </tr>
                                <tr>
                                    <th scope="row">Animal Guía</th>
                                    <td><b><?php echo $animalGuia; ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </section>
        <div class="infografia-container">
            <div class="info-segmento"
                style="background-color: rgba(250, 250, 250, 0.95); padding: 20px; text-align: center;">
                <!-- Imagen del Nahual -->
                <img src="../img/nahual/<?php echo urlencode(str_replace("'", "", $nahuals)); ?>.png"
                    alt="Imagen del Nahual">
                <!-- Imagen de la Energía -->
                <img src="../img/numeros/<?php echo urlencode($energias); ?>.png" alt="Imagen de la Energía">
                <h3>Nahual: <?php echo $nahuals; ?></h3>
                <div class="container-columna">
                    <div class="nahual-info">
                        <p><i class='fas fa-arrow-right' style="font-size: 0.55rem;  padding-top:4px;"></i> <b>Energía
                            </b> <?php echo $energias; ?></p>
                        <p><i class='fas fa-arrow-right' style="font-size: 0.55rem;  padding-top:4px;"></i> <b>Haab </b>
                            <?php echo is_array($haab) ? implode(", ", $haab) : $haab; ?></p>
                        <p><i class='fas fa-arrow-right' style="font-size: 0.55rem;  padding-top:4px;"></i> <b>Cholquij
                            </b> <?php echo is_array($cholquij) ? implode(", ", $cholquij) : $cholquij; ?></p>
                        <p><i class='fas fa-arrow-right' style="font-size: 0.55rem;  padding-top:4px;"></i> <b>Cuenta
                                larga </b>
                            <?php echo is_array($cuenta_larga) ? implode(", ", $cuenta_larga) : $cuenta_larga; ?>
                        </p>
                    </div>
                    <div class="guia-info">
                        <div class="guia-container">
                            <p style="font-size: 14px;">Animal Guía</p>
                            <img class="animal-img"
                                src="../img/animales/<?php echo urlencode(str_replace(" ", "-", $animalGuias)); ?>.png"
                                alt="Imagen del Animal Guía">
                            <p style="color: #16664d;">
                                <b><?php echo is_array($animalGuia) ? implode(", ", $animalGuia) : $animalGuia; ?></b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="energia-info">
                    <h5 style="color:dimgrey; font-size: medium; padding-top:4px;">
                        Significado de la Energía:
                    </h5>
                    <?php echo $energiaInfo['significado']; ?>
                </div>
                <img class="" src="../img/logo-es.png" alt="logo">
            </div>

<<<<<<< HEAD
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
=======
        </div>
        <div class="boton-descargar">
            <button id="downloadButton">Descargar Infografía</button>

        </div>
        <div class="boton-descargar">
            <button id="changeBackground">Cambiar Fondo</button>
        </div>

    </div>
    <?php include "blocks/bloquesJs1.html" ?>
>>>>>>> 156e4d905f28022a54848bc4b1cba2a82b9b4dbb

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('downloadButton').addEventListener('click', function() {
            html2canvas(document.querySelector(".infografia-container")).then(canvas => {
                var link = document.createElement('a');
                link.download = 'infografia.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        });
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var backgrounds = [
            '../img/pattern.jpg',
            '../img/pattern2.jpg',
            '../img/pattern3.jpg',
            '../img/pattern4.jpg',
            '../img/pattern5.jpg',
            '../img/pattern6.jpg',
            '../img/pattern7.jpg',
            '../img/pattern8.jpg'
        ];

<<<<<<< HEAD
	<?php include "blocks/bloquesJs1.html" ?>
	<script src="js/animation.js"></script>
	<script src="js/changeBackground.js"></script>
=======
        var currentBackground = localStorage.getItem('backgroundIndex');
        if (currentBackground === null) {
            currentBackground = 0;
        } else {
            currentBackground = parseInt(currentBackground);
        }

        var container = document.querySelector('.infografia-container');
        container.style.backgroundImage = 'url(' + backgrounds[currentBackground] + ')';

        document.getElementById('changeBackground').addEventListener('click', function() {
            currentBackground = (currentBackground + 1) % backgrounds.length;
            container.style.backgroundImage = 'url(' + backgrounds[currentBackground] + ')';
            localStorage.setItem('backgroundIndex', currentBackground);
            location.reload();
        });
    });
    </script>
>>>>>>> 156e4d905f28022a54848bc4b1cba2a82b9b4dbb

</body>

</html>