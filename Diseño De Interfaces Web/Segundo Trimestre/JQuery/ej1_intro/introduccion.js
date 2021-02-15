// Indicamos que cuando el código esté listo - haya cargado, se ejecute el jquery

$(document).ready(function() {
    alert('Hola Mundo COVID 2020');

    // La sintáxis de JQuery es:

    // $(selector).accion();

    /*
    	$ - Con el dólar indicamos que se va a utilizar jquery (se podría poner jquery).
    	selector - Indicamos el elemento HTMl, etc al que le vamos a aplicar las acciones y métodos de JQuery.
    	accion - Métodos que implican cosas a realizar en nuesra web: eventos, animaciones, etc.
    */

    $('h1').hide();
console.log('Llega 2021 - Adiós nefasto 20');
});

// Tambien se puede sustituir todo lo anterior por: 

$(function() {
    // Código de JQuery.
});