<?php

function getLi($object, $folder, $format, $href) {
	$src = getImgSrc($object, $folder, $format);
	$html = "<li class='nav-item elements'>";
	$html .= "<a class='nav-link d-flex justify-content-between align-items-center' href='$href" . $object['nombre'] . "'>";
	$html .= "<span>" . $object["nombre"] . "</span>";
	$html .= "<img src='$src' />";
	$html .= "</a>";
	$html .= "<li>";
	return $html;
}

function getImgSrc($object, $folder, $format) {
	$name = strtolower(str_replace("'", "", $object["nombre"]));
	return "$folder/$name.$format";
}

?>