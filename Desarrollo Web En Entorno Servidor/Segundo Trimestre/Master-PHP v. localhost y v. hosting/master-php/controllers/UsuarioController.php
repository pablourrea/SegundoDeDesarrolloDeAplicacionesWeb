<?php
require_once 'models/Usuario.php';

class usuarioController{
	
	public function index(){
		echo "Controlador Usuarios, Acción index";
	}
	
	public function registro(){
		require_once 'views/usuario/registro.php';
	}
	
	public function save(){
		if(isset($_POST)){
			
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
			
			if($nombre && $apellidos && $email && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);
				$usuario->setImagen($imagen);

				$save = $usuario->save();
				if($save){
					$_SESSION['register'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}
		header("Location:".base_url.'usuario/registro');
	}
	
	public function login(){
		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->login();
			
			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
				
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}
				
			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
		
		}
		header("Location:".base_url);
	}
	
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		header("Location:".base_url);
	}

	public function gestionUserAdmin(){
		Utils::isAdmin();

		$usuario = new Usuario();

		$usuarios = $usuario->getAll();
		$usuarios2 = $usuario->getAllPendientes();
		$usuarios3 = $usuario->getAllTotalPrecio();

		require_once 'views/usuario/gestionUserAdmin.php';
	}
	
	public function verinfo(){
		$id = $_GET['id'];

		$usuario = new Usuario();
		$usuario->setId($id);

		$usuarios2 = $usuario->getAllPendientes();
		$usuarios3 = $usuario->getAllTotalPrecio();

		require_once 'views/usuario/masinfo.php';
	}

	public function modificar(){
		$id = $_GET['id'];
		$nombre = $_GET['nombre'];
		$apellidos = $_GET['apellidos'];
		$email = $_GET['email'];

		require_once 'views/usuario/modificar.php';		
	}

	public function modificarPerfil(){
		$id = $_SESSION['identity']->id;
		$nombre = $_SESSION['identity']->nombre;
		$apellidos = $_SESSION['identity']->apellidos;
		$email = $_SESSION['identity']->email;

		$_SESSION['error'] = " ";

		require_once 'views/usuario/modificar.php';
	}

	public function modify(){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//Modifica las variables de sesion si se modifica el propio perfil
		if ($id == $_SESSION['identity']->id){
			$_SESSION['identity']->id = $id;
			$_SESSION['identity']->nombre = $nombre;
			$_SESSION['identity']->apellidos = $apellidos;
			$_SESSION['identity']->email = $email;
		}

		$usuario = new Usuario();

		//Busca si el mail ya existe
		$usuarios = $usuario->getAll();
		while ($us = $usuarios->fetch_object()){
			if ($us->email == $email){
				$emailExiste = true;
			} else {
				$emailExiste = false;
			}
		}

		//Si el mail no existe ya, modifica el perfil
		if ($emailExiste == $true){
			$_SESSION['error'] = "El mail al que ha intentado cambiar ya existe";
			header("Location:".base_url."usuario/modificarPerfil");
		} else {
			$_SESSION['error'] = " ";
			$usuario->setId($id);
			$usuario->setNombre($nombre);
			$usuario->setApellidos($apellidos);
			$usuario->setEmail($email);
			$usuario->setPassword($password);

			$usuario = $usuario->modify();

			header("Location:".base_url);
		}
	}
	
	public function eliminar(){
		Utils::isAdmin();

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$usuario = new Usuario();
			$usuario->setId($id);
			
			$usuario = $usuario->borrar();
		}
		header("Location:".base_url."usuario/gestionUserAdmin");
	}

	public function masinfo(){
		$id = $_GET['id'];

		$usuario = new Usuario();
		$usuario->setId($id);

		$usuarios = $usuario->getAll();
		$usuarios2 = $usuario->getAll();
		$usuarios3 = $usuario->getAll();

		require_once 'views/usuario/gestionUserAdmin.php';
	}

} // fin clase