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
        <script type="text/javascript" src="../Views/scripts/panel-admin.js"></script>
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
                <h1 class="text-center titulo"><?php if($_SESSION['accion'] == "modificar") { echo "Modificar";} else { echo "Añadir";} ?> película</h1>
                <div class="row justify-content-center">
                    <div class="col-10 text-center p-3 login-registro">
                        <form id="formulario" action="<?php $_SERVER['PHP_SELF']; ?>" class="form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="valoracion" class="form-control form-control-sm" value="<?php if(isset($pelicula)){ echo $pelicula->getValuation();} else { echo 0; } ?>" required>
                        <input type="hidden" name="codigo" class="form-control form-control-sm" value="<?php if(isset($pelicula)){ echo $pelicula->getId();} else { if(isset($_POST['codigo'])){ echo $_POST['codigo']; } else { echo ''; } } ?>">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input type="text" name="titulo" class="form-control form-control-sm" value="<?php if(isset($_POST['titulo'])){ echo $_POST['titulo']; } else { if(isset($pelicula)){ echo $pelicula->getTitle();} else { echo ''; } } ?>" required>
                                        <div class="mensaje-error"><?php echo isset($errorTitle) ? utf8_decode($errorTitle) : '' ; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col">
                                    <label>Género</label>
                                    <div class="table-responsive">
                                        <table class="table tabla-genero" data-striped="true">
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Acción" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Acción") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Acción</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Ciencia ficción" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Ciencia ficción") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Ciencia ficción</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Terror" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Terror") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Terror</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Aventura" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Aventura") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Aventura</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Fantástico" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Fantástico") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Fantástico</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Suspenso" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Suspenso") {echo "checked";}}} ?> >
                                                        <label class="form-check-label">Suspenso</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Oeste" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Oeste") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Oeste</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Animación" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Animación") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Animación</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Histórica" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Histórica") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Histórica</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Policíaco" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Policíaco") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Policíaco</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Drama" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Drama") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Drama</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Comedia" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Comedia") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Comedia</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Familiar" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Familiar") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Familiar</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Musical" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Musical") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Musical</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="genero[]" class="form-check-input" value="Bélica" <?php if(isset($pelicula) || isset($_POST['genero'])) {foreach ($generos as $genero) {if($genero == "Bélica") {echo "checked";}}} ?>>
                                                        <label class="form-check-label">Bélica</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha de estreno</label>
                                        <input type="text" name="fechaEstreno" class="form-control form-control-sm" placeholder="01/01/2020" value="<?php if(isset($pelicula)){ echo $pelicula->getDate();} else { if(isset($_POST['fechaEstreno'])){ echo $_POST['fechaEstreno']; } else { echo ''; } } ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Año</label>
                                        <input type="text" name="año" class="form-control form-control-sm" value="<?php if(isset($pelicula)){ echo $pelicula->getAge();} else { if(isset($_POST['año'])){ echo $_POST['año']; } else { echo ''; } } ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Duración</label>
                                        <input type="text" name="duracion" class="form-control form-control-sm" value="<?php if(isset($pelicula)){ echo $pelicula->getLength();} else { if(isset($_POST['duracion'])){ echo $_POST['duracion']; } else { echo ''; } } ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pais</label>
                                        <input type="text" name="pais" class="form-control form-control-sm" value="<?php if(isset($pelicula)){ echo $pelicula->getCountry();} else { if(isset($_POST['pais'])){ echo $_POST['pais']; } else { echo ''; } } ?>" required>
                                    </div>
                                </div>
                            </div> 
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Sinopsis</label>
                                        <textarea class="form-control form-control-sm" name="sinopsis" rows="5" cols="60"  required><?php if(isset($pelicula)){ echo $pelicula->getSynopsis();} else { if(isset($_POST['sinopsis'])){ echo $_POST['sinopsis']; } else { echo ''; } } ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Imagen</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control form-control-sm">
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
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>