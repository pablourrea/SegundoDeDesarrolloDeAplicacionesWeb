<?php
include_once "Cliente.php";
/*
 * Acceso a datos con BD y Patrón Singleton
 */
class AccesoDatos {

    private static $modelo = null;
    private $dbh = null;
    private $stmt_pedidos = null;
    private $stmt_cliente = null;
    private $stmt_codcliente = null;
    
    public static function initModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    private function __construct(){
        
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
        // Construyo la consulta
        $this->stmt_pedidos = $this->dbh->prepare("select producto, precio from pedidos where cod_cliente =".$_SESSION["codcliente"]);
        $this->stmt_codcliente = $this->dbh->prepare("select cod_cliente from clientes where nombre = ".$_GET['nombre']);
        $this->stmt_cliente = $this->dbh->prepare("select * from clientes where login=:login");
    }

    // Devuelvo un usuario o false
    public function getUsuario(String $login) {
        $user = false;
        
        $this->stmt_usuario->setFetchMode(PDO::FETCH_CLASS, 'clientes');
        $this->stmt_usuario->bindParam(':login', $login);
        if ( $this->stmt_usuario->execute() ){
             if ( $obj = $this->stmt_usuario->fetch()){
                $user= $obj;
            }
        }
        return $user;
    }

    
    
    // Devuelvo los pedidos de los Clientes
    public function getPedidos():array {
        $_SESSION["codcliente"] = $this->stmt_codcliente;
        $tuser = [];
        $this->stmt_pedidos->setFetchMode(PDO::FETCH_CLASS, 'pedidos');
        
        if ( $this->stmt_pedidos->execute() ){
            while ( $pedido = $this->stmt_pedidos->fetch()){
               $tuser[]= $pedido;
            }
        }
        return $tuser;
    }
    
    // Evito que se pueda clonar el objeto.
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}

