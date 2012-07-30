<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contacto.webset.com.ve";
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

		<title>Home</title>
		<meta name="description" content="" />
		<meta name="author" content="Roger Gonzalez" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
		<link rel="stylesheet" type="text/css" href="css/docs.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<style type="text/css">
			body {
				padding-top: 20px;
				padding-bottom: 40px;
			}

		</style>
	</head>

	<body data-spy="scroll">
		<!-- Inicio del Container -->
		<div class="container">
			<header class="jumbotron subhead" id="overview">
				<div class="hero-unit">
					<h1>Diseño de paginas web</h1>
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
							Somos un par de estudiantes de Ingenieria de Informacion con animos de programacion y diseño web.
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
							<div class="span6" align="center">

								<h2>Adrian Obelmejias</h2>
								<img src="img/adrian.png" alt="AdrianImage"/>
								<br />
								<br />
								<a href="https://twitter.com/obeladrian" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir a @obeladrian</a>
								<script>
									! function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (!d.getElementById(id)) {
											js = d.createElement(s);
											js.id = id;
											js.src = "//platform.twitter.com/widgets.js";
											fjs.parentNode.insertBefore(js, fjs);
										}
									}(document, "script", "twitter-wjs");
								</script>
								<h2>Programador</h2>
								<h3>JavaScript</h3>

							</div>
							<div class="span6" align="center">

								<h2>Roger Gonzalez</h2>
								<img src="img/roger.png" alt="RogerImage" />
								<br />
								<br />
								<a href="https://twitter.com/RogerGonzalez21" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir a @RogerGonzalez21</a>
								<script>
									! function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (!d.getElementById(id)) {
											js = d.createElement(s);
											js.id = id;
											js.src = "//platform.twitter.com/widgets.js";
											fjs.parentNode.insertBefore(js, fjs);
										}
									}(document, "script", "twitter-wjs");
								</script>
								<h2>Diseñador web</h2>
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
							<div class="span3" align="center">

								<h2>Care' Libro</h2>
								<p class="lead">
									Red social hecha en ASP.net, C#, MySQL y Bootstrap para un proyecto de la universidad.
								</p>

							</div>
							<div class="span3" align="center">

								<h2>PIBV.org.ve</h2>
								<p class="lead">
									Remodelacion de la pagina web de la Primera Iglesia Bautista de Valencia.
								</p>
								<small>Aun en construccion</small>

							</div>
							<div class="span3" align="center">

								<h2>CNIT.org.ve</h2>
								<p class="lead">
									Pagina web del 1er Congreso Nacional de Inovacion Tecnologica.
								</p>
							</div>
							<div class="span3" align="center">

								<h2>Nombre.com.ve</h2>
								<p class="lead">
									Esta pagina web que estas viendo, no creo que necesites mas descripcion.
								</p>
							</div>
						</div>
						<div class="row">

							<div class="span3">
								<a href="#carelibro" data-toggle="modal"><img src="img/CareLibroImagen.png" class="images" alt="CareLibroImage"/></a>
								<br />
								<br />
								<a class="btn btn-success" id="popover" rel="popover" data-content="Puedes ver el codigo fuente de esta Web desde GitHub. ¡Cuidado! Solo para entendidos" data-original-title="Codigo Fuente" target="_blank" href="https://github.com/adrianObel/Care-Libro">Ver repositorio en GitHub</a>

							</div>
							<div class="span3">
								<a href="#pibv" data-toggle="modal"><img src="img/PIBVImage.png" class="images" alt="PIBVImage" /></a>
							</div>
							<div class="span3">
								<img src="img/cnit.png" class="images" alt="CNITImage" />
								<br />
								<br />
								<a class="btn btn-success" id="popover3" rel="popover" data-content="Puedes ver el codigo fuente de esta Web desde GitHub. ¡Cuidado! Solo para entendidos" data-original-title="Codigo Fuente" target="_blank" href="https://github.com/sadasant/CNIT.org.ve">Ver repositorio en GitHub</a>

							</div>
							<div class="span3">
								<img src="img/cnit.png" class="images" alt="EstaPaginaImage" />
							</div>
						</div>
					</div>
				</div>
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
										<input class="span3 disabled" id="disabledInput1" type="text" disabled="">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Apellidos <span style="color: rgb(239, 0, 27);">*</span></label>
									<div class="controls">
										<input class="span3 disabled" id="disabledInput2" type="text" disabled="">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Email <span style="color: rgb(239, 0, 27);">*</span></label>
									<div class="controls">
										<input class="span3 disabled" id="disabledInput3" type="text" disabled="">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Numero de telefono</label>
									<div class="controls">
										<input class="span3 disabled" id="disabledInput4" type="text" disabled="">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Comentario <span style="color: rgb(239, 0, 27);">*</span></label>
									<div class="controls">
										<textarea  name="comments" class="span3 disabled" id="disabledInput5" maxlength="1000" cols="25" rows="6" disabled=""></textarea>
									</div>
								</div>

								<p class="help-block">
									Todos los campos con <span style="color: rgb(239, 0, 27);">*</span> son obligatorios
								</p>
								<div class="form-actions" align="center">
									<a href="#" class="btn btn-large disabled">¡Ya enviaste un formulario!</a>
									
								</div>
							</fieldset>
						</form>
					</div>
					<div class="span6">
						<h1 align="right">¡Tambien puedes contactar por aqui!</h1>
						<p>
							Aqui te dejamos otras maneras de contactarnos:
						</p>

						<hr />
						<div class="row">
							<div class="span3">
								<h3>Roger Gonzalez</h3>
								Numero de Telefono:
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
							<div class="span3">
								<h3>Adrian Obelmejias</h3>
								Numero de Telefono:
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
						</div>
					</div>

				</div>

			</section>
			<hr />
			<footer>
				<p>
					&copy; Roger Gonzalez & Adrian Obelmejias. 2012
				</p>
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
		<script src="js/jquery-1.7.2.js"></script>
		<script src="js/scrollsubnav.js"></script>
		<script src="js/bootstrap-scrollspy.js"></script>
		<script src="js/bootstrap-modal.js"></script>
		<script src="js/bootstrap-transition.js"></script>
		<script src="js/bootstrap-carousel.js"></script>
		<script src="js/bootstrap-tooltip.js"></script>
		<script src="js/bootstrap-popover.js"></script>
		<script src="js/jquery.validate.js"></script>
		<script src="js/validate.js"></script>
		<script>
			$(function() {
				$("#popover").popover();
			});
			$(function() {
				$("#popover3").popover();
			});
			$(function() {
				$("#RmailPopover").popover();
			});
			$(function() {
				$("#AmailPopover").popover();
			});
		</script>

	</body>
</html>

<?php
}
?>