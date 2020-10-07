<?php
session_start();
require_once '../modelo/pedidos.modelo.php';
require_once '../controlador/pedidos.controlador.php';
require_once '../modelo/productos.modelo.php';
require_once '../controlador/productos.controlador.php';

class PedidosAjax
{

    public $pdo_estado;
    public $pdo_numero;

    public function cambiarEstadoPedidoAjax()
    {
        $respuesta = PedidosModelo::mdlCambiarEstadoPedido($this->pdo_numero, $this->pdo_estado);

        echo json_encode($respuesta, true);
    }
    public function eliminarPedidoAjax()
    {
        $respuesta = PedidosControlador::ctrEliminarPedido($this->pdo_numero);
        echo json_encode($respuesta,true);
    }
}

if (isset($_POST['btnCambiarEstado'])) {
    $cambiar = new PedidosAjax();
    $cambiar->pdo_numero = $_POST['pdo_numero'];
    $cambiar->pdo_estado = $_POST['pdo_estado'];
    $cambiar->cambiarEstadoPedidoAjax();
}

if (isset($_POST['btnEliminarPedido'])) {
    $eliminarPedido = new PedidosAjax();
    $eliminarPedido->pdo_numero = $_POST['pdo_numero'];
    $eliminarPedido->eliminarPedidoAjax();
}
