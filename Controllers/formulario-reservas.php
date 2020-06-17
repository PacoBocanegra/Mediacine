<?php
    session_start();
    require_once '../Models/Pelicula.php';
    require_once '../Models/Sesion.php';
    require_once '../Models/Tarifa.php';
    require_once '../Models/Sala.php';
    require_once '../Models/Usuario.php';
    require_once '../Models/Reserva.php';
    if($_SESSION['accion'] == "añadir") {
        if(isset($_POST['guardar'])) {
            $sesion = Sesion::getSesionPelicula($_POST['pelicula'], $_POST['fecha'], $_POST['hora']);
            if (Reserva::comprobarReserva($_POST['dni'], $sesion->getId())) {
                $errorReserva = "Este usuario ya ha reservado en esta sesion";
            } 
            if (!Usuario::comprobarDNI($_POST['dni'])) {
                $errorDNI = "Usuario no registrado.";
            } else {
                $butacasDisp = $sesion->getSeat() - $_POST['entradas'];
                $sesion->addSeat($butacasDisp);
                $reserva = new Reserva($_POST['dni'], $sesion->getId(), $_POST['entradas']);
                $sesion->update($sesion->getId());
                $reserva->insert();
                header("location: ./panel-reservas.php");
            }
        }
    }

    if($_SESSION['accion'] == "modificar") {
        $sesionR = Sesion::getSesion($_SESSION['idSesion']);
        $peliculaR = Pelicula::getPelicula($sesionR->getMovie());
        $tarifaR = Tarifa::getTarifa($sesionR->getRate());
        $reserva = Reserva::getReserva($_SESSION['idUsuario'], $sesionR->getId());
        if(isset($_POST['guardar'])) {
            if (!Usuario::comprobarDNI($_POST['dni'])) {
                $errorDNI = "Usuario no registrado.";
            } else {
                //Hay que seguir puliendo el cambiar la reserva para la pelicula de otra sesión y que le devuelva las entradas a la otra sesión
                $sesionUpdate = Sesion::getSesionPelicula($_POST['pelicula'], $_POST['fecha'], $_POST['hora']);
                if ($sesionUpdate->getId() != $sesionR->getId()) {
                    if (Reserva::comprobarReserva($_POST['dni'], $sesionUpdate->getId())) {
                        $errorReserva = "Este usuario ya ha reservado en esta sesion";
                    } else {
                        // Si la reserva es sobre otra sesión, se devuelven los asientos a la antigua sesión y se le restan a la nueva
                        $butacasDevolver = $sesionR->getSeat() + $reserva->getNumSeat();
                        $sesionR->addSeat($butacasDevolver);
                        $sesionR->update($sesionR->getId());
                        $butacasOcupadas = $sesionUpdate->getSeat() - $_POST['entradas'];
                        $sesionUpdate->addSeat($butacasOcupadas);
                        $reservaMod = new Reserva($_POST['dni'], $sesionUpdate->getId(), $_POST['entradas']);
                        $reservaMod->update($reserva->getDNI(), $reserva->getSesion());

                    }
                } else {
                    //Calculos para comprobar si los cambios son sobre la misma sesión, si se compran más o menos entradas para sumar o restar asientos disponibles
                    if ($reserva->getNumSeat() > $_POST['entradas']) {
                        $butacasSobrantes = $reserva->getNumSeat() - $_POST['entradas'];
                        $butacas = $sesionUpdate->getSeat() + $butacasSobrantes;
                        $sesionUpdate->addSeat($butacas);
                    } else {
                        $butacasSobrantes = $_POST['entradas'] - $reserva->getNumSeat();
                        $butacas = $sesionUpdate->getSeat() - $butacasSobrantes;
                        $sesionUpdate->addSeat($butacas);
                    }
                    if ($_POST['dni'] == $reserva->getDNI()) {
                        $reservaUpdate = Reserva::getReserva($_POST['dni'], $sesionUpdate->getId());
                        $reservaUpdate->addNumSeat($_POST['entradas']);
                    } else {
                        $reservaUpdate = new Reserva($_POST['dni'], $sesionUpdate->getId(), $_POST['entradas']);
                    }
                    
                    $reservaUpdate->update($reserva->getDNI(), $reserva->getSesion());
                }
                $sesionUpdate->update($sesionUpdate->getId());
                header("location: ./panel-reservas.php");
            }
        }
    }
    $peliculas = Pelicula::getPeliculas();
    include '../Views/content/formulario-reservas.php';
?>