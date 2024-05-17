<?php session_start(); ?>
<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

// Suponemos que estas funciones devuelven exactamente el nombre del nahual y el número de energía como cadenas de texto.
$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual . " " . strval($energia);

// Función para obtener el animal guía basado en el nahual
function getAnimalGuia($nahual, $conn) {
    $query = $conn->query("SELECT nombre FROM animal_nahuatl WHERE nahuatl = '" . $conn->real_escape_string($nahual) . "'");
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        return $row['nombre'] ?? 'Información no disponible';
    } else {
        return "Error en la consulta: " . $conn->error;
    }
}



// Obtiene el animal guía utilizando la función definida anteriormente
$animalGuia = getAnimalGuia($nahual, $conn);
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
                            <input type="date" class="form-control" name="fecha" id="fecha"
                                value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-get-started"><i class="far fa-clock"></i> Calcular</button>
                    </form>
                    <div id="tabla">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Calendario</th>
                                    <th scope="col" style="width: 60%;">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Calendario Haab</th>
                                    <td><?php echo isset($haab) ? $haab : ''; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Calendario Cholquij</th>
                                    <td><?php echo isset($cholquij) ? $cholquij : ''; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Cuenta Larga</th>
                                    <td><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Animal Guía</th>
                                    <td><?php echo $animalGuia; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="infografia-container">
                        <div class="info-segmento">
                            <img src=" " alt="Imagen del Nahual">
							<h3>Nahual: <?php echo is_array($nahual) ? implode(", ", $nahual) : $nahual; ?></h3>
                            <p>Energía: <?php echo is_array($energia) ? implode(", ", $energia) : $energia; ?></p>
                            <p>Animal Guía: <?php echo is_array($animalGuia) ? implode(", ", $animalGuia) : $animalGuia; ?></p>
                            <p>Haab: <?php echo is_array($haab) ? implode(", ", $haab) : $haab; ?></p>
                            <p>Cholquij: <?php echo is_array($cholquij) ? implode(", ", $cholquij) : $cholquij; ?></p>
                            <p>Cuenta Larga: <?php echo is_array($cuenta_larga) ? implode(", ", $cuenta_larga) : $cuenta_larga; ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <?php include "blocks/bloquesJs1.html" ?>
</body>

</html>