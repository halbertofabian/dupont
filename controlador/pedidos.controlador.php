<?php
class PedidosControlador
{
    public static function ctrAgregarPedido()
    {
        if (isset($_POST['btnAgregarPedido'])) {
            if (empty($_SESSION['carrito'])) {
                echo "Esta vacia la lista de pedidos";
                return;
            }



            $total = 0;
            foreach ($_SESSION['carrito'] as $key => $value) {
                $total += $value['total'];
            }

            $numeroP = PedidosControlador::ctrGenerarNumeroPedido();



            date_default_timezone_set('America/Mexico_city');
            $fecha = date('Y-m-d');
            $hora = date('H:i:s');
            $fecha = $fecha . ' ' . $hora;





            $pedido = array(
                'pdo_numero' => $numeroP,
                'pdo_fecha' => $fecha,
                'pdo_usuario' => $_POST['pdo_usuario'],
                'pdo_total' => $total,
            );

            $crearPedio = PedidosModelo::mdlAgregarPedido($pedido);

            $idPedio = PedidosModelo::mdlConsultarPedidoId($numeroP);





            if ($crearPedio) {
                foreach ($_SESSION['carrito'] as $key => $value) {

                    ProductosModelos::mdlActualizarStok($value['sku'], $value['nuevoStok']);

                    PedidosModelo::mdlAgregarDetallePedido(array(
                        'dpdo_pedido' =>  $idPedio['pdo_id'],
                        'dpdo_producto' => $value['id'],
                        'dpdo_precio' => $value['costo'],
                        'dpdo_cantidad' => $value['cantidad'],
                        'dpdo_total' => $value['total'],

                    ));
                }
                unset($_SESSION['carrito']);
                echo

                    '

                            <script>

                                window.open("lib/tcpdf/pdf/pedidos.php?pdo_numero=' . $numeroP . '","_blank");
                                window.location.href = "pedido/' . $numeroP . '";

                            </script>



                        ';
            } else {
                echo "Mal";
            }
        }
    }

    public static function ctrGenerarNumeroPedido()
    {
        $pedido = PedidosModelo::mdlConsultarPedido();


        if ($pedido == false) {
            $numeroP = "00000";
        } else {
            $numeroP = sizeof($pedido);

            if ($numeroP < 10) {
                $numeroP = "0000" . $numeroP;
            }
            if ($numeroP >= 10 && $numeroP < 100) {
                $numeroP = "000" . $numeroP;
            }
            if ($numeroP >= 100 && $numeroP < 1000) {
                $numeroP = "00" . $numeroP;
            }
            if ($numeroP >= 1000 && $numeroP < 10000) {
                $numeroP = "0" . $numeroP;
            }
            if ($numeroP >= 10000) {
                $numeroP = $numeroP;
            }
        }

        return $numeroP;
    }


    public static function ctrBuscarPedido()
    {

        if (isset($_POST['BuscarPedido'])) {

            $url = AppControlador::ctrRutaApp();
            echo

                '<script>
                    window.location.href = "' . $url . 'pedido/' . $_POST['BuscarPedido'] . '"
                </script>';
        }
    }
}
