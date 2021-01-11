/*
 * Funciones auxiliares de javascript,
 * las principales estan en cada archivo.
 */

// Funciones de botones
function confirmarBorrar(nombre, id) {
    if (confirm("Se va a proceder a eliminar eliminar el perfil de  " + nombre)) {
        document.location.href = "?orden=Borrar&id=" + id;
    }
}

function cerrarSesion() {
    document.location.href = "index.php?orden=Cerrar";
}

function altaUsuario() {
    document.location.href = "?orden=Alta";
}

// Función que muestra y oculta el div de login
var x = document.getElementById("log-in-id");
x.style.display = "none"

function login() {
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}