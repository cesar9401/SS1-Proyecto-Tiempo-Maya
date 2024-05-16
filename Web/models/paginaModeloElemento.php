<?php

use function PHPSTORM_META\type;

session_start(); ?>
<?php

// include('../backend/buscar/get_src.php');
$conn = include '../conexion/conexion.php';
$tabla = $_GET['elemento'];
$table = strtolower($tabla);
$fmt = "png";
$datos = $conn->query("SELECT nombre,significado,htmlCodigo FROM tiempomaya." . $table . ";");
$elementos = $datos;
$informacion = $conn->query("SELECT htmlCodigo FROM tiempomaya.pagina WHERE nombre='" . $tabla . "';");

function getAudioSrc($nombre, $tabla) {
    $nombre = strtolower($nombre);
	$nombre = str_replace(['.', "'", '´'], '', $nombre);
	$audioPath = "../audio/$tabla/$nombre.m4a";
    return $audioPath;
}
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
	<link rel="stylesheet" href="../css/paginaModelo.css?v=<?php echo (rand()); ?>" />
	<link rel="stylesheet" href="../css/animation.css" />
    <!-- Añadir Font Awesome para usar iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<?php include "../NavBar2.php" ?>

<body>
    <section id="inicio">
        <div id="inicioContainer" class="inicio-container">
            <?php echo "<h1>" . $tabla . " </h1>"; ?>
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
    <div class="section-header">
        <h3 class="section-title">Elementos</h3>
    </div>
    <div class="card-container">
        <?php foreach ($datos as $dato) {
            $id = getId($dato["nombre"]);
            $src = getImgSrc($id, "../img/$table", $fmt);
            $audioSrc = getAudioSrc($dato["nombre"], $table);
            echo "<div class='card' id='card-$id' onclick='openModal(\"modal-$id\")'>";
            echo "<img src='$src' class='card-img-top' alt='{$dato["nombre"]}'>";
            echo "<h1 class='card-title'>{$dato["nombre"]}</h1>";
            echo "<p class='card-text'><strong>Significado:</strong> {$dato["significado"]}</p>";
            echo "<button onclick='playAudio(\"$audioSrc\"); event.stopPropagation();'><i class='fas fa-play'></i></button>";
            echo "</div>";
            echo "<div id='modal-$id' class='modal'>";
            echo "<div class='modal-content'>";
            echo "<span class='close' onclick='closeModal(\"modal-$id\")'>&times;</span>";
            echo "<h1>{$dato["nombre"]}</h1>";
            echo "<p>{$dato["htmlCodigo"]}</p>"; // Display full HTML code inside the modal
            echo "</div>";
            echo "</div>";
        } ?>
    </div>
</div>

<script>
function openModal(id) {
    document.getElementById(id).style.display = 'block';
}

function closeModal(id) {
    document.getElementById(id).style.display = 'none';
}

function playAudio(src) {
    var audio = new Audio(src);
    audio.play();
}

</script>
<script>
		window.onload = function() {
			const elementoSeleccionado = "<?php echo $_GET['seleccionado'] ?? ''; ?>";
			if (elementoSeleccionado) {
				const card = document.getElementById('card-' + elementoSeleccionado);
				if (card) {
					card.classList.add('highlighted');  // Aplica un estilo de resaltado
					card.scrollIntoView({behavior: 'smooth', block: 'center'});  // Hace scroll hacia la tarjeta
				}
			}
		};
	</script>
</section>


    <?php include "../blocks/bloquesJs.html" ?>
    <script src="../js/animation.js"></script>
    <script>
        function playAudio(audioSrc) {
            var audio = new Audio(audioSrc);
            audio.play();
        }
    </script>
    
</body>
</html>
