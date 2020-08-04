<?php
session_start();
require_once '../modelo/pedidos.modelo.php';
class PedidosAjax
{

    public $pdo_estado;
    public $pdo_numero;

    public function cambiarEstadoPedidoAjax()
    {
        $respuesta = PedidosModelo::mdlCambiarEstadoPedido($this->pdo_numero, $this->pdo_estado);

        echo json_encode($respuesta, true);
    }
}

if (isset($_POST['btnCambiarEstado'])) {
    $cambiar = new PedidosAjax();
    $cambiar->pdo_numero = $_POST['pdo_numero'];
    $cambiar->pdo_estado = $_POST['pdo_estado'];
    $cambiar->cambiarEstadoPedidoAjax();
}
