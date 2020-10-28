<?php
    //Carpeta de destino
    $carpetaDestino="imgusers/";

    //Checkea el tamaño del archivo para que sea inferior a 300Kb
    if( $_FILES['archivo']['size'] < 300000 ) {
        //Si no puede subirlo porque excede el tamaño, induce a un error
    } else {
 
        //Se comprueba que haya algun archivo para subir
        if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]){
 
            //Se recorre mediante bucle los archivos subidos para procesarlos individualmente
         for($i=0;$i<count($_FILES["archivo"]["name"]);$i++){
 
                //Se comprueba que el formato de la imagen sea JPG o PNG
                if($_FILES["archivo"]["type"][$i]=="image/jpg" || $_FILES["archivo"]["type"][$i]=="image/png"){
 
                    //Se comprueba la carpeta de destino y la posibilidad de guardar el archivo subido a ella
                    if(file_exists($carpetaDestino) || @mkdir($carpetaDestino)){
                        $origen=$_FILES["archivo"]["tmp_name"][$i];
                        $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
                    
                        //Se mueve el archivo en el caso de no repetir un nombre de algun archivo en la carpeta de destino
                        if(@move_uploaded_file($origen, $destino)){
                            echo "<br><h1>".$_FILES["archivo"]["name"][$i]." ha sido subido correctamente.</h1>";
                        }else{
                            echo "<br><h1>No se ha sido posible mover el archivo: ".$_FILES["archivo"]["name"][$i].", pruebe con otro archivo. (Este problema se suele solucionar cambiando el nombre del archivo, cambiando su extensión o reduciendo su tamaño a menos de 300Kb)</h1>";
                        }
                    }else{
                        echo "<br><h1>Parece que tenemos problemas en el servidor, pruebe a subir el archivo más tarde.</h1>";
                    }
                }else{
                    echo "<br><h1>Lo sentimos, ".$_FILES["archivo"]["name"][$i]." no es una archivo válido. (Este problema se suele solucionar cambiando el nombre del archivo, cambiando su extensión o reduciendo su tamaño a menos de 300Kb)</h1>";
                }
            }
        }else{
            echo "<br><h1>¡Vaya! <br>¡Parece que no has seleccionado ninguna imagen!</h1>";
        }
    }
?>