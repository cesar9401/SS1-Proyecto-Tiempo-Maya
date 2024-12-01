<?php

include("backend/buscar/get_src.php");
$conn = include 'conexion/conexion.php';
$kinesNav = $conn->query("SELECT nombre FROM tiempomaya.kin order by nombre;");
$uinalesNav = $conn->query("SELECT nombre FROM tiempomaya.uinal order by nombre;");
$nahualesNav = $conn->query("SELECT nombre FROM tiempomaya.nahual order by nombre;");
$energiasNav = $conn->query("SELECT nombre FROM tiempomaya.energia order by id;");
$periodosNav = $conn->query("SELECT nombre FROM tiempomaya.periodo order by orden ;");

?>
<?php include "mensaje.php"; ?>


<header id="header">
	<div class="container">
		<nav class="navbar navbar-expand-lg" id="nav-menu-container">
			<div class="container-fluid">
				<a id="title" class="navbar-brand" href="index.php" style="color: white;font-size: 24px;"><strong>TIEMPO</strong> MAYA</a>
				<button class="navbar-toggler" type="button" onclick="rellenar()" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span><i style="color: white;" class="fas fa-bars"></i></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<ul class="navbar-nav nav-menu">
						<li>
							<a class="nav-link" href="models/paginaModelo.php?pagina=Calendario Haab">Calendario Haab &nbsp;&nbsp;&nbsp;&nbsp; </a>
							<button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Calendario Haab
							</button>

							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<li>
									<button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Kin
									</button>
									<a class="nav-link" href="models/paginaModeloElemento.php?elemento=kin" style="font-size: 13px;">Kines</a>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<div div style="width: 200px; height: 400px; overflow-y: scroll;">
											<?php

											if (is_array($kinesNav) || is_object($kinesNav)) {
												foreach ($kinesNav as $kin) {
													echo getLi($kin, "img/kin", "png", "models/paginaModeloElemento.php?elemento=kin#");
												}
											} ?>
									</ul>
								</li>
								<li>
									<button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Uinal
									</button>
									<a class="nav-link" href="models/paginaModeloElemento.php?elemento=uinal" style="font-size: 13px;">Uinales</a>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<div div style="width: 200px; height: 400px; overflow-y: scroll;">
											<?php if (is_array($uinalesNav) || is_object($uinalesNav)) {
												foreach ($uinalesNav as $uinal) {
													echo getLi($uinal, "img/uinal", "png", "models/paginaModeloElemento.php?elemento=uinal#");
												}
											} ?>
									</ul>
								</li>
							</ul>
						</li>

						<li>
							<a class="nav-link" href="models/paginaModelo.php?pagina=Calendario Cholquij">Calendario Cholq'ij &nbsp;&nbsp;&nbsp;&nbsp; </a>
							<button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Calendario Cholquij
							</button>

							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<li>
									<button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Nahual
									</button>
									<a class="nav-link" href="models/paginaModeloElemento.php?elemento=nahual" style="font-size: 13px;">Nahuales</a>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<div div style="width: 200px; height: 400px; overflow-y: scroll;">
											<?php if (is_array($nahualesNav) || is_object($nahualesNav)) {
												foreach ($nahualesNav as $nahual) {
													echo getLi($nahual, "img/nahual", "png", "../models/paginaModeloElemento.php?elemento=nahual#");
												}
											} ?>
										</div>
									</ul>
								</li>
								<li>
									<button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Energia
									</button>
									<a class="nav-link" href="models/paginaModeloElemento.php?elemento=energia" style="font-size: 13px;">Energias</a>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<div div style="width: 200px; height:400px; overflow-y: scroll;">
											<?php if (is_array($energiasNav) || is_object($energiasNav)) {
												foreach ($energiasNav as $energia) {
													echo getLi($energia, "img/energia", "png", "../models/paginaModeloElemento.php?elemento=energia#");
												}
											} ?>
										</div>
									</ul>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="models/paginaModelo.php?pagina=Rueda Calendarica">Rueda Calendarica</a>
						</li>

						<li class="nav-item"><a class="nav-link" href="calculadora.php">Calculadora</a></li>

					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>


<script type="text/javascript">
	var relleno = false;

	function rellenar() {
		if (!relleno) {
			$('#header').addClass('header-fixed1');
			$('#inicioContainer').addClass('iniciofixed');
		} else {
			$('#header').removeClass('header-fixed1');
			$('#inicioContainer').removeClass('iniciofixed');
		}
		relleno = !relleno
	}
</script>