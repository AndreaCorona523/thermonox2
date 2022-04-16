<?php 
	if(isset($_POST['enviar'])){
		$nombre=$_POST['nombre'];
		$correo_electronico=$_POST['correo_electronico'];
		$asunto=$_POST['asunto'];
		$mensaje=$_POST['mensaje'];
		$tipo_usuario=$_POST['tipo_usuario'];
		$municipio=$_POST['municipio'];
		$estado=$_POST['estado'];
		$cod_post=$_POST['cod_post'];
		$pais=$_POST['pais'];
		$copia_adicional='No solicitada';
		$politica_privacidad='No aceptada';
	}

?>

<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Contacto - Thermonox</title>
		<link href="assets/images/favicon-32x32.png" rel="shortcut icon" type="image/jpg">
		<link href="./assets/css/general_index.css" rel="stylesheet" type="text/css">
		<script src="./assets/js/index.js" defer></script>
		<script src="./assets/js/contacto.js" defer></script>
	</head>
	<body>
		<header class="header_container">
			<div class="language_container">
			  <div class="contact">
				<a href="#" class="contact__item">Llámanos al +722 555 1234</a>
				<span class="contact__item" >|</span>
				<a class="contact__item" href="./contacto.html">Escríbenos</a>
			  </div>
			  <div class="language_menu">
				<div class="language_menu__select">
				  <div class="language_icon">
					<i class="bi-globe globe-icon"></i>
				  </div>
				  <div class="selected_language"><p>Español&nbsp;</p><i class="bi-chevron-down"></i></div>
				</div>
				<ul class="language_menu__dropdown">
				  <li class="language_menu__option"><a href="#">English</a></li>
				  <li class="language_menu__option"><a href="#">Español</a></li>
				</ul>
			  </div>
			</div>
			<div class="header">
			  <i class="bi-list menu-icon" id="menu-icon"></i>
			  <a class="header__logo_container" href="./index.html">
				<img class="header__logo" src="assets/images/thermonox-neu-logo-xl.png" alt="ThermoNox Logo">
			  </a>
			  <ul class="navbar">
				<li class="navbar__item"><a href="./index.html">INICIO</a></li>
				<li class="navbar__item">
				  <a href="./acerca_thermonox.html">THERMONOX®</a>
				  <ul class="navbar__dropdown">
					<li class="dropdown__option"><a href="./funcionamiento.html">Funcionamiento</a></li>
					<li class="dropdown__option"><a href="./aplicaciones.html">Aplicaciones</a></li>
					<li class="dropdown__option"><a href="./seguridad.html">Seguridad</a></li>
				  </ul>
				</li>
				<li class="navbar__item">
				  <a href="./acerca_thermonoxilo.html">THERMONOXILO</a>
				  <ul class="navbar__dropdown">
					<li class="dropdown__option"><a href="./acerca_thermonoxilo.html">Acerca de ThermoNoxilo</a></li>
					<li class="dropdown__option"><a href="./aplicacion_thermonoxilo.html">Aplicaciones</a></li>
					<li class="dropdown__option"><a href="./seguridad_thermonoxilo.html">Seguridad</a></li>
				  </ul>
				</li>
				<li class="navbar__item navbar__item--selected"><a href="./contacto.html">CONTACTO</a></li>
			  </ul>
			</div>
		  </header>
		<div class="general_container">
				<div class="general_title_container">
					<h1 class="general_title">Contacto & Colaboraciones</h1>	
				</div>
				<div class="main_info_container">
					<div class="support_info_container">
						<p class="subtitle1">Contacto</p>
						<p class="subtitle3">Soporte técnico</p>
						<p>Adaptamos nuestros servicios perfectamente a sus necesidades prácticas y para cumplir las expectativas de los clientes lo mejor posible.</p>
						<p>En conjunto con los tratamiento, nuestro servicio otorga un completo asesoramiento técnico, valoramos especialmente el contacto directo con nuestros cliente para adaptar nuestros servicios perfectamente a sus exigencias prácticas y para cumplir las expectativas de los clientes lo mejor posible, así como el seguimiento post-servicio.</p>
					</div>
					<div class="colaborations_container">
						<p class="subtitle1">Colaboraciones</p>
						<p class="subtitle3">Latinoamérica / Norteamérica</p>
						<p>ThermoNox® GmbH es el exclusivo proveedor de tratamientos de calor para el sector alimentario y otros afines, en Latinoamérica y Norteamérica, el servicio es proporcionado en colaboración con Grupo La Moderna de manera profesional y especializada en la tecnología del tratammiento. </p>
						<p class="subtitle3">Europa / Asia / África / Oceanía</p>
						<p>Para informes de colaboración de ThermoNox® en estas regiones, puede contactar con Thermonox Gobal: <a href="https://www.thermonox.de" class="contact_global_link" target="_blank">thermonox.de</a> Nosotros alquilamos y vendemos equipos ThermoNox®. Adicionalmente ofrecemos un amplio asesoramiento técnico, formación y seminarios.</p>
					</div>
				</div>
				<div class="contact_container">
					<p class="subtitle2">¿Necesita mayores informes o cotización?</p>	
					<p>* Campo requerido</p>
					<div class="contact_form_container">
						<form name="contacto_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
							<ul class="contacto_form_list">
								<li>
									<label for="nombre" >Nombre *</label>
									<input type="text" name="nombre" id="nombre" value="<?php if(isset($nombre)) echo $nombre ?>">
								</li>
								<li>
									<label for="correo_electronico">Correo electrónico *</label>
									<input type="text" name="correo_electronico" id="correo_electronico" value="<?php if(isset($correo_electronico)) echo $correo_electronico ?>">
								</li>
								<li>
									<label for="asunto">Asunto *</label>
									<input type="text" name="asunto" id="asunto" value="<?php if(isset($asunto)) echo $asunto ?>"></td>
								</li>
								<li>
									<label for="mensaje">Mensaje *</label>
									<textarea name="mensaje" id="message" cols="50" rows="10"> <?php if(isset($mensaje)) echo $mensaje ?></textarea>
								</li>
								<li>
									<label for="copia_adicional" >Envíame una copia <br>(opcional) </label>
									<input type="checkbox" name="copia_adicional" id="copia_adicional" value="Solicitada">
								</li>
								<li>
									<label for="tipo_usuario"  class="campo_title">Soy una *</label>
									<select name="tipo_usuario" id="tipo_usuario">
										<option value="particular">particular</option>
										<option value="profesional">profesional</option>
										<option value="empresa">empresa</option>
										<option value="controlador de plagas">controlador de plagas</option>
									</select>
								</li>
								<li>
									<label for="municipio">Municipio *</label>
									<input type="text" name="municipio" id="municipio" value="<?php if(isset($municipio)) echo $municipio ?>">
								</li>
								<li>
									<label for="estado">Estado *</label>
									<input type="text" name="estado" id="estado" value="<?php if(isset($estado)) echo $estado ?>">
								</li>
								<li>
									<label for="cod_post">Código Postal *</label>
									<input type="text" name="cod_post" id="cod_post" value="<?php if(isset($cod_post)) echo $cod_post ?>">
								</li>
								<li>
									<label for="pais">País *</label>
									<input type="text" name="pais" id="pais" value="<?php if(isset($pais)) echo $pais ?>">
								</li>
								<li>
									<label for="politica_privacidad">Politica de privacidad<br>(opcional)</label>
									<label id="privacy_policy_label">
										<input type="checkbox" name="politica_privacidad" id="politica_privacidad" value="Aceptada">
										He leído y entendido la <a href="./politica_privacidad.html" class="privacy_policy_link" target="_blank">política de privacidad.</a> 
									</label>
								</li>
								<li>
									<button type="submit" class="send_button" onclick="enviar()" name="enviar">Enviar</button>
								</li>
							</ul>
						</form>
						
                        <?php 
							if(isset($_POST['enviar'])){
								include("validacion.php");
							}
                        ?>
					</div>
				</div>
			</div>
			<div class="footer">
				<a class="footer__item" href="./politica_privacidad.html">Politica de privacidad</a>
				<a class="footer__item" href="./contacto.html">Contacto <br>xxxxx@gmail.com</a>
				<a class="footer__item" href="https://www.thermonox.de/" target="_blank">Visítanos en Thermonox.de</a>
			</div>
			<div class="offcanvas">
				<ul class="offcanvas_language">
				  <li class="offcanvas_language__item"><a href="#">EN</a></li>
				  <li class="offcanvas_language__item">|</li>
				  <li class="offcanvas_language__item"><a href="#">ES</a></li>
				</ul>
				<ul class="offcanvas_nav">
				  <li class="offcanvas_nav__item"><a href="./index.html">Inicio</a></li>
				  <li class="offcanvas_nav__item">
					<a href="./acerca_thermonox.html">THERMONOX®</a>
					  <ul class="offcanvas_subnav">
						<li class="offcanvas_subnav__item"><a href="./funcionamiento.html">Funcionamiento</a></li>
						<li class="offcanvas_subnav__item"><a href="./aplicaciones.html">Aplicaciones</a></li>
						<li class="offcanvas_subnav__item"><a href="./seguridad.html">Seguridad</a></li>
					  </ul>
				  </li>
				  <li class="offcanvas_nav__item">
					<a href="./acerca_thermonoxilo.html">THERMONOXILO</a>
					  <ul class="offcanvas_subnav">
						<li class="offcanvas_subnav__item"><a href="./acerca_thermonoxilo.html">Acerca de ThermoNoxilo</a></li>
						<li class="offcanvas_subnav__item"><a href="./aplicacion_thermonoxilo.html">Aplicaciones</a></li>
						<li class="offcanvas_subnav__item"><a href="./seguridad_thermonoxilo.html">Seguridad</a></li>
					  </ul>
				  </li>
				  <li class="offcanvas_nav__item offcanvas_nav__item--selected"><a href="./contacto.html">Contacto</a></li>
				</ul>
			</div>
			<div class="cover" id="cover"></div>
	</body>
</html>