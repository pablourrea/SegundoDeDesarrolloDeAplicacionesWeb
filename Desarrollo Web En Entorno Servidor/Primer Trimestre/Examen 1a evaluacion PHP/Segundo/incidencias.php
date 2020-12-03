<?php

    //Incluye datos del archivo "incidenciasform.html"
    include 'incidenciasform.html';

    //Comprueba si hay una cookie de incidencias y si no la hay se establecen las cookies de incidencias en 0
    if (isset($_COOKIE['incidencias'])) {
        //No hace nada
    } else{
        //Establece las cookies incidencias en 0
        setcookie(incidencias, 0, time() + 120, "/"); //120s = 2min
    }

    //Función que obtiene la ip de la máquina del usuario
    function obtenerIpreal() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
    }

    //Si las incidencias son mayores de 2 muestra un mensaje de error
    if ($_COOKIE['incidencias'] > 2){
        echo "Superado el número máximo de incidencias.";
        echo "Espere 2 minutos para introducir otra o reinicie su navegador.";
    } else{
        //Si las incidencias son 2 o menos escribe la incidencia
        //Variables de escritura
        $nombre = $_POST['nombre'];
        $resu = $_POST['resumen'];
        $prioridad = $_POST['prioridad'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $fecha = getdate();

        //Abre el archivo "incidencias.txt" y si no es posible muestra error
        $incidencias = fopen("incidencias.txt", "w") or die("Error, no se ha podido anotar su incidencia.");

        //Escribe los datos de la incidencia con un salto de línea
        $datosinci = $fecha.",".$nombre.",".$resu.",".$prioridad.",".$ip."\n";
        fwrite($incidencias, $fecha.",".$nombre.",".$resu.",".$prioridad.",".$ip."\n");

        //Cierra el archivo de incidencias
        fclose("incidencias.txt");
    }

?>