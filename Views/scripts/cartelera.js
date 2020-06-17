$(document).ready(function(){
    $('.formVal').submit(function() {
        // Enviamos el formulario usando AJAX
        $.ajax({
            type: "POST",
            url: "./ajax/valoracionAJAX.php",
            data: $(this).serialize(),
            success: function(data) {
                var datos = JSON.parse(data);
                var valoracion = "#valoracion" + datos[0];
                var botonSubmit = "#botonVal" + datos[0];
                $(valoracion).text(datos[1]);
                $(botonSubmit).attr("disabled","disabled");
            }
        })        
        return false;
    });
});