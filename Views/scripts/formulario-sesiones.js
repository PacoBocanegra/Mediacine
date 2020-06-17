$(document).ready(function(){
    $("#sala").change(function() {
        var sala = document.getElementById("sala").value;
        enviarSala(sala);
    });
});

function enviarSala(salaSelect) {
    var salaSesion = { sala: salaSelect};
    $.ajax ({
        type: "POST",
        url: "./ajax/formularioSesionSalaAJAX.php",
        data: salaSesion,
        success: function(butacas) {
            var salaButacas = JSON.parse(butacas);
            $('input[name ="butacas"]').val(salaButacas);
        }
    });
};