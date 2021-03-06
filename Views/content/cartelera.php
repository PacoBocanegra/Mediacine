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
        <script type="text/javascript" src="../Views/scripts/cartelera.js"></script>
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
			    <!-- Peliculas -->
                <h1 class="text-center mb-3 titulo"> Cartelera </h1>
			    <div class="row justify-content-center">
                    <?php
                        foreach ($data['peliculas'] as $pelicula) {
                            if(isset($_SESSION['usuario'])) {
                                $puntuacion = Valoracion::getUsuarioValorado($usuario->getDNI(), $pelicula->getId());
                            } else {
                                $puntuacion = false;
                            }
                    ?>
			    	<div class="col-lg-4 col-md-6 mb-4">
                        <!-- Ventana modal de la película -->
                        <div class="modal" id="pelicula<?php echo $pelicula->getId(); ?>">
                            <div class="modal-dialog modal-dialog-centered ventana-modal">
                                <div class="modal-content">
                                    <div class="modal-title mt-3 text-center titulo-modal">
                                        <?php echo $pelicula->getTitle(); ?>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-foto text-center">
                                            <img src="<?php echo $pelicula->getImage(); ?>" class="img-fluid">
                                        </div>
                                        <div class="modal-información">
                                            <div class="text-center">
                                                <?php echo $pelicula->getAge(); ?> - <?php echo $pelicula->getGenre(); ?> - <?php echo $pelicula->getLength(); ?>
                                            </div>
                                            <div class="text-center mb-3 valoracion-modal">
                                                <span class="icono-valoracion">
                                                    <img src="../Views/images/icono-estrella.png">
                                                </span>
                                                <span id="valoracion<?php echo $pelicula->getId(); ?>" class="puntuacion-valoracion">
                                                    <?php echo $pelicula->getValuation(); ?>
                                                </span>
                                                <div class="text-center">
                                                    <form id="formularioValorar" action="<?php $_SERVER['PHP_SELF']; ?>" class="formVal" method="post">
                                                        <div class="valoracion text-center">
                                                            <input id="radio1<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="10" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "10.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio1<?php echo $pelicula->getId(); ?>">★</label><!--
                                                            --><input id="radio2<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="9" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "9.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio2<?php echo $pelicula->getId(); ?>">★</label><!--
                                                            --><input id="radio3<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="8" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "8.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio3<?php echo $pelicula->getId(); ?>">★</label><!--
                                                            --><input id="radio4<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="7" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "7.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio4<?php echo $pelicula->getId(); ?>">★</label><!--
                                                            --><input id="radio5<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="6" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "6.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio5<?php echo $pelicula->getId(); ?>">★</label><!--
                                                            --><input id="radio6<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="5" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "5.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio6<?php echo $pelicula->getId(); ?>">★</label><!--
                                                            --><input id="radio7<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="4" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "4.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio7<?php echo $pelicula->getId(); ?>">★</label><!--
                                                            --><input id="radio8<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="3" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "3.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio8<?php echo $pelicula->getId(); ?>">★</label><!--
                                                            --><input id="radio9<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="2" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "2.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio9<?php echo $pelicula->getId(); ?>">★</label><!--
                                                            --><input id="radio10<?php echo $pelicula->getId(); ?>" type="radio" name="estrellas" value="1" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled "; } if($puntuacion == "1.0") { echo "checked"; } ?>><!--
                                                            --><label for="radio10<?php echo $pelicula->getId(); ?>">★</label>
                                                            <input type="hidden" name="pelicula" value="<?php echo $pelicula->getId(); ?>" class="form-control form-control-sm">
                                                        </div>
                                                        <div>
                                                            <button type="submit" class="btn boton1 ml-2" name="submit" id="botonVal<?php echo $pelicula->getId(); ?>" <?php if ($puntuacion or !isset($_SESSION['usuario'])) {  echo "disabled"; } ?>>Valorar</button>
                                                            <?php
                                                                if (!isset($_SESSION['usuario'])) {
                                                            ?>
                                                                <div class="text-center negrita"> Necesitas loguearte para valorar </div>
                                                            <?php
                                                                }
                                                            ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="mb-3 sinopsis">
                                                <?php echo $pelicula->getSynopsis(); ?>
                                            </div>
                                            <div>
                                                <span class="negrita">Fecha estreno:</span> <?php echo $pelicula->getDate(); ?>
                                            </div>
                                            <div>
                                                <span class="negrita">Pais:</span> <?php echo $pelicula->getCountry(); ?>
                                            </div>
                                            <div class="mt-3">
                                                <form class="form" method="post">
                                                    <div class="row justify-content-center">
                                                        <div class="col-6 text-center">
                                                            <form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                                                <button class="btn boton1" name="comprar" value="<?php echo $pelicula->getId(); ?>" type="submit" <?php if(!isset($_SESSION['usuario'])) { echo "disabled"; } ?>>Comprar entradas</button>
                                                            </form>
                                                        </div>
                                                        <?php 
                                                            if(!isset($_SESSION['usuario'])) {
                                                        ?>
                                                        <div>
                                                            <p class="texto-normal azul negrita">Necesitas loguearte para comprar entradas</p>
                                                        </div>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Imagen que se muestra de la película -->
                        <div class="modal-pelicula" data-toggle="modal" data-target="#pelicula<?php echo $pelicula->getId(); ?>">
                            <img src="<?php echo $pelicula->getImage(); ?>" class="img-fluid">
                        </div>
			    	</div>
                    <?php
                        }
                    ?>
                    
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
			    			<input class="btn boton" type="submit" name="enviar" value="Enviar">
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