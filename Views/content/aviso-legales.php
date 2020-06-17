<!DOCTYPE html>
<html>
	<head>
		<title>MediaCine</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../Views/styles/style.css">
        <link rel="shortcut icon" href="../Views/images/fav-icon.png">
		<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body class="cuerpo">
		<div class="container">
			<!-- Cabecera -->
			<div class="row justify-content-center align-items-center header">
				<div class="col-2 text-center">
                    <a href="./index.php"><img src="../Views/images/logo.png"></a>
				</div>
				<div class="col-7">
		        	<div class="row menu mb-3 ">
                        <div class="col">
                            <nav class="navbar navbar-expand-sm">
                                <button type="button" class="navbar-toggler navbar-light" data-toggle="collapse" data-target="#enlaces">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="enlaces">
                                    <nav class="navbar-nav">
                                        <div class="nav-item active">
                                            <a class="nav-link" href="./index.php">Inicio</a>
                                        </div>
                                        <div class="nav-item">
                                            <a class="nav-link" href="./cartelera.php">Cartelera</a>
                                        </div>
                                        <div class="nav-item">
                                            <a class="nav-link" href="./tarifas.php">Tarifas</a>
                                        </div>
                                        <div class="nav-item">
                                            <a class="nav-link" href="./contacta.php">Contacto</a>
                                        </div>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                    </div>
				</div>
				<div class="col-2 text-center">
					<?php
						if(isset($_SESSION['usuario'])) {
					?>
					<div class="menu-usuario">
						<nav class="navbar navbar-expand">
							<div class="collapse navbar-collapse" id="enlaces-usuario">
								<nav class="navbar-nav">
									<div class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['nombreUsuario'];?></a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="./perfil-usuario.php">Tu perfil</a>
                                            <a class="dropdown-item" href="./reservas-usuario.php">Mis reservas</a>
											<?php
												if(isset($_SESSION['admin'])) {
											?>
											<a class="dropdown-item" href="./panel-admin.php">Panel admin</a>
											<?php
												}
											?>
											<a class="dropdown-item" href="./logoff.php">Cerrar sesión</a>
										</div>
									</div>
								</nav>
							</div>
						</nav>
					</div>
					<?php
						}
						else {
					?>
		        		<p><a href="./login.php">Login</a> - <a href="./registro.php">Registro</a></p>
					<?php
						}
					?>
				</div>
		    </div>
		    
		    <!-- Contenido -->
		    <div class="contenido p-3">
                <h1 class="text-center mb-5 titulo">Avisos legales</h1>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <h3>Información general</h3>
                        <p>La página http://www.mediacine.com es un dominio en Internet, que contiene un portal o página Web, cuya titularidad es de MediaCine con C.I.F. B-99999999 y con domicilio social en Calle la Pañoleta, 41910 Camas, Sevilla, y dirección general de correo electrónico mediacinesevilla@gmail.com</p>
                        <p>La página Web de MediaCine, tiene por objeto facilitar al usuario y cliente información relativa a las actividades y servicios de la empresa.</p>
                        <p>Con esta página Web, MediaCine pretende prestar un servicio útil, por lo que las sugerencias de los usuarios son bienvenidas. Pero si no está de acuerdo con alguna de las condiciones contenidas en este aviso, deberá dejar de utilizar la página Web de MediaCine El acceso a la misma implica la aceptación de las mismas sin reservas. La utilización de determinados servicios ofrecidos en este sitio se regirá, además, por las condiciones particulares previstas en cada caso, las cuales se entenderán aceptadas por el mero uso de tales servicios.</p>
                        <h3>Condiciones de utilización del portal</h3>
                        <p>Las condiciones establecidas a continuación regulan el uso permitido de la página Web www.mediacine.com</p>
                        <p>Acceso. Hay determinadas partes de la página Web cuyo acceso está reservado a clientes, mediante un identificador de usuario y una contraseña. Los usuarios no facultados para ello, pueden visitar las secciones públicas del portal, no debiendo intentar nunca el acceso a las secciones de acceso restringido, salvo que le haya sido autorizado mediante la asignación de un identificador de usuario y una contraseña.</p>
                        <p>Modificaciones de la página e interrupciones o errores en el acceso MediaCine se reserva la facultad de efectuar, en cualquier momento y sin necesidad de previo aviso, modificaciones y actualizaciones de la información contenida en la página Web, de la configuración y presentación de ésta y de las condiciones de acceso.</p>
                        <p>MediaCine no es responsable de los fallos que se produzcan en las comunicaciones, no garantizando la disponibilidad y continuidad del funcionamiento del portal y de los servicios, por ello MediaCine no garantiza la inexistencia de interrupciones o errores en el acceso a la página Web o a su contenido. MediaCine llevará a cabo, siempre que no concurran causas que lo hagan imposible o de difícil ejecución, y tan pronto tenga noticia de los errores, desconexiones o falta de actualización en los contenidos, todas aquellas labores tendentes a subsanar los errores, restablecer la comunicación y actualizar los contenidos.</p>
                        <p>Propiedad intelectual. Salvo indicación expresa, el contenido de la página Web, imágenes, textos y datos, son propiedad de MediaCine Asimismo, es propiedad de MediaCine su código fuente, diseño y estructura de navegación. Corresponde a MediaCine el ejercicio exclusivo de los derechos de explotación de los mismos en cualquier forma, y en especial los derechos de reproducción, distribución, comunicación pública y transformación .Todo este material está protegido por la legislación de la propiedad intelectual y su uso indebido puede ser objeto de sanciones, incluso penales.</p>
                        <p>La consulta o descarga de contenidos de la página o de cualquier software no implicará la cesión de ningún derecho de propiedad intelectual o industrial sobre los mismos.</p>
                        <p>Se autoriza la visualización, impresión y descarga parcial del contenido de la página Web sólo y exclusivamente si concurren las siguientes condiciones:</p>
                        <ul>
                            <li>Que sea compatible con los fines de la página Web.</li>
                            <li>Que no se realice con fines comerciales o para su distribución, comunicación pública o transformación.</li>
                            <li>Que ninguno de los contenidos de la página Web sea modificado.</li>
                            <li>Que ningún gráfico, icono o imagen disponible en la Web sea utilizado, copiado o distribuido separadamente del texto o del resto de imágenes que lo acompañan.<li>
                            <li>Que se cite la fuente.</li>
                        </ul>
                        <p>Toda la información que se reciba en estas páginas, tal como comentarios, sugerencias o ideas, se considerará cedida a título gratuito. No envíe información que no pueda ser tratada de esta forma.</p>
                        <p>Seguridad. MediaCine consciente de los riesgos derivados de enfrentarse a los nuevos retos que supone extender sus servicios a través de Internet, ha dispuesto de exigentes medidas de seguridad para reducir dichos riesgos.</p>
                        <p>No obstante, MediaCine no puede garantizar la invulnerabilidad absoluta de sus sistemas de seguridad, por lo que excluye cualquier tipo de responsabilidad por daños y perjuicios de toda naturaleza que puedan deberse a la presencia de virus u otros elementos que puedan producir alteraciones en el sistema informático (software y hardware), documentos electrónicos y ficheros del usuario o de cualquier tercero, incluyendo los que se produzcan en los servicios prestados por terceros a través de este portal.</p>
                        <p>Los usuarios quedan informados de que la utilización de los sistemas electrónicos de transmisión de datos y el correo electrónico no ofrece garantías absolutas de seguridad. El usuario de MediaCine se exonera mutuamente de cualquier responsabilidad derivada de hechos como la no recepción o la demora de la misma, el error o intercepción de las comunicaciones.</p>
                        <p>Contenidos y páginas enlazadas. La información contenida en esta Web, tiene carácter meramente informativo; y, en ningún caso, constituye ningún tipo obligación contractual.</p>
                        <p>La función de los links, o enlaces, que aparecen en esta página es exclusivamente la de informar al usuario sobre la existencia de otras fuentes de información sobre la materia en Internet, donde podrá ampliar o completar los datos ofrecidos en esta página. MediaCine no será responsable del resultado obtenido a través de dichos enlaces.</p>
                        <p>En todo caso MediaCine no asume responsabilidad alguna derivada de los contenidos enlazados desde la su página Web, ni garantiza la ausencia de virus u otros elementos en los mismos que puedan producir alteraciones en el sistema informático (hardware y software), en los documentos o los ficheros del usuario, excluyendo cualquier responsabilidad por los daños de cualquier clase causados al usuario por este motivo.</p>
                        <p>Aunque los enlaces son supervisados regularmente para que no suceda, en el caso de que cualquier usuario o un tercero, considerara que el contenido o los servicios prestados por las páginas enlazadas son ilícitos, vulneran valores o principios constitucionales, o lesionan bienes o derechos del propio usuario o de un tercero se ruega que se comunique inmediatamente a MediaCine Calle la Pañoleta, 41910 Camas, Sevilla o mediacinesevilla@gmail.com dicha circunstancia, y especialmente si los enlaces consisten en:</p>
                        <ul>
                            <li>Actividades o contenidos susceptibles de ser considerados delictivos conforme la normativa penal española.</li>
                            <li>Actividades o contenidos que violen derechos de propiedad intelectual o industrial.</li>
                            <li>Actividades o contenidos que pongan en peligro el orden público, la investigación penal, la seguridad pública y la defensa nacional.</li>
                            <li>Actividades o contenidos que pongan en peligro la protección de la salud pública, el respeto a la dignidad de la persona, al principio de no discriminación, la protección de la salud y la infancia o cualquier otro valor o principio constitucional.</li>
                        </ul>
                        <p>Protección de datos personales. Los datos personales vinculados a esta Web respetan las exigencias de la legislación vigente en materia de protección de datos personales.</p>
                        <p>MediaCine tratará los datos de carácter personal que se recojan a través de esta Web cumpliendo con la normativa vigente sobre protección de datos.</p>
                        <p>Así:</p>
                        <p>La inclusión en ficheros es absolutamente voluntaria y es debidamente anunciada; los ficheros a los que se incorporen datos personales están dados de alta en las Agencias de Protección de Datos competentes, y protegidos por las medidas de seguridad exigidas por la legislación. Los datos sólo serán utilizados para la finalidad para la que se hayan recogido; ­todas las personas que se incorporen al fichero creado podrán ejercer los derechos de acceso, rectificación, supresión y portabilidad de sus datos, y la limitación u oposición a su tratamiento, a retirar el consentimiento prestado y a reclamar a la AEPD. En la forma prevista por la normativa vigente de protección de datos. Salvo indicación en diferente sentido, el responsable del tratamiento será MediaCine, con domicilio en Calle la Pañoleta, 41910 Camas, Sevilla, donde el usuario podrá dirigirse para ejercitar los derechos de acceso, rectificación, oposición y cancelación.</p>
                        <p>Enlace de terceros a la Web www.cinesur.com Todo enlace de terceros a la Web debe serlo a su página principal, quedando expresamente prohibidos los “links profundos”, el “framing” y cualquier otro aprovechamiento de los contenidos de la Web a favor de terceros no autorizados.</p>
                        <p>Responsabilidades: MediaCine no será, en ningún caso, responsable, por los daños y perjuicios de cualquier tipo derivados, directa o indirectamente, de la falta de lectura de este aviso, o del incumplimiento de las obligaciones especificadas en las condiciones establecidas en el mismo. Asimismo, de acuerdo con lo expuesto en estas condiciones, MediaCine excluye cualquier responsabilidad por los daños y perjuicios de toda naturaleza que puedan deberse a la transmisión, difusión, almacenamiento, puesta a disposición, recepción, obtención o acceso a la página Web o sus contenidos.</p>
                        <p>MediaCine por tanto, no se responsabiliza del uso indebido del portal y de sus contenidos y servicios, ni puede garantizar, aunque sea su ánimo, la certeza de sus contenidos. Igualmente no garantiza la veracidad de los contenidos publicitarios de cualquier bien, producto o servicio anunciado.</p>
                        <p>El usuario responderá de los daños y perjuicios que una actitud negligente suya pudiera ocasionar a este portal.</p>
                        <p>Fuero jurisdiccional. MediaCine y el usuario, con renuncia expresa a cualquier otro fuero, se someten para cualquier controversia que pudiera derivarse del acceso o uso de la Web al de los Juzgados y Tribunales de la ciudad de Sevilla.</p>
                    </div>
                </div>
			</div>
			<!-- Pie de página -->
			<div class="row mt-3 pt-3 pie">
				<div class="col-sm-4 mb-3">
                    <h6>Enlaces</h6>
                    <hr>
                    <ul class="enlaces-pie">
                        <li><a href="./index.php">Inicio</a></li>
                        <li><a href="./cartelera.php">Cartelera</a></li>
                        <li><a href="./tarifas.php">Tarifas</a></li>
                        <li><a href="./contacta.php">Contacto</a></li>
                        <?php
							if(isset($_SESSION['usuario'])) {
						?>
							<li><a href="./perfil-usuario.php">Tu perfil</a></li>
							<li><a href="./reservas-usuario.php">Mis reservas</a></li>
						<?php
							}
						?>
                        <?php
							if(isset($_SESSION['admin'])) {
						?>
							<li><a href="./panel-admin.php">Panel admin</a></li>
						<?php
							}
						?>
                    <ul>
                </div>
                <div class="col-sm-4 mb-3">
				    <h6>Otros</h6>
                    <hr>
				    <ul class="enlaces-pie">
                        <li><a href="./aviso-privacidad.php">Política de Privacidad</a></li>
                        <li><a href="./aviso-legales.php">Aviso legal</a></li>
                    </ul>
				</div>
                <div class="col-sm-4 mb-3">
				    <h6>Contacta</h6>
                    <hr>
                    <form class="form" method="post" action="mailto:mediacinesevilla@gmail.com">
                        <div class="form-group">
                            <label>Contáctenos directamente por aquí</label>
                            <textarea class="form-control form-control-sm" name="contacta" rows="5" cols="60" placeholder="Escribe su mensaje..."></textarea>
                        </div>
			    		<div class="justify-content-center text-center">
			    			<input class="btn boton2" type="submit" name="enviar" value="Enviar">
			    		</div>
                    </form>
				</div>
			</div>
		</div>
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>