window.addEventListener("load", inicial, false);

function inicial() {
	document.getElementById("formulario").addEventListener("input", validarContraseña, false);
}


function validarContraseña(){
    var pass1 = document.getElementById("contraseña1");
    var pass2 = document.getElementById("contraseña2");
    pass2.setCustomValidity(pass2.value != pass1.value ? "La contraseña no coincide." : "")
}