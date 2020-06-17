$(document).ready(function(){
    $("#fecha").change(function() {
        var fecha = document.getElementById("fecha").value;
        enviarFecha(fecha);
    });
    $("#hora").change(function() {
        var hora = document.getElementById("hora").value;
        enviarHora(hora);
    });
    $("#entradas").change(function() {
        var entradas = document.getElementById("entradas").value;
        enviarEntradas(entradas);
    });

});
  
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
            $('#precioTarifa').val(infoSesion[3]);
            $('#precioTotalInput').val(infoSesion[3]);
            $('#precioTotal').text(infoSesion[3]);
            $('#precioTotal').after("€");
        }
    });
};

function enviarEntradas(entradas) {
    precioAnterior = document.getElementById("precioTarifa").value;
    precioTotal = parseInt(precioAnterior) * parseInt(entradas);
    $('#precioTotal').text(precioTotal);
    $('#precioTotalInput').val(precioTotal);
};