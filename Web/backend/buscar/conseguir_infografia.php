<?php

function getNahualSignificado($nahual, $conn) {
    $Query = $conn->query("SELECT significado FROM nahual WHERE nombre=\"".$nahual."\";");
    $row = mysqli_fetch_assoc($Query);
    return $row['significado'];
}


function getEnergiaInfo($id, $conn) {
    $Query = $conn->query("SELECT nombre, significado FROM energia WHERE id=".$id.";");
    $row = mysqli_fetch_assoc($Query);
    return $row;
}

function getAnimalGuia($nahual, $conn) {
    $Query = $conn->query("SELECT animal_guia.animal FROM animal_guia 
    INNER JOIN nahual ON animal_guia.idweb_nahual = nahual.idweb WHERE nahual.nombre=\"". $nahual ."\";");
    $row = mysqli_fetch_assoc($Query);
    return $row['animal'];
}

?>