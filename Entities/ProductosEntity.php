<?php


/*
 * se definen las columnas de la tabla
 */
class ProductosEntity
{
    public $Codigo;
    public $Nombre;
    public $Existencia;
    public $Costo;
    public $Precio;
    public $Tipo;
    public $Imagen;
    public $Decripcion;
    
        /*
         * se inserta el constructor de la clase
         */
    
    function construct($Codigo, $Nombre, $Existencia, $Costo, $Precio, $Tipo, $Imagen, $Decripcion){
        
        $this->Codigo = $Codigo;
        $this->Nombre = $Nombre;
        $this->Existencia = $Existencia;
        $this->Costo = $Costo;
        $this->Precio = $Precio;
        $this->Tipo =  $Tipo;
        $this->Imagen = $Imagen;
        $this->Decripcion = $Decripcion;
        
    }
}

?>