<?php

require ("Model/ProductosModel.php");

class ProductorControlador
{
    function CrearProductoDropList() {
        
        $productoModel = new ProductosModel();
        
        $result = "<form action = '' method = 'post' width '200px' >
                    Por favor seleccione un tipo de producto:
                    <select name = 'Tipos'>
                        <option value = '%' >All</option>
                        ".$this->CrearValoresOpciones($productoModel->GetProductoporTipo()).
                        "</select>
                        <input Type = 'submit' value = 'Buscar'
                    </form>";
        
                     return $result;
    }
    
    function CrearValoresOpciones(array $valueArray) 
    {
        $result = "";
        
        foreach ($valueArray as $value )
          {
            
            $result = $result . "<option value = '$value'>$value</option>";
            
        }
        return $result;
    }
    
    function CrearTablaProductos($Tipos) 
    {
        $productoModel = New ProductosModel();
        $productoArray = $productoModel->GetProductoporTipo($Tipos);
        $result = "";
        
        // se genera una tabla para cada entidad 
        
        foreach ($productoArray as $key => $Producto)
        {
            $result = $result . 
                "<table class = 'TablaProducto'>
                <tr>
                    <th> </th>
                    <th> Codigo </th>
                    <td> $Producto->Codigo</td>
                </tr>

                <tr>
                    <th rowspan = '6' width = '150px'><img runat 'server' src = '$Producto->Imagen'/></th>

                    <th width ='75px'>Nombre</th>
                    <td> $Producto->Nombre</td>
                </tr>

                <tr>
                    <th> Existencia </th>
                    <td> $Producto->Existencia</td>
                </tr>

                <tr>
                    <th> Costo  </th>
                    <td> $Producto->Costo</td>
                </tr>

                <tr>
                    <th> Precio </th>
                    <td> $Producto->Precio</td>
                </tr>

                <tr>
                    <th> Tipo </th>
                    <td> $Producto->Tipo</td>
                </tr>

                <tr>
                    <th> Imagen </th>
                    <td> $Producto->Imagen</td>
                </tr>

                <tr>
                    <th> Descripcion </th>
                    <td colspan = '2'> $Producto->Descripcion</td>
                </tr>

                </table>
";
        }
        return $result;
    }
    
    
    
    
}

?>
