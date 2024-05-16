<?php

function getCruzInfo($nahual, $conn) {
    $Query = $conn->query("SELECT cruz.* FROM cruz INNER JOIN nahual ON cruz.nacimiento = nahual.idweb WHERE nahual.nombre =\"".$nahual."\";");
    $row = mysqli_fetch_assoc($Query);
    $row['nacimiento'] = $nahual;

    $Query = $conn->query("SELECT nombre FROM nahual WHERE idweb=".$row['izquierdo'].";");
    $izq = mysqli_fetch_assoc($Query);
    $row['izquierdo'] = $izq['nombre'];

    $Query = $conn->query("SELECT nombre FROM nahual WHERE idweb=".$row['derecho'].";");
    $der = mysqli_fetch_assoc($Query);
    $row['derecho'] = $der['nombre'];

    $Query = $conn->query("SELECT nombre FROM nahual WHERE idweb=".$row['concepcion'].";");
    $conc = mysqli_fetch_assoc($Query);
    $row['concepcion'] = $conc['nombre'];

    $Query = $conn->query("SELECT nombre FROM nahual WHERE idweb=".$row['destino'].";");
    $des = mysqli_fetch_assoc($Query);
    $row['destino'] = $des['nombre'];
    
    return $row;
}

?>