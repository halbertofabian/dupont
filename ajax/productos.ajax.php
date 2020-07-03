<?php
require_once '../controlador/productos.controlador.php';
require_once '../modelo/productos.modelo.php';
class ProductosAjax
{

    public $pdt_sku;

    public static function ajaxEliminarProducto()
    {

        // var_dump($_POST);
        $respuesta = ProductosControlador::ctrEliminarProducto();

       // var_dump($respuesta);
        echo json_encode($respuesta, true);
    }
}

if (isset($_POST['btnEliminarProducto'])) {
    $eliminarProducto = new ProductosAjax();
    $eliminarProducto->pdt_sku = $_POST['pdt_sku'];
    $eliminarProducto->ajaxEliminarProducto();
}
