<?php
require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class categoriaController{
	
	public function index(){
		Utils::isAdmin();
		$categoria = new Categoria();
		// $categorias = $categoria->getAll();
		$categorias = $categoria->getAllwithValues();
		
		require_once 'views/categoria/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria = $categoria->getOne();
			
			// Conseguir productos;
			$producto = new Producto();
			$producto->setCategoria_id($id);
			$productos = $producto->getAllCategory();
		}
		
		require_once 'views/categoria/ver.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/categoria/crear.php';
	}
	
	public function save(){
		Utils::isAdmin();
	    if(isset($_POST) && isset($_POST['nombre'])){
			// Guardar la categoria en bd
			$categoria = new Categoria();
			$categoria->setNombre($_POST['nombre']);
			$save = $categoria->save();
		}
		header("Location:".base_url."categoria/index");
	}

	public function modify(){
		Utils::isAdmin();
		$id = $_GET['id'];
		$nombre = $_POST['categoria'];

		// Guardar la categoria en bd
		$categoria = new Categoria();
		$categoria->setNombre($nombre);
		$categoria->setId($id);
		$categoria = $categoria->modify();

		header("Location:".base_url."categoria/index");
	}

	public function modificar(){
		Utils::isAdmin();

		$id = $_GET['id'];
		require_once 'views/categoria/modificar.php';
	}

	public function stock(){
		Utils::isAdmin();
		$categoria = new Categoria();
		$stock = $categoria->stock();
	}

	public function borrar(){
		Utils::isAdmin();

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$categoria = new Categoria();
			$categoria->setId($id);
			
			$delete = $categoria->borrar();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		header("Location:".base_url."categoria/index");
	}
	
}