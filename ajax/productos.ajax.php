<?php session_start();
require_once '../controlador/productos.controlador.php';
require_once '../modelo/productos.modelo.php';
class ProductosAjax
{

    public $pdt_sku;
    public $pdt_filtro;

    public static function ajaxEliminarProducto()
    {

        // var_dump($_POST);
        $respuesta = ProductosControlador::ctrEliminarProducto();

        // var_dump($respuesta);
        echo json_encode($respuesta, true);
    }


    public  function ajaxAgregarProductosCarrito()
    {

        $producto = ProductosModelos::mdlConsultarProducto($this->pdt_sku);



        //var_dump($producto);
        if ($this->pdt_sku == "") {

            if (isset($_SESSION['carrito'])) {
                $carrito = "";

                foreach ($_SESSION['carrito'] as $key => $value) {


                    $carrito .=
                        '
                        <tr>
                            <td>' . $value['sku'] . '</td>
                            <td>' . str_replace('"', '', $value['descripcion']) . '</td>
                            <td>' . $value['cantidad'] . '</td>
                            <td>
                            <button type="button" class="btn btn-primary" onclick="btnQuitarProducto(' . $value['sku'] . ')" ><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    
                    ';
                }
                echo $carrito;
            }
        } else {

            if (!isset($_SESSION['carrito'])) {
                $productos = array(
                    'sku' => $producto['pdt_sku'],
                    'id' => $producto['pdt_id'],
                    'descripcion' => str_replace('"', '', $producto['pdt_descripcion']),
                    'cantidad' => 1,
                    'costo' => $producto['pdt_costo'],
                    'total' => $producto['pdt_costo'] * 1,
                    'nuevoStok' => $producto['pdt_cantidad'] - 1
                );
                $_SESSION['carrito'][0] = $productos;
            } else {

                $cantidad = 1;
                foreach ($_SESSION['carrito'] as $key => $value) {
                    if ($value['sku'] == $this->pdt_sku) {
                        unset($_SESSION['carrito'][$key]);
                        $cantidad = $value['cantidad'] + 1;
                    }
                }

                $numeroProductos = count($_SESSION['carrito']);
                $productos = array(
                    'sku' => $producto['pdt_sku'],
                    'id' => $producto['pdt_id'],
                    'descripcion' => str_replace('"', '', $producto['pdt_descripcion']),
                    'cantidad' => $cantidad,
                    'costo' => $producto['pdt_costo'],
                    'total' => $producto['pdt_costo'] * $cantidad,
                    'nuevoStok' => $producto['pdt_cantidad'] - $cantidad
                );
                $_SESSION['carrito'][$numeroProductos] = $productos;
            }



            $carrito = "";



            foreach ($_SESSION['carrito'] as $key => $value) {
                $carrito .=
                    '
                <tr>
                    <td>' . $value['sku'] . '</td>
                    <td>' . str_replace('"', '', $value['descripcion']) . '</td>
                    <td>' . $value['cantidad'] . '</td>
                    <td>
                    <button type="button" class="btn btn-primary" onclick="btnQuitarProducto(' . $value['sku'] . ')" ><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            
            ';
            }
            echo $carrito;
        }
    }

    public  function ajaxQuitarProductosCarrito()
    {


        //var_dump($producto);
        foreach ($_SESSION['carrito'] as $key => $value) {
            if ($value['sku'] == $this->pdt_sku) {
                unset($_SESSION['carrito'][$key]);
            }
        }


        $carrito = "";

        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $key => $value) {
                $carrito .=
                    '
                <tr>
                    <td>' . $value['sku'] . '</td>
                    <td>' . str_replace('"', '', $value['descripcion']) . '</td>
                    <td>' . $value['cantidad'] . '</td>
                    <td>
                    <button type="button" class="btn btn-primary" onclick="btnQuitarProducto(' . $value['sku'] . ')" ><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            
            ';
            }
        } else {
            $carrito =

                '
                <tr>
                    <td width="100%">

                        <div class=" col-12 text-center alert alert-light" role="alert">
                            No hay productos agregados
                        </div>

                    </td>
                </tr>
                ';
        }

        echo $carrito;
    }



    public  function ajaxBuscarProductos()
    {
        $data = ProductosModelos::mdlFitrarProductos($this->pdt_filtro);
        $htmlR = "";

        foreach ($data as $key => $value) {
            $htmlR .=
                '<div class="col-lg-4 col-md-6 col-12 col-productos">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">' . str_replace('"', '', $value['pdt_descripcion'])  . '</h5>
                        <p class="card-text">' . $value['pdt_sku'] . '</p>
                        <button class="btn btn-primary" onclick="btnAgregarProductos(' . $value['pdt_sku'] . ')" pdtSku="' . $value['pdt_sku'] . '" ><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>';
        }

        echo $htmlR;
    }
}

if (isset($_POST['btnEliminarProducto'])) {
    $eliminarProducto = new ProductosAjax();
    $eliminarProducto->pdt_sku = $_POST['pdt_sku'];
    $eliminarProducto->ajaxEliminarProducto();
}

if (isset($_POST['btnFiltroProducto'])) {
    $buscarProducto = new ProductosAjax();
    $buscarProducto->pdt_filtro = $_POST['pdt_filtro'];
    $buscarProducto->ajaxBuscarProductos();
}

if (isset($_POST['btnAgregarCarrito'])) {
    $buscarProducto = new ProductosAjax();
    $buscarProducto->pdt_sku = $_POST['pdt_sku'];
    $buscarProducto->ajaxAgregarProductosCarrito();
}

if (isset($_POST['btnQuitarCarrito'])) {
    $buscarProducto = new ProductosAjax();
    $buscarProducto->pdt_sku = $_POST['pdt_sku'];
    $buscarProducto->ajaxQuitarProductosCarrito();
}
