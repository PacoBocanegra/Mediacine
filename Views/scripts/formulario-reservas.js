$(document).ready(function(){
    $("#pelicula").change(function() {
        var pelicula = document.getElementById("pelicula").value;
        enviarPelicula(pelicula);
    });
    $("#fecha").change(function() {
        var fecha = document.getElementById("fecha").value;
        enviarFecha(fecha);
    });
    $("#hora").change(function() {
        var hora = document.getElementById("hora").value;
        enviarHora(hora);
    });
});

function enviarPelicula(peliculaSelec) {
    var peliculaSesion = { pelicula: peliculaSelec};
    $.ajax ({
        type: "POST",
        url: "./ajax/peliculaAJAX.php",
        data: peliculaSesion,
        success: function(fechas) {
            var arrayFechas = JSON.parse(fechas);
            var select = document.getElementById("fecha");
            $('#fecha').empty();
            var optionMensaje = document.createElement("option");
            optionMensaje.text = "Selecciona una fecha";
            select.add(optionMensaje);
            $('#fecha').children(':first-child').attr('disabled', 'disabled');
            for (let i = 0; i < arrayFechas.length; i++) {
                var option = document.createElement("option");
                option.text = arrayFechas[i];
                option.value = arrayFechas[i];
                select.add(option);
            }
        }
    });
};
  
function enviarFecha(fechaSelec) {
    var fechaSesion = { fecha: fechaSelec};
    $.ajax ({
        type: "POST",
        url: "./ajax/fechaAJAX.php",
        data: fechaSesion,
        success: function(horas) {
            var arrayHoras = JSON.parse(horas);
            var select = document.getElementById("hora");
            $('#hora').empty();
            var optionMensaje = document.createElement("option");
            optionMensaje.text = "Selecciona una hora";
            select.add(optionMensaje);
            $('#hora').children(':first-child').attr('disabled', 'disabled');
            for (let i = 0; i < arrayHoras.length; i++) {
                var option = document.createElement("option");
                option.text = arrayHoras[i];
                option.value = arrayHoras[i];
                select.add(option);
            }
        }
    });
};

function enviarHora(horaSelect) {
    var horaSesion = { hora: horaSelect};
    $.ajax ({
        type: "POST",
        url: "./ajax/horaAJAX.php",
        data: horaSesion,
        success: function(sesion) {
            var infoSesion = JSON.parse(sesion);
            $('#sala').val("Sala " + infoSesion[0]);
            $('#entradas').attr('max', infoSesion[1]);
            $('#mensajeEntradas').text("Quedan " + infoSesion[1] + " entradas.");
            $('#tarifa').val(infoSesion[2] + " - " + infoSesion[3] + "€");
        }
    });
};