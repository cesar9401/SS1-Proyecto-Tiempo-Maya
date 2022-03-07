<?php

function getLi($object, $folder, $format, $href) {
	$id = getId($object["nombre"]);
	$src = getImgSrc($id, $folder, $format);
	$html = "<li class='nav-item elements'>";
	$html .= "<a class='nav-link d-flex justify-content-between align-items-center' href='$href$id'>";
	$html .= "<span>" . $object["nombre"] . "</span>";
	$html .= "<img src='$src' />";
	$html .= "</a>";
	$html .= "<li>";
	return $html;
}

/**
 * $name -> result of call getId with the property name of the object (kin, nahual, uinal, energia)
 */
function getImgSrc($name, $folder, $format) {
	return "$folder/$name.$format";
}

function getId($name) {
	return strtolower(str_replace("'", "", $name));
}
