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
                <h1 class="text-center mb-3 titulo"> Contacta </h1>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-6 contacto-datos">
                        <h3 class="text-center mb-3 negrita azul"> Datos de la empresa </h3>
                        <hr>
                        <p class="icon-phone"> <span class="texto-normal">999 99 99 99</span></p>
                        <p class="icon-envelope"> <span class="texto-normal">mediacinesevilla@gmail.com</span></p>
                        <p class="icon-clock"> <span class="texto-normal">Horarios de apertura:</span></p>
                        <ul>
                            <li>Lunes - Domingo: 8:00 - 00:00</li>
                            <li>Días festivos puede variar</li>
                        </ul>
                        <p class="icon-location"> <span class="texto-normal">Nos encontramos:</span></p>
                        <ul>
                            <li>Centro comercial Vega del Rey</li>
                            <li>Calle la Pañoleta, 41910 Camas, Sevilla</li>
                        </ul>
                        <div class="map">
                            <div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&height=600&hl=es&q=Centro%20Comercial%20Vega%20del%20Rey%2C%20Glorieta%20Gavi%C3%B1o%2C%204%2C%2041900%20Camas%2C%20Sevilla+(MediaCine)&ie=UTF8&t=&z=14&iwloc=A&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/">Radio en el mapa</a></iframe></div>
                        </div>
                    </div>
                    <div class="col-md-6 contacto-formulario">
                        <h3 class="text-center mb-3 negrita azul"> Contáctenos </h3>
                        <hr>
                        <p>Escríbenos tu duda, idea o sugerencia. 
                        <form class="form" method="post" action="mailto:mediacinesevilla@gmail.com">
                            <div class="table-responsive">
                                <table>
                                    <tr>
                                        <div class="form-group">
                                            <td><label>Nombre</label></td>
                                            <td><input type="text" name="nombre" class="form-control form-control-sm"></td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td><label>E-mail</label></td>
                                            <td><input type="email" name="email" class="form-control form-control-sm" value="<?php if(isset($_SESSION['usuario'])){ echo $_SESSION['usuario'];} else { echo ''; } ?>"></td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td><label>Asunto</label></td>
                                            <td><input type="text" name="asunto" class="form-control form-control-sm"></td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td><label>Mensaje</label></td>
                                            <td><textarea class="form-control form-control-sm" name="mensaje" rows="5" cols="60"></textarea></td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td><label>Archivo adjunto</label></td>
                                            <td><input type="file" name="archivo" class="form-control form-control-sm"></textarea></td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center"><input class="btn boton1" type="submit" name="enviar" value="Enviar"></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
                <h3 class="text-center negrita azul">Redes sociales</h3>
                <hr>
                <div class="row justify-content-center text-center enlaces-redes">
                    <div class="col-md-4 mb-3">
                        <a href="https://www.facebook.com/mediacine.sevilla" target="_blank"><p class="icon-facebook2 icono-redes"></p></a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="https://twitter.com/MediacineS" target="_blank"><p class="icon-twitter icono-redes"></p></a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="https://www.instagram.com/mediacinesevilla/" target="_blank"><p class="icon-instagram icono-redes"></p></a>
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