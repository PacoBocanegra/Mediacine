window.addEventListener("load", inicial, false);

function inicial() {
	document.getElementById("formulario").addEventListener("input", validarContraseña, false);
}


function validarContraseña(){
    var pass1 = document.getElementById("password");
    var pass2 = document.getElementById("password2");
    pass2.setCustomValidity(pass2.value != pass1.value ? "La contraseña no coincide." : "")
}