<?php
include_once "Cliente.php";

/*
 * Acceso a datos con BD y Patrón Singleton
 */
class AccesoDatos {
    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;
    private $wtmt = null;
    private $ptmt = null;
    private $otmt = null;
    
    public static function initModelo() {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }

        return self::$modelo;
    }

    private function __construct() {
        try {
            $dsn = "mysql:host=localhost;dbname=empresa;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Error de conexión ".$e->getMessage();

            exit();
        }

        // Construyo la consulta
        $this->stmt = $this->dbh->prepare("SELECT * FROM `productos` WHERE PRODUCTO_NO NOT IN (SELECT PRODUCTO_NO FROM PEDIDOS) ORDER BY `PRODUCTO_NO` ASC");
        $this->wtmt = $this->dbh->prepare("UPDATE productos SET PRECIO_ACTUAL=(PRECIO_ACTUAL * 0.90) WHERE PRODUCTO_NO = ?");
        
    }
    
    public function obtener_productos ():array {
        $productos=[];
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);

        if ( $this->stmt->execute() ) {
            while ( $fila = $this->stmt->fetch()) {
                $prod = new producto();
                $prod->setPRODUCTO_NO($fila['PRODUCTO_NO']);
                $prod->setDESCRIPCION($fila['DESCRIPCION']);
                $prod->setSTOCK_DISPONIBLE($fila['STOCK_DISPONIBLE']);
                $prod->setPRECIO_ACTUAL($fila['PRECIO_ACTUAL']);
                $productos[]=$prod;

            }
        }

        return $productos;
    }

    public function actualizar_productos($tproducto):void {
        foreach ($tproducto as $producto) {
            $this->wtmt->bindValue(1,$producto);
            $this->wtmt->execute();
        }
        
    }
     
}
?>