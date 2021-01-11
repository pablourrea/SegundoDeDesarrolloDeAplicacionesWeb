<?php 
include_once 'config.php';

/*DATOS DE USUARIO
• Identificador ( 5 a 10 caracteres, no debe existir previamente, solo letras y números)
• Contraseña ( 8 a 15 caracteres, debe ser segura)
• Nombre ( Nombre y apellidos del usuario
• Correo electrónico ( Valor válido de dirección correo, no debe existir previamente)
• Tipo de Plan (0-Básico |1-Profesional |2- Premium| 3- Máster)
• Estado: (A-Activo | B-Bloqueado |I-Inactivo )
*/
// Inicializo el modelo 
// Cargo los datos del fichero a la session
function modeloUserInit(){
    
    /*
    $tusuarios = [ 
         "admin"  => ["12345"      ,"Administrado"   ,"admin@system.com"   ,3,"A"],
         "user01" => ["user01clave","Fernando Pérez" ,"user01@gmailio.com" ,0,"A"],
         "user02" => ["user02clave","Carmen García"  ,"user02@gmailio.com" ,1,"B"],
         "yes33" =>  ["micasa23"   ,"Jesica Rico"    ,"yes33@gmailio.com"  ,2,"I"]
        ];
    */
    if (! isset ($_SESSION['tusuarios'] )){
        $datosjson = @file_get_contents(FILEUSER) or die("ERROR al abrir fichero de usuarios");
        $tusuarios = json_decode($datosjson, true);
        $_SESSION['tusuarios'] = $tusuarios;
    }     
}

// Comprueba usuario y contraseña (boolean)
function modeloOkUser($user,$clave){
    // Comprobamos la contrase�a
    foreach ($_SESSION['tusuarios'] as $key => $valor) {
        // comprobamos si el usuario existe
        // echo "usuario: ",$key;
        if ($user == $key) {
            echo "usuario: ", $key, "Contra: ", $valor[0];
            //Devuelve user y psw, el index los comprueba
            return ($user == $key) && ($clave == $valor[0]);
        }
    }
    return;
}

// Devuelve el plan de usuario (String)
function modeloObtenerTipo($user){
    return PLANES[3]; // Máster
}

// Borrar un usuario (boolean)
function modeloUserDel($user){
    $borrado = false;
    foreach ($_SESSION["tusuarios"] as $clave => $valor) {
        if ($clave == $user) {
            unset($_SESSION["tusuarios"][$clave]);
            array_values($_SESSION["tusuarios"]);
            $borrado = true;
        }
    }
    return $borrado;
}
// Añadir un nuevo usuario (boolean)
function modeloUserAdd($userid,$userdat){
    $_SESSION["tusuarios"][$userid] = $userdat;
    return true;
}

// Actualizar un nuevo usuario (boolean)
function modeloUserUpdate ($userid, $userdat){
    foreach ($_SESSION['tusuarios'] as $clave => $valor) {
        if ($clave == $userid) {
            //Actualizar todos los datos excepto el id de usuario
            $_SESSION['tusuarios'][$userid] = $userdat;
        }
    }
    return true;
}

// Tabla de todos los usuarios para visualizar
function modeloUserGetAll()
{
    // Genero lo datos para la vista que no muestra la contraseña ni los códigos de estado o plan
    // sino su traducción a texto
    $tuservista = [];
    foreach ($_SESSION['tusuarios'] as $clave => $datosusuario) {
        $tuservista[$clave] = [
            $datosusuario[1],
            $datosusuario[2],
            PLANES[$datosusuario[3]],
            ESTADOS[$datosusuario[4]]
        ];
    }
    return $tuservista;
}

// Datos de un usuario para visualizar
function modeloUserGet($user)
{
    $tdetallesUsuario = [];
    
    foreach ($_SESSION['tusuarios'] as $clave => $datosusuario) {
        
        if ($clave == $user) {
            $tdetallesUsuario[$user] = [
                $datosusuario[1],
                $datosusuario[2],
                PLANES[$datosusuario[3]],
                ESTADOS[$datosusuario[4]]
            ];
        }
    }
    return $tdetallesUsuario;
}

// Vuelca los datos al fichero
function modeloUserSave() {
    $datosjon = json_encode($_SESSION['tusuarios']);
    file_put_contents(FILEUSER, $datosjon) or die("Error al modificar base de datos.");
    //fclose($fich);
}

function cumplerequisitos($clave1, $clave2, $user, $email, &$msg) {
    //Variables de registro iniciadas en "false", porque inicialmente los campos están vacios.
    $upperCase = false;
    $lowerCase = false;
    $isNumeric = false;
    $userOk = false;

    /*
    *   Si la contraseña cumple los requisitos, devuelve $userOk=true
    *
    *   Requisitos:
    *   - Las contraseñas de los campos "Contraseña" y "Repetir Contraseña" coinciden.
    *   - La contraseña contiene al menos 8 caracteres.
    *   - La contraseña contiene al menos una minúscula.
    *   - La contraseña contiene al menos una mayúscula.
    *   - La contraseña contiene al menos un número.
    *
    */

    //Recorre la contraseña en busca de minúsculas, mayúsculas y números.
    for ($i = 0; $i < strlen($clave1); $i ++) {
        if ($clave1[$i] == strtoupper($clave1[$i])) {
            $upperCase = true;
        }
        if ($clave1[$i] == strtolower($clave1[$i])) {
            $lowerCase = true;
        }
        if ($clave1[$i] == is_numeric($clave1[$i])) {
            $isNumeric = true;
        }
    }

    //Si la contraseña cumple los requisitos, devuelve $userOk=true
    if ($upperCase == true && $lowerCase == true && $isNumeric==true && $clave1 == $clave2 && strlen($clave1) >= 8) {
        $userOk = true;
    } else {
        //Si la contraseña no cumple los requisitos, devuelve $userOk=false y muestra un mensaje de error.
        $msg = "La contraseña no cumple los requisitos";
        return false;
    }

    //Comprueba si el usuario o el correo ya existen
    foreach ($_SESSION['tusuarios'] as $clave => $datosusuario) {
        //Si no existe el usuario ni la contraseña, devuelve $userOk=true
        if ($clave != $user && $datosusuario[2] != $email) {
            $userOk = true;
        } else {
            //Si existe el usuario o la contraseña, devuelve $userOk=false y muestra un mensaje de error.
            $msg = "El usuario o email ya existe";
            return false;
        }
    }
    return $userOk;
}

function modeloUserGetFiles(){
    $tuservista = [];
    //REALIZAMOS UN FOR-EACH PARA SACAR LOS DATOS DEL USUARIO CONECTADO. EL USUARIO LO SACAMOS A ATRAVES DE $_SESSION["USER"]
   foreach ($_SESSION['tusuarios'] as $clave => $datosusuario) {
       if($clave==$_SESSION["user"]){
       $tuservista[$clave] = [
           $datosusuario[1],
           ESTADOS[$datosusuario[4]]
       ];}
   }
   return $tuservista;
}