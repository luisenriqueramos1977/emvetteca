<?php

require ('Entities/ProductosEntity.php');

/*
 * Se incluye la clse que contiene la denominacion de la tabla productos y sus columnas
 */

class ProductosModel
{
    /*
     * Se obtienen todos los tipos de productos especificados en la base de datos
     */ 
    
    function GetTipoProducto(){
        
        require Credentials.php;
        
        /*
         * Se abre la coneccion a la base de datos y se selecciona
         */
        
        $db = pg_connect( $host, $user, $passwd ) or die(pg_error());
        pg_select_db($database);
        $result = pg_query("SELECT DISTINCT Productos , Tipo FROM emvetteca , Productos") or die(pg_error());
        $Tipos = array();
        
        /*
         * se obtienen los datos de la base de datos 
         */
        
        while ($row =pg_fetch_array($result)) {
            
            array_push($Tipos, $row[0]);
        }
        
        // se cierra la coneccion y se retorna 
        
        pg_close();
        
        return $Tipos;
        
    }
    
    // Se obtienen los productos por tipos y se guardan en un registro
    
    
    function GetProductoporTipo($Tipo){
        
        require Credentials.php;
        
        /*
         * Se abre la coneccion a la base de datos y se selecciona
         */
        
        $db = pg_connect( $host, $user, $passwd ) or die(pg_error());
        pg_select_db($database);
        
        $query = "SELECT * FROM  emvetteca WHERE 'Tipo' LIKE '$Tipo' ";
        
        $result = pg_query($query) or die(pg_error());
        $productoArray = array();
        
        //obtener datos de la base de datos
        
        while ($row = pg_fetch_array($result)){
            
            $Codigo = $row[1];
            $Nombre = $row[2];
            $Existencia = $row[3];
            $Costo = $row[4];
            $Precio = $row[5];
            $Tipo = $row[6];
            $Imagen = $row[7];
            $Decripcion = $row[8];
            
            // se crea un objeto tipo producto y se guarda en un registro de productos
            
            $producto = new ProductosEntity(-1, $Codigo, $Nombre, $Existencia, $Costo, $Precio, $Tipo, $Imagen, $Decripcion);
            
            array_push($productoArray, $producto);
            
        }
        
        // se cierra la coneccion y se retorna
        
        pg_close();
        
        return $productoArray;
        
    }
    
    
    
}

