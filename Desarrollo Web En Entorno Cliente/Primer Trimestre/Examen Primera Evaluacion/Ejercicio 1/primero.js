//Define la variable "texto"
var texto = "";
document.humano.cliente.focus();

//Genera 5 letras aleatorias en mayuscula y los asigna a la variable "texto"
for (var i = 0; i <= 5; i++) {
    var numero = eval(65 + Math.floor(Math.random() * 25));
    var cadena = String.fromCharCode(numero);
    texto = texto + cadena;
}

//Muestra en la caja "referencia" el valor de la variable "texto"
document.humano.referencia.value = texto;

//Función que compara el valor de la caja "referencia" con el introducido
function comparar() {
    if (document.humano.cliente.value == document.humano.referencia.value) {
        //Si los valores coinciden muestra una alerta de acierto y limpia la caja "cliente"
        alert("Capcha correcto");
        document.humano.cliente.value = "";
    } else {
        //Si los valores no coinciden muestra una alerta de error y limpia la caja "cliente"
        alert("Capcha incorrecto");
        document.humano.cliente.value = "";
    }

}