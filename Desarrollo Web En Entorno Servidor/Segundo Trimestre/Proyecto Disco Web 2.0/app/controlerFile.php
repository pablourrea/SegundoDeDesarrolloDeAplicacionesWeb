<?php
include_once 'config.php';
include_once 'modeloUser.php';

//Almacena dentro de $usuarios el contenido de la sesion usuarios e invoca la vista de ficheros
function ctlFileVerFicheros(){
    $usuarios = modeloUserGetFiles();
    include_once 'plantilla/verarchivos.php';
}

//Invoca la vista de ficheros tras crear un fichero
function ctlFileNuevo(){
    include_once 'plantilla/subirfichero.php';
}

//Almacena dentro de $usuarios el contenido de la sesion usuarios e invoca la vista de ficheros tras borrar un fichero
function ctlFileBorrar(){
    $usuarios = modeloUserGetAll();
    include_once 'plantilla/verarchivos.php';
}

//Almacena dentro de $usuarios el contenido de la sesion usuarios e invoca la vista de ficheros tras renombrar un fichero
function ctlFileRenombrar(){
    $usuarios = modeloUserGetAll();
    include_once 'plantilla/verarchivos.php';
}

//Almacena dentro de $usuarios el contenido de la sesion usuarios e invoca la vista de ficheros tras compartir un fichero
function ctlFileCompartir(){
    $usuarios = modeloUserGetAll();
    include_once 'plantilla/verarchivos.php';
}

//Almacena dentro de $usuarios el contenido de la sesion usuarios e invoca la vista de ficheros tras descargar un fichero
function ctlFileDescargar(){
    $usuarios = modeloUserGetAll();
    include_once 'plantilla/verarchivos.php';
}

//Cierra la sesión y vuelve a la pantalla de inicio
function ctlFileUserCerrar(){
    session_destroy();
    modeloUserSave();
    header('Location:index.php');
}

//Funcion de modificación del propio usuario
function ctlFileModificar(){
    $msg = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['clave1']) && isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['plan'])) {
            $id = $_POST['iduser'];
            $nombre = $_POST['nombre'];
            $clave = $_POST['clave1'];
            $mail = $_POST['email'];
            $plan = $_POST['plan'];

            //Si el plan del usuario es modificado, el estado de este pasa a BLOQUEADO
            if ($plan != ($_SESSION["tusuarios"][$_SESSION["user"]][3])) {
                $estado = "B";
            } else {
                $estado = $_SESSION["tusuarios"][$_SESSION["user"]][4];
            }
            echo $estado;
            //La información se almacena en un array que mas tarde es pasada como parámetro
            $modificado = [
                $clave,
                $nombre,
                $mail,
                $plan,
                $estado
            ];

                if (modeloUserUpdate($id, $modificado)) {
                    $msg = "El usuario fue modificado con éxito";
                }
             else {
                $msg = "El usuario no pudo ser modificado";
            }
        }
    } else {
        $user = $_SESSION["user"];
        $datosusuario = $_SESSION["tusuarios"][$user];
        $clave = $datosusuario[0];
        $nombre = $datosusuario[1];
        $mail = $datosusuario[2];
        $plan = $datosusuario[3];
        $estado = $datosusuario[4];

        include_once 'plantilla/modificarficheros.php';
    }
    modeloUserSave();
    ctlFileVerFicheros($msg);
}

?>
