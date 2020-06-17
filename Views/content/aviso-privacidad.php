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
                <h1 class="text-center mb-5 titulo">Política de privacidad y protección de datos</h1>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <h3>Titular de la página</h3>
                        <p>Tal y como se establece en la Ley 34/2.002 de Servicios de la Sociedad de la Información y de Comercio Electrónico,  y en el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo, de 27 de abril de 2016, relativo a la protección de las personas físicas en lo que respecta al tratamiento de datos personales y a la libre circulación de estos datos, se le informa que MediaCine es el titular de la presente página Web, cuyo nombre de dominio es www.cinesur.com, su dirección de correo electrónico es mediacinesevilla@gmail.com, teléfono 999 99 99 99. El domicilio del titular se encuentra en Calle la Pañoleta, 41910 Camas, Sevilla, y con CIF: B-99999999.</p>
                        <h3>Datos</h3>
                        <p>La navegación por esta página web no implica necesariamente que el usuario facilite o deba facilitar datos de carácter personal.</p>
                        <p>Los datos que en su caso sean facilitados por los usuarios podránser tratados por MediaCine como Responsable del tratamiento, siendo en todo momento conservados y tratados en territorio Europeo.</p>
                        <p>En el caso de utilizar formularios para recabar datos de carácter personal, la identificación del usuario se entenderá que es cierta,  ya que será el usuario quién introduzca sus datos en los formularios disponibles en la página Web, yquien responde de su veracidad. En el momento de rellenar los formularios se le informará del carácter voluntario u obligatorio de los campos o respuestas a rellenar. La información obligatoria se identifica con un asterisco. La negativa a proporcionar los datos calificados como obligatorios supondrá la no prestación del servicio o información solicitada.</p>
                        <h3>Protección de datos</h3>
                        <p>De conformidad con el artículo 13 del Reglamento General de Protección de datos  (Reglamento (UE) 2016/679 de 27 de abril de 2016 relativo a la protección de las personas físicas en lo que respecta al tratamiento de datos personales y a la libre circulación de estos datos) le informamos de lo siguiente:</p>
                        <p>MediaCine se compromete a mantener el nivel adecuado de protección de los datos que trata, y a proporcionar la obligada confidencialidad de los datos personales que se le faciliten a través de la página web.</p>
                        <p>En esta línea, y de acuerdo al deber de transparencia que ha de observar una Corporación como la nuestra, nos preocupamos por nuestros usuarios y su  privacidad  cumpliendo con la normativa aplicable en materia de protección de datos. A tal fin ponemos a su disposición la información relativa al tratamiento de datos personales que llevamos a cabo, con el objetivo de que, en todo momento, conozca cómo tratamos sus datos y los derechos que le asisten como titular de los mismos.</p>
                        <h3>Identidad y Datos del Responsable del Tratamiento</h3>
                        <p>Responsable: MediaCine</p>
                        <p>Domicilio: Calle la Pañoleta, 41910 Camas, Sevilla</p>
                        <p>Teléfono: 999 99 99 99</p>
                        <p>Dirección de correo electrónico: mediacinesevilla@gmail.com</p>
                        <h3>Finalidad del Tratamiento de Datos</h3>
                        <p>Los datos que el usuario proporciones a través de la página web podrán ser utilizados para los siguientes fines:</p>
                        <ul>
                            <li>Poder contactar con el usuario</li>
                            <li>Atender y gestionar las consultas, incidencias o sugerencias remitidas</li>
                            <li>Prestar los servicios requeridos por el usuario</li>
                            <li>Mantenerle informado, por correo en papel, medios electrónicos o dispositivos móviles de cualquier información que pudieran resultar de su interés y relacionada con los servicios que presta el responsable del tratamiento.</li>
                            <li>Análisis estadísticos de visitas a la Web y comportamientos de sus Usuarios en la misma.</li>
                            <li>Facilitar y dar cumplimiento a la participación en los cursos de formación.</li>
                            <li>Gestionar las solicitudes de participación en bolsas de trabajo o en procesos de selección de personal.</li>
                        </ul>
                        <p>La información facilitada podrá ser sometida a tratamiento para crear un perfil que nos permita ofrecerle la información que más le pueda interesar. Y, también se le informa que, en base a ese perfil no se tomaran decisiones automatizadas que puedan afectar al usuario.</p>
                        <h3>Legitimación para el tratamiento</h3>
                        <p>El tratamiento de sus datos para prestar los servicios requeridos por el usuario se basa únicamente en su consentimiento expreso, facilitado en el momento de cumplimentar los formularios.</p>
                        <p>El tratamiento de los datos para el envío de información comercial se basa en el interés legítimo que tiene MediaCineen mantener una relación fluida y constante con los usuarios de la página web, a fin de facilitarles información relevante de su interés sobre productos o servicios proporcionados por el responsable del tratamiento., quién podrá realizar los tratamientos que sean estrictamente necesarios para la administración interna de la página web, análisis estadísticos de visitas a la Web y comportamientos de sus Usuarios.</p>
                        <h3>Derecho a retirar el consentimiento</h3>
                        <p>En cualquier momento, el usuario podrá  retirar su consentimiento para el tratamiento de sus datos para la gestión e información sobre los productos o servicios solicitados, en cuyo caso cesará la obligación del responsable de continuar prestando los servicios.</p>
                        <h3>Cesión de Datos</h3>
                        <p>MediaCine no tiene prevista y no realizará la cesión de sus datos, salvo que medie consentimiento expreso para ello o sea requerido judicialmente o por la Administración Pública en el ejercicio de sus potestades.</p>
                        <h3>Conservación de los Datos</h3>
                        <p>Los datos serán conservados durante el tiempo necesario para el cumplimiento de los servicios solicitados por el usuario, y de acuerdo con la finalidad para la que fueron obtenidos, sin perjuicio del  ejercicio del derecho de supresión. Posteriormente los datos se conservarán, sin acceso a ellos, durante plazo de 5 años para salvar el ejercicio de las acciones que pudieran corresponder a las partes. En relación con el tratamiento necesario para el envío de información mantendremos sus datos en el sistema en tanto no nos solicite su supresión.</p>
                        <h3>Derechos de los Usuarios respecto del tratamiento de sus datos</h3>
                        <ul>
                            <li>Acceder a los mismos.</li>
                            <li>Solicitar su rectificación o supresión.</li>
                            <li>Solicitar la limitación de su tratamiento.</li>
                            <li>Oponerse a su tratamiento.</li>
                            <li>Solicitar su portabilidad en un formato estructurado, de uso común y de lectura mecánica.</li>
                        </ul>
                        <p>Podrá ejercer tales derechos ante MediaCine En ese caso, podrá dirigirse al responsable del tratamiento por escrito en la dirección indicada, acompañando a su solicitud una copia de documento oficial de identificación, o enviando un correo electrónico que incluya firma electrónica, con el objeto de acreditar su identidad, a mediacinesevilla@gmail.com</p>
                        <p>El ejercicio de los derechos antes relacionados se complementa con el derecho a presentar una reclamación ante la autoridad de control, en nuestro caso, ante la Agencia Española de Protección de Datos, u organismo que la sustituya.</p>
                        <h3>Medidas técnicas y organizativas</h3>
                        <p>MediaCineha adoptado las medidas técnicas y organizativas conforme a lo dispuesto en la normativa vigente, siendo los niveles de seguridad los adecuados a los datos que se facilitan y, además, se han instalado todos los medios y medidas técnicas a su alcance para evitar la pérdida, mal uso, alteración y acceso no autorizado a los datos que nos facilitan.</p>
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
				    <h6>Otros</h6>
                    <hr>
				    <ul class="enlaces-pie">
                        <li><a href="../content/aviso-privacidad.html">Política de Privacidad</a></li>
                        <li><a href="../content/aviso-legales.html">Aviso legal</a></li>
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