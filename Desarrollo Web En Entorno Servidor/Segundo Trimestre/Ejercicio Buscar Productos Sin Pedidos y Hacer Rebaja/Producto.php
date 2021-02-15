<?php
class producto {
    private $PRODUCTO_NO;
    private $DESCRIPCION;
    private $STOCK_DISPONIBLE;
    private $PRECIO_ACTUAL;

    // Getter con método mágico
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    
    public function getPRODUCTO_NO() {
        return $this->PRODUCTO_NO;
    }

    public function getDESCRIPCION() {
        return $this->DESCRIPCION;
    }

    public function getSTOCK_DISPONIBLE() {
        return $this->STOCK_DISPONIBLE;
    }

    public function getPRECIO_ACTUAL() {
        return $this->PRECIO_ACTUAL;
    }

    public function setPRODUCTO_NO($PRODUCTO_NO) {
        $this->PRODUCTO_NO = $PRODUCTO_NO;
    }

    public function setDESCRIPCION($DESCRIPCION) {
        $this->DESCRIPCION = $DESCRIPCION;
    }

    public function setSTOCK_DISPONIBLE($STOCK_DISPONIBLE) {
        $this->STOCK_DISPONIBLE = $STOCK_DISPONIBLE;
    }

    public function setPRECIO_ACTUAL($PRECIO_ACTUAL) {
        $this->PRECIO_ACTUAL = $PRECIO_ACTUAL;
    }

}
?>