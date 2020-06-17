<!DOCTYPE html>
<html>
	<head>
		<title>MediaCine</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../Views/styles/style.css">
		<link rel="shortcut icon" href="../Views/images/fav-icon.png">
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../Views/scripts/formulario-reservas.js"></script>
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
            <h1 class="text-center titulo"><?php if($_SESSION['accion'] == "modificar") { echo "Modificar";} else { echo "Añadir";} ?> reserva</h1>
                <div class="row justify-content-center">
                    <div class="col-10 text-center p-3 login-registro">
                        <form id="formulario" action="<?php $_SERVER['PHP_SELF']; ?>" class="form" method="post">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>DNI</label>
                                        <input type="text" name="dni" value="<?php if(isset($reserva)){ echo $reserva->getDNI();} else { if(isset($_POST['dni'])){ echo $_POST['dni']; } else { echo ''; } } ?>" class="form-control form-control-sm" required>
                                        <div class="mensaje-error"><?php echo isset($errorDNI) ? utf8_decode($errorDNI) : '' ; ?></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Pelicula</label>
                                        <select class="form-control form-control-sm" name="pelicula" id="pelicula" required>
                                            <option value="" disabled selected>Selecciona una película</option>
                                            <?php
                                                    foreach ($peliculas as $pelicula) {
                                                       
                                            ?>
                                                <option value="<?php echo $pelicula->getId(); ?>" <?php if(isset($reserva)) { if($peliculaR->getId() == $pelicula->getId()) { echo "selected";}} ?> ><?php echo $pelicula->getTitle(); ?></option>
                                            <?php
                                                        
                                                    }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <select class="form-control form-control-sm" name="fecha" id="fecha" required>
                                            <option value="" disabled selected>Selecciona una fecha</option>
                                            <?php
                                                if(isset($reserva)) {
                                            ?>
                                                <option value="<?php echo $sesionR->getDate(); ?>" selected ><?php echo $sesionR->getDate(); ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <select class="form-control form-control-sm" name="hora" id="hora" required>
                                            <option value="" disabled selected>Selecciona una hora</option>
                                            <?php
                                                if(isset($reserva)) {
                                            ?>
                                                <option value="<?php echo $sesionR->getHour(); ?>" selected ><?php echo $sesionR->getHour(); ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sala</label>
                                        <input type="text" name="sala" id="sala" value="<?php if(isset($reserva)){ echo "Sala " . $sesionR->getRoom();} ?>" class="form-control form-control-sm" disabled>
                                    </div>
                                </div>
                            </div> 
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Tarifa</label>
                                        <input type="text" name="tarifa" id="tarifa" value="<?php if(isset($reserva)){ echo $tarifaR->getType() . " - " . $tarifaR->getPrice() . "€";} ?>" class="form-control form-control-sm" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Número de entradas</label>
                                        <input type="number" name="entradas" id="entradas" value="<?php if(isset($reserva)){ echo $reserva->getNumSeat();} else { echo "1";} ?>" min="1" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="mensaje-error"><?php echo isset($errorReserva) ? utf8_decode($errorReserva) : '' ; ?></div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col text-center mb-3">
                                    <div class="text-center" id="mensajeEntradas">
                                        <?php
                                            if(isset($reserva)) {
                                        ?>
                                            Quedan <?php echo $sesionR->getSeat(); ?> entradas.
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div> 
                            <div class="row justify-content-center">
                                <div class="col">
                                    <button type="submit" class="btn boton2" name="guardar"> Guardar </button>
                                </div>
                            </div>
                        </form>
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
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>