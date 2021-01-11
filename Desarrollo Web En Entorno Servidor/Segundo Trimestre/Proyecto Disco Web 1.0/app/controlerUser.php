<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------
include_once 'config.php';
include_once 'modeloUser.php';

/*
 * Inicio Muestra o procesa el formulario (POST)
 */

function ctlUserInicio(){
    $msg = "";
    $user = "";
    $clave = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['user']) && isset($_POST['clave'])) {
            $user = $_POST['user'];
            $clave = $_POST['clave'];
            if (modeloOkUser($user, $clave)) {
                $_SESSION['user'] = $user;
                $_SESSION['tipouser'] = modeloObtenerTipo($user);
                if ($user == "admin") { // si el usuario es administrador tendra acceso a la pagina
                    if ($_SESSION['tipouser'] == "Máster") {
                        $_SESSION['modo'] = GESTIONUSUARIOS;
                        header('Location:index.php?orden=VerUsuarios');
                    }
                } else {
                    ($_SESSION['modo'] = GESTIONFICHEROS);
                    header('Location:index.php?operacion=VerFicheros');
                    // Usuario normal;
                    // PRIMERA VERSIÓN SOLO USUARIOS ADMISTRADORES
                    // $_SESSION['modo'] = GESTIONFICHEROS;
                    // Cambio de modo y redireccion a verficheros
                }
            } else {
                $msg = "Error: usuario y contraseña no válidos.";
            }
        }
    }
    
    if (isset($_GET['orden']) == "AltaUser"){
        // La orden tiene una funcion asociada
        $procRuta =  "ctlUserAltaUser";
    }
    include_once 'plantilla/facceso.php';
}

// Cierra la sesión y vuelva los datos
function ctlUserCerrar(){
    session_destroy();
    modeloUserSave();
    header('Location:index.php');
}

// Muestro la tabla con los usuario 
function ctlUserVerUsuarios (){
    // Obtengo los datos del modelo
    $usuarios = modeloUserGetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verusuariosp.php';
   
}

function ctlUserBorrar()
{
    $msg = "";
    $user = $_GET['id'];
    if (modeloUserDel($user)) {
        $msg = "El usuario se borró correctamente.";
    } else {
        $msg = "No se pudo borrar el usuario.";
    }
    modeloUserSave();
    ctlUserVerUsuarios($msg);
}

function ctlUserAlta()
{
    if (! isset($_POST["iduser"])) {
        include_once 'plantilla/fnuevoAdmin.php';
    } else {
        $msg = "";
        // echo "Estas en ctlUserAlta";
        $id = $_POST["iduser"];
        $data = [
            $_POST["clave1"],
            $_POST["nombre"],
            $_POST["email"],
            $_POST["plan"],
            $_POST["estado"]
        ];
        echo $id;
        var_dump($data);
        // modeloUserAdd($id, $data);
        if (cumplerequisitos($_POST["clave1"], $_POST["clave2"],$_POST["iduser"],$_POST["email"],$msg)) {
            if (modeloUserAdd($id, $data)) {
                $msg = "El usuario fue creado con éxito";
            }
        } else {
            $msg .="<br>El usuario no fue creado";
            include_once "plantilla/fnuevoAdmin.php";
        }
        modeloUserSave();
        ctlUserVerUsuarios($msg);
    }
}

function ctlUserAltaUser()
{
    if (! isset($_POST["iduser"])) {
        include_once 'plantilla/fnuevoUser.php';
    } else {
        $msg = "";
        // echo "Estas en ctlUserAlta";
        $id = $_POST["iduser"];
        $data = [
            $_POST["clave1"],
            $_POST["nombre"],
            $_POST["email"],
            $_POST["plan"],
            "I"
        ];
        echo $id;
        var_dump($data);
        // modeloUserAdd($id, $data);
        if (cumplerequisitos($_POST["clave1"], $_POST["clave2"],$_POST["iduser"],$_POST["email"],$msg)) {
            if (modeloUserAdd($id, $data)) {
                $msg = "El usuario fue creado con éxito";
            }
        } else {
            $msg = "El usuario no fue creado";
        }
        modeloUserSave();
        ctlUserInicio();
    }
}

function ctlUserModificar()
{
    $msg = "";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['clave1']) && isset($_POST['email']) && isset($_POST['estado']) && isset($_POST['nombre']) && isset($_POST['plan'])) {
            $id = $_POST['iduser'];
            $nombre = $_POST['nombre'];
            $clave = $_POST['clave1'];
            $mail = $_POST['email'];
            $plan = $_POST['plan'];
            $estado = $_POST['estado'];
            $modificado = [
                $clave,
                $nombre,
                $mail,
                $plan,
                $estado
            ];
            
            //  if (cumplecontra($_POST["clave1"], $_POST["clave2"],$_POST["iduser"],$_POST["email"])) {
            if (modeloUserUpdate($id, $modificado)) {
                $msg = "El usuario fue modificado con éxito";
                //  }
            }
            else {
                $msg = "El usuario no pudo ser modificado";
            }
        }
    } else {
        
        //al pulsar en modificar le paso el id, con ese id sacamos los datos del id(usuario) para, que luego se mostraran a la hora de modificar
        $user = $_GET['id'];
        $datosusuario = $_SESSION["tusuarios"][$user];
        $clave = $datosusuario[0];
        $nombre = $datosusuario[1];
        $mail = $datosusuario[2];
        $plan = $datosusuario[3];
        $estado = $datosusuario[4];
        include_once 'plantilla/fmodificar.php';
    }
    modeloUserSave();
    ctlUserVerUsuarios($msg);
}

function ctlUserDetalles()
{
    $user = $_GET['id'];
    $usuarios = modeloUserGet($user);
    include_once 'plantilla/fdetalles.php';
}
?>