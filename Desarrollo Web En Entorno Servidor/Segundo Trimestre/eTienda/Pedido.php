<?php

class Pedido {
    
    private $numped;
    private $codCliente;
    private $producto;
    private $precio;
    
    // Getter con método mágico
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    // Setter con método mágico
    public function __set($atributo,$valor){
        if(property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }
    // Seter manuales
    public function setcodCliente(string $codCliente)
    {
        $this->codCliente = $codCliente;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function setProducto(int $producto)
    {
        $this->producto = $producto;
    }
    public function setPrecio(string $precio)
    {
        $this->precio = $precio;
    }
    
    
}