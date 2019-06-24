<?php

require 'Controlador/ProductorControlador.php';

$ProductorControlador = new ProductorControlador();


 if (isset($_POST['Tipos'])) {
   // se llena la pagina con los productos del tipo seleccionado ;
   
    $TablaProductos = $ProductorControlador->$CrearTablaProductos($_POST['Tipos']);
}

else 
{
    $TablaProductos = $ProductorControlador->$CrearTablaProductos('%');
    
}
 


//salida de tabla 


$title = 'Descripcion del Producto';

$content = $ProductorControlador->CrearProductoDropList(). $TablaProductos;

include 'template.php';


?>