/*
 *
 *      SCRIPTS DEL PROYECTO
 *      DISEÑADO POR PABLO URREA
 *      PARA DISEÑO DE INTERFACES WEB
 *      EN EL CURSO 2º DE DAW
 *      EN EL AÑO 2021
 *
 */

/*
 *      INTRO SCRIPTS
 */

// HIDE AND SHOW INTRO SHOW VIDEO

$("#how-it-works-button-video").click(function() {
    $('#external-div-show-video').show();
    $('#how-it-works-button-video').hide();
});
$("#how-it-works-button-video-close").click(function() {
    $('#external-div-show-video').hide();
    $('#how-it-works-button-video').show();
});

$('#intro-language-to-eng').click(function() {
    window.location.href = './app/index-eng.html';
})
$('#intro-language-to-spa').click(function() {
    window.location.href = '../index.html';
})


// ACCESS BUTTON REDIRECT

$('#intro-button-spa').click(function() {
    window.location.href = './app/intro-page-spa.html#home';
})
$('#intro-button-eng').click(function() {
    window.location.href = 'intro-page-eng.html#home';
})

/*
 *      INTRO-PAGE SCRIPTS
 */

// NAVBAR

// HIDE AND SHOW ON RESPONSIVE
$(document).ready(function() {
    $("#hide").click(function() {
        $("#full-navbar").hide();
        $("#small-navbar").show();
    });
    $("#show").click(function() {
        $("#small-navbar").hide();
        $("#full-navbar").show();
    });
});


// HOME

// SLIDESHOW

$(document).ready(function() {
    $('.slider').bxSlider();
});