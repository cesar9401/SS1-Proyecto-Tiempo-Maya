<?php session_start(); ?>
<?php
$conn = include "conexion/conexion.php";

date_default_timezone_set('US/Central');

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


?>
<!DOCTYPE html>
<html lang="en">

<head>
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

        </div>
        <div class="boton-descargar">
            <button id="downloadButton">Descargar Infografía</button>

        </div>
        <div class="boton-descargar">
            <button id="changeBackground">Cambiar Fondo</button>
        </div>

    </div>
    <?php include "blocks/bloquesJs1.html" ?>

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

</body>

</html>