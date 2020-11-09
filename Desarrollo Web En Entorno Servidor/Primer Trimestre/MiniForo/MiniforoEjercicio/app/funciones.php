<?php
    function usuarioOk($usuario, $contra) :bool {
    $resu= false;
    $long = strlen($usuario);

    if ($long >= 8 && $contra == strrev($usuario)) {
        $resu = true;
    }

    return $resu;   
    }
?>