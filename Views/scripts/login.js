window.addEventListener("load", inicial, false);

function inicial() {
	document.getElementById("ojo").addEventListener("click", mostrarContrasena, false);
}


function mostrarContrasena(){
    var tipo = document.getElementById("contraseña");
    var icono = document.getElementById("ojo");
    if(tipo.type == "password"){
        tipo.type = "text";
        icono.className = "btn icon-eye-blocked"
    }else{
        tipo.type = "password";
        icono.className = "btn icon-eye"
    }
}