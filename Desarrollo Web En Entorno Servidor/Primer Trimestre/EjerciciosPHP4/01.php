<?php 
    $usuarios = ["Paco" => "123456", "Marta" => "98765", "Javier" => "superpassword"];
    //--------------------------------------------------------------------------------
    if(isset($_REQUEST["nombre"]) && isset($_REQUEST["contrasenia"])){
		if(!empty($_REQUEST["nombre"]) && !empty($_REQUEST["contrasenia"])){
			$nombre = $_REQUEST["nombre"];
			$pass = $_REQUEST["contrasenia"];
			switch($nombre){
				case "Paco":
				case "Marta":
				case "Javier":
					if($pass != $usuarios["$nombre"]){
						echo "Clave incorrecta para el usuario $nombre.<br>";
						echo "<br><button><a href='01.html'>Volver</a></button>";
					}else{
						echo "Bienvenid@, $nombre.<br>";
						echo "<br><button><a href='01.html'>Volver</a></button>";
					}
					break;
				default: 
					echo "Nombre de usuario incorrecto.<br>";
					echo "<br><button><a href='01.html'>Volver</a></button>";
					break;
			}
		}else{
			echo "Envío de datos incorrecto.<br>";
			echo "<br><button><a href='01.html'>Volver</a></button>";
		} 
    }else{
        echo "Envío de datos incorrecto.<br>";
        echo "<br><button><a href='01.html'>Volver</a></button>";
    }
?>