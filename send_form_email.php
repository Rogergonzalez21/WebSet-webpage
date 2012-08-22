<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contacto@webset.com.ve";
    $email_subject = "Contacto de Webset.com.ve";
     
     
    function died($error) {
        // your error code can go here
        echo "Disculpe, pero al parecer hubo errores con el formulario que usted envio. ";
        echo "Estos errores aparecen aqui listados<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor, vuelva y arregle estos errores<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('Disculpe, pero al parecer hubo errores con el formulario que usted envio.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'El correo electronico que introdujo no parece ser valido.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'El nombre que introdujo no parece ser valido.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'El apellido que introdujo no parece ser valido.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'Los comentarios que introdujo no parecen ser validos.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Detalles del formulario enviado.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
    $email_message .= "Apellido:  ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telefono: ".clean_string($telephone)."\n";
    $email_message .= "Comentario: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>WebSet - Diseño de paginas Web</title>
		<meta name="description" content="" />
		<meta name="author" content="Roger Gonzalez" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
		<link rel="stylesheet" type="text/css" href="css/docs.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />

		<link rel="icon" type="image/x-icon" href="img/favicon.png" />

		<style type="text/css">
			body {
				padding-top: 20px;
				padding-bottom: 40px;
			}

		</style>
	</head>

	<body data-spy="scroll" data-offset="50">
		<!-- Inicio del Container -->
		<div class="container">
			<header class="jumbotron subhead" id="overview">
				<div class="hero-unit">
					<h1>Web Set</h1>
					<h2>Diseño de paginas web</h2>
					<p>
						Hechas de la manera simple, totalmente modificables.
					</p>
					<h3 style="color:Green;">¡Muchas gracias! Su mensaje ha sido enviado correctamente. Le responderemos lo antes posible.</h3>
				</div>
				<div class="subnav">
					<ul class="nav nav-pills">
						<li class="active">
							<a href="#quienessomos">¿Quienes Somos?</a>
						</li>
						<li class="">
							<a href="#moreofus">Mas sobre nosotros</a>
						</li>
						<li class="">
							<a href="#otherjobs">Trabajos Anteriores</a>
						</li>

						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">¿Que tenemos para ofrecer?<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#design">Diseño/Programacion web</a>
								</li>
								<li>
									<a href="#domains">Dominios y Hosting</a>
								</li>
								<li>
									<a href="#programation">Programacion Web</a>
								</li>
								<li>
									<a href="#databases">Bases de datos</a>
								</li>
							</ul>
						</li>
						<li class="">
							<a href="#contact">Contacto</a>
						</li>
					</ul>
				</div>
			</header>
			<section id="quienessomos">
				<div class="row">
					<div class="span4">
						<h1>¿Quienes somos?</h1>
						<p>
							Somos tres de estudiantes de Ingenieria de Informacion con animos de programacion y diseño web.
							Tenemos 3 años de carrera en una de las mejores universidades del pais (UNITEC)
						</p>
						<p>
							Tenemos amplio conocimiento web, hemos tomado cursos fuera de la universidad y siempre estamos
							animados con las cosas nuevas.
						</p>
					</div>
					<div class="span8">
						<h1>Queremos ayudarte...</h1>
						<p>
							¿Sabes que 7 de cada 10 empresas tienen presencia web? ¿Y tu empresa?
						</p>
						<p>
							Ofrecemos un servicio web para tu empresa, por el costo indicado. ¡Diseños agradables a la vista
							con funcionalidad al 100%!
						</p>
						<p>
							Sea de lo que sea tu empresa, si quieres llegar a un numero mas amplio de clientes, la mejor
							manera es tener una Pagina web, ¿Y que mejor que una pagina web bonita, con mucha funcionalidad
							para la comodidad de tus clientes?
						</p>
					</div>
				</div>
			</section>
			<br />
			<br />
			<section id="moreofus">
				<div class="row">
					<div class="span12" align="center">

						<h1>Un poco mas sobre nosotros...</h1>
						<hr />

						<div class="row">
							<div class="span4" align="center">

								<h2>Adrian Obelmejias</h2>
								<img src="img/adrian.png" alt="AdrianImage"/>
								<br />
								<br />
								<a href="https://twitter.com/obeladrian" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir a @obeladrian</a>
								<h2>Programador</h2>
								<h3>JavaScript</h3>

							</div>
							<div class="span4" align="center">

								<h2>Roger Gonzalez</h2>
								<img src="img/roger.png" alt="RogerImage" />
								<br />
								<br />
								<a href="https://twitter.com/RogerGonzalez21" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir a @RogerGonzalez21</a>
								<h2>Diseñador web</h2>
								<h3>HTML / CSS</h3>

							</div>
							<div class="span4" align="center">

								<h2>Stefan Maric</h2>
								<img src="img/stefan.png" alt="StefanImage" />
								<br />
								<br />
								<a href="https://twitter.com/alexstefan92" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir a @alexstefan92</a>
								<h2>Diseñador Grafico / Web</h2>
								<h3>HTML / CSS</h3>

							</div>
						</div>
					</div>
				</div>
			</section>
			<br />
			<br />
			<section id="otherjobs">
				<div class="row">
					<div class="span12" align="center">

						<h1>Trabajos Anteriores</h1>
						<hr />

						<div class="row">
							<div class="span4" align="center">

								<h2>Care' Libro</h2>
								<p class="lead">
									Red social hecha en ASP.net, C#, MySQL y Bootstrap
								</p>
								<a href="#carelibro" data-toggle="modal"><img src="img/CareLibroImagen.png" class="images" alt="CareLibroImage"/></a>
								<br/>
								<br />
								<a class="btn btn-success" id="popover" rel="popover" data-content="Puedes ver el codigo fuente de esta Web desde GitHub. ¡Cuidado! Solo para entendidos" data-original-title="Codigo Fuente" target="_blank" href="https://github.com/adrianObel/Care-Libro">Ver repositorio en GitHub</a>

							</div>
							<div class="span4" align="center">

								<h2>PIBV.org.ve</h2>
								<p class="lead">
									Remodelacion de la pagina web de la Primera Iglesia Bautista de Valencia.
								</p>

								<a href="#pibv" data-toggle="modal"><img src="img/PIBVImage.png" class="images" alt="PIBVImage" /></a>
								<br/>
								<br />
								<a class="btn disabled" id="popover2" rel="popover" data-content="Por ahora no hay codigo fuente, lo sentimos." data-original-title="Codigo Fuente" href="#otherjobs">¡No hay codigo fuente!</a>

							</div>

							<div class="span4" align="center">

								<h2>Webset.com.ve</h2>
								<p class="lead">
									Esta pagina web que estas viendo, no creo que necesites mas descripcion.
								</p>
								<img src="img/WebsetImagen.png" class="images" alt="WebSetImage" />
								<br/>
								<br />
								<a class="btn btn-success" id="popover4" rel="popover" data-content="Puedes ver el codigo fuente de esta Web desde GitHub. ¡Cuidado! Solo para entendidos" data-original-title="Codigo Fuente" target="_blank" href="https://github.com/Rogergonzalez21/WebSet-webpage">Ver repositorio en GitHub</a>
							</div>
						</div>
					</div>
				</div>
				<br />
				<br />
				<br />
				<br />

				<div class="row">
					<div class="span12" align="center">
						<h1>¿Que tenemos para ofrecer?</h1>
						<hr />
						<section id="design">
							<div class="row">
								<h1>Diseño y Programacion Web desde cero</h1>
								<br />
								<br />
								<div class="row">
									<div class="span8">
										<img src="img/web.png" />
									</div>
									<div class="span4">
										<h2>¿Quieres montar tu pagina web desde cero?</h2>
										<h3>¡Podemos ayudarte!</h3>
										<br />
										<p>
											Hacemos su pagina web desde cero, con lo que usted necesita, como usted quiera. No utilizamos plantillas,
											todo lo diseñamos nosotros mismos. Lo unico que necesitamos es la informacion que usted quiera en su pagina
											(textos, imagenes, banners, etc.) y ¡Listo!.
										</p>
										<p>
											Mision, vision, historia, fotos, productos, contactos... ¡Todo esto es solo una parte de lo que
											puedes tener en tu pagina web! ¿Que esperas? Puedes
											solicitar una cotizacion en el area de <a href="#contact">contacto</a>.
										</p>
									</div>

								</div>
							</div>
							<br />
							<br />
							<div class="row">
								<div class="span4">
									<img src="img/qr.png" />
								</div>
								<div class="span8">
									<h2>¡Tambien incluimos una pagina web movil! (Para Tablets y SmartPhones)</h2>
									<br />
									<p>
										Su pagina web tendra diseño responsivo. Esto significa que no importa cual sea el tamaño de la pantalla o
										la resolucion, su pagina web se verá excelente. ¡Intentelo ahora! Escanee este codigo QR desde su telefono
										inteligente o tablet para probar esta pagina desde cualquier dispositivo movil.
									</p>

								</div>

							</div>

							<br />
							<br />
							<br />
						</section>
						<section id="domains">
							<div class="row">
								<div class="span12">
									<h1>Dominio y hosting (solo para clientes, no revendemos)</h1>
									<br />
									<br />
									<div class="row">
										<div class="span8">
											<img src="img/ofrecer.png" width="600" height="600" />
										</div>
										<div class="span4" align="left">
											<h2 align="center">Aqui una lista de lo que ofrecemos por 1 año:</h2>
											<br />
											<small align="center">Nota: Estos precios <span style="color: rgb(239, 0, 27);">NO</span> incluyen el desarrollo y diseño de la pagina web, solo
												la parte de Hosting y Dominio.</small>
											<br />
											<br />

											<ul style="font-size: 14px;">
												<li class="lista">
													Dominio por 1 año: .com, .net, .org, .com.ve, .net.ve, .org.ve, etc.
												</li>
												<li class="lista">
													Espacio en el disco duro del servidor: 50MB.<span style="color: rgb(239, 0, 27);">*</span>
												</li>
												<li class="lista">
													Cuentas de correo ilimitadas (ejemplo: contacto@nombreDeSuDominio.com) con redireccionamiento, anti
													spam, etc.
												</li>
												<li class="lista">
													Proteccion de Hotlink.
												</li>
												<li class="lista">
													Subdominios ilimitados.
												</li>
												<li class="lista">
													Bases de datos ilimitadas (MySQL y PostgreSQL).
												</li>
												<li class="lista">
													Panel de control intuitivo y facil de utilizar.
												</li>
											</ul>
											<br />
											<br />
											<h2 align="center">¡Todo esto por tan solo</h2>
											<br />
											<h1 align="center"><span style="color: rgb(239, 0, 27);">320BsF.</span> Anuales!</h1>
											<br />
											<span style="color: rgb(239, 0, 27);">*</span>
											<small>Si se desea mas espacio en el disco duro del servidor, debe preguntar por cotizacion del hosting.</small>
										</div>
									</div>
								</div>
							</div>
							<br />
							<br />
							<br />
						</section>
						<section id="programation">
							<div class="row">
								<h1>Programacion Web (PHP/JavaScript/ASP.net)</h1>
								<br />
								<br />
								<div class="row">
									<div class="span4">
										<h2>¿Necesitas ayuda con la parte funcional de tu pagina web?</h2>
										<h3>¡Podemos ayudarte!</h3>
										<br />
										<p>
											Tenemos experiencia con PHP, JavaScript y ASP.net. Si necesitas ayuda, ¡No dudes en pedirla! Puedes
											solicitar una cotizacion en el area de <a href="#contact">contacto</a>.
										</p>
									</div>
									<div class="span8">
										<img src="img/php.png" />
										<img src="img/javascript.png" />
										<img src="img/asp.png" />
									</div>
								</div>
							</div>
							<br />
							<br />
							<br />
						</section>
						<section id="databases">
							<div class="row">
								<h1>Bases de datos SQL (mySQL, SQLServer, PostgreSQL)</h1>
								<br />
								<br />
								<div class="row">
									<div class="span8">
										<img src="img/mysql.png" />
										<img src="img/sqlserver.png" />
										<img src="img/postgresql.png" />
									</div>
									<div class="span4">
										<h2>¿Necesitas ayuda con la/s base de datos de tu pagina web?</h2>
										<h3>¡Podemos ayudarte!</h3>
										<br />
										<p>
											Tenemos experiencia con mySQL, SQLServer y PostgreSQL. Si necesitas ayuda, ¡No dudes en pedirla! Puedes
											solicitar una cotizacion en el area de <a href="#contact">contacto</a>.
										</p>
									</div>
								</div>
							</div>
					</div>
				</div>
				<br />
				<br />
				<br />
				<br />
			</section>

			<section id="contact">
				<div class="row">
					<div class="span6">
						<h1>Contacto</h1>
						<p>
							¡Puedes contactarnos llenando este formulario!
						</p>
						<hr />
						<form id="contact-form" name="contactform" method="post" action="send_form_email.php" class="form-horizontal well">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Nombres <span style="color: rgb(239, 0, 27);">*</span></label>
									<div class="controls">
										<input type="text" class="span3 disabled" placeholder="ej: Juan" name="first_name" disabled>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Apellidos <span style="color: rgb(239, 0, 27);">*</span></label>
									<div class="controls">
										<input type="text" class="span3 disabled" placeholder="ej: González" name="last_name" disabled>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Email <span style="color: rgb(239, 0, 27);">*</span></label>
									<div class="controls">
										<input type="text" class="span3 disabled" placeholder="ej: juangonzalez@gmail.com" name="email" disabled>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Numero de telefono</label>
									<div class="controls">
										<input type="text" class="span3 disabled" placeholder="ej: +58 426 123 45 67" name="telephone" disabled>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Comentario <span style="color: rgb(239, 0, 27);">*</span></label>
									<div class="controls">
										<textarea  name="comments disabled" class="span3" maxlength="1000" cols="25" rows="6" disabled></textarea>
									</div>
								</div>

								<p class="help-block">
									Todos los campos con <span style="color: rgb(239, 0, 27);">*</span> son obligatorios
								</p>
								<div class="form-actions" align="center">
									<a type="submit" class="btn btn-primary btn-large" disabled>
										¡Ya enviaste este formulario!
									</a>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="span6">
						<h1 align="right">¡Tambien puedes contactar por aqui!</h1>
						<label align="right"> Aqui te dejamos otras maneras de contactarnos: </label>

						<hr />
						<div class="row" align="center">
							<div class="span2">
								<h3>Roger Gonzalez</h3>
								Numero de Telefono:<br />
								<code>
									+58 426 6497815
								</code>
								<br />
								<br />
								<h4>Redes Sociales</h4>
								<br />
								<a target="_blank" class="btn btn-primary" href="https://www.facebook.com/rogergonzalez21">Facebook</a>
								<br />
								<br />
								<a target="_blank" class="btn btn-info" href="https://twitter.com/RogerGonzalez21">Twitter</a>
								<br />
								<br />
								<a target="_blank" class="btn btn-success" href="http://geekli.st/rogergonzalez21">GeekList</a>
								<br />

								<br />
								<br />

								<a href="mailto:rogergonzalez21@gmail.com" id="RmailPopover" class="btn btn-inverse btn-large" rel="popover" data-content="Necesitas tener tu cliente de correo electronico abierto (Microsoft Outlook, Mozilla Thunderbird)." data-original-title="Contacto por Correo Electronico">Enviar Correo Electronico</a>
							</div>
							<div class="span2">
								<h3>Adrian Obelmejias</h3>
								Numero de Telefono:<br />
								<code>
									+58 424 4695031
								</code>
								<br />
								<br />
								<h4>Redes Sociales</h4>
								<br />
								<a target="_blank" class="btn btn-primary" href="https://www.facebook.com/adrian.obelmejias">Facebook</a>
								<br />
								<br />
								<a target="_blank" class="btn btn-info" href="https://twitter.com/obeladrian">Twitter</a>
								<br />
								<br />
								<a target="_blank" class="btn btn-success" href="http://geekli.st/AdrianO">GeekList</a>
								<br />

								<br />
								<br />

								<a href="mailto:obeladrian@gmail.com" id="AmailPopover" class="btn btn-inverse btn-large" rel="popover" data-content="Necesitas tener tu cliente de correo electronico abierto (Microsoft Outlook, Mozilla Thunderbird)." data-original-title="Contacto por Correo Electronico">Enviar Correo Electronico</a>
							</div>
							<div class="span2">
								<h3>Stefan Maric</h3>
								Numero de Telefono:<br />
								<code>
									+58 412 5361889
								</code>
								<br />
								<br />
								<h4>Redes Sociales</h4>
								<br />
								<a target="_blank" class="btn btn-primary" href="https://www.facebook.com/alexstefan92">Facebook</a>
								<br />
								<br />
								<a target="_blank" class="btn btn-info" href="https://twitter.com/alexstefan92">Twitter</a>
								<br />
								<br />
								<a target="_blank" class="btn btn-success" href="http://geekli.st/samm">GeekList</a>
								<br />

								<br />
								<br />

								<a href="mailto:alexstefan92@gmail.com" id="SmailPopover" class="btn btn-inverse btn-large" rel="popover" data-content="Necesitas tener tu cliente de correo electronico abierto (Microsoft Outlook, Mozilla Thunderbird)." data-original-title="Contacto por Correo Electronico">Enviar Correo Electronico</a>
							</div>
						</div>
					</div>

				</div>

			</section>
			<hr />
			<footer>
				<div align="center">
					<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.es"><img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a>
					<br />
					<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">WebSet</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.webset.com.ve" property="cc:attributionName" rel="cc:attributionURL">Roger Gonzalez - Stefan Maric - Adrian Obelmejias</a> se encuentra bajo una Licencia <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.es">Creative Commons Atribución-NoComercial-CompartirIgual 3.0 Unported</a>.
					<br />
					&copy; Roger Gonzalez, Stefan Maric & Adrian Obelmejias. 2012

				</div>
			</footer>

			<div id="pibv" class="modal hide fade in" style="display: none; ">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Fotos de la pagina</h3>
				</div>
				<div class="modal-body">
					<div id="carousel" class="carousel slide well">

						<div class="carousel-inner">

							<div class="item active">
								<img src="img/PIBVImage.png" alt="Some Alt Text"/>

							</div>

							<div class="item">
								<img src="img/PIBVImage2.png" alt="Some Alt Text"/>

							</div>

							<div class="item">
								<img src="img/PIBVImage3.png" alt="Some Alt Text"/>

							</div>

						</div>

						<a class="carousel-control left" href="#pibv" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#pibv" data-slide="next">&rsaquo;</a>

					</div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-danger" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
			<div id="carelibro" class="modal hide fade in" style="display: none; ">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Fotos de la pagina</h3>
				</div>
				<div class="modal-body">
					<div id="carousel" class="carousel slide well">

						<div class="carousel-inner">

							<div class="item active">
								<img src="img/CareLibroImagen.png" alt="Some Alt Text"/>

							</div>

							<div class="item">
								<img src="img/CareLibroImagen2.png" alt="Some Alt Text"/>

							</div>

							<div class="item">
								<img src="img/CareLibroImagen3.png" alt="Some Alt Text"/>

							</div>
							<div class="item">
								<img src="img/CareLibroImagen4.png" alt="Some Alt Text"/>

							</div>

						</div>

						<a class="carousel-control left" href="#carelibro" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#carelibro" data-slide="next">&rsaquo;</a>

					</div>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-danger" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
		</div><!-- Fin del Container -->
		<script src="js/jquery-min.js"></script>
		<script src="js/jquery.validate.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/javascript.js"></script>
	</body>
</html>		
<?php
}
?>
