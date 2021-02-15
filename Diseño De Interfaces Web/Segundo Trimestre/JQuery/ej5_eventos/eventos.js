$(document).ready(function() {
    //Interesante declarar variables a utilizar
    var boton = $('#boton');

    boton.click(function() {
        alert('Has activado la web');
    });


    // Evento con funcion - Podemos declarar previamente la función con la que quweremos trabajar
    // function saludo(){
    // 	alert('Saludos');
    // }

    // boton.on('click', saludo);

    // Trabajando función qu emanipula un estilo en JavaScript
    // boton.on('mouseenter', function(){
    // 	document.body.style.background = '#000';
    // });

    // boton.on('mouseleave', function(){
    // 	document.body.style.background = '#fff';
    // });

    // Eliminando Eventos
    // boton.on('click', function(){
    // 	alert('Saludos');
    // 	console.log('Saludos');
    // });

    // $('#desactivar').on('click', function(){
    // 	boton.off('click');
    // 	console.log('Boton de Ejecutar Desactivado');
    // });


    //Desactivando el comportamiento de los enlaces
    $('a').on('click', function(e) {
        e.preventDefault();
        console.log('Desactivo el comportamiento de los enlaces');
    });

});