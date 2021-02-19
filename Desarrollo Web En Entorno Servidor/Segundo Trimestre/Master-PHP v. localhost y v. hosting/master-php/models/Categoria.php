<?php

class Categoria{
	private $id;
	private $nombre;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	public function getAll(){
		$categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
		return $categorias;
	}
	
	public function getOne(){
		$categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");
		return $categoria->fetch_object();
	}

	public function getAllwithValues(){
		$categorias = $this->db->query("SELECT categorias.id as id, categorias.nombre as nombre, sum(productos.stock*productos.precio) as total, sum(productos.stock) as unidades, count(productos.id) as nproductos from categorias, productos where categorias.id = productos.categoria_id GROUP by categorias.id UNION SELECT id, nombre, 0 as total, 0 as unidades, 0 as nproductos from categorias where categorias.id not in ( SELECT productos.categoria_id FROM productos )");
		return $categorias;
	}
	
	public function save(){
		$sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function modify(){
		$sql = "UPDATE categorias SET nombre='{$this->getNombre()}' WHERE id={$this->getId()}";
		$categoria = $this->db->query($sql);
	}

	public function stock(){
		$sql = "SELECT SUM(stock) FROM productos WHERE categoria_id={$this->id}";
		$stock = $this->db->query($sql);
	}

	public function borrar(){
		$sql = "DELETE FROM categorias WHERE id={$this->id};";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}

}