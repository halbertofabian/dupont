<?php
class ProductosControlador
{
    public static function ctrAgregarProductos()
    {
        if (isset($_POST['btnAgregarProducto'])) {
            //echo '<pre>', print_r($_POST), '</pre>';

            // Validaciones 



            // 

            $nuevoProducto = ProductosModelos::mdlAgregarProducto(array(
                'pdt_sku' => $_POST['nuevo_sku_producto'],
                'pdt_estante' => $_POST['nuevo_estante_producto'],
                'pdt_vendedor' => $_POST['nuevo_vendedor_producto'],
                'pdt_descripcion' => $_POST['nuevo_descripcion_producto'],
                'pdt_categoria' => $_POST['nuevo_categoria_producto'],
                'pdt_cantidad' => $_POST['nuevo_cantidad_producto'],
                'pdt_um' => $_POST['nuevo_um_producto'],
                'pdt_costo' => $_POST['nuevo_costo_producto'],

            ));

            //var_dump($nuevoProducto);
            if ($nuevoProducto) {

                echo '<script>
                swal({
                    title: "¡Muy bien!",
                    text: "Producto registrado con éxito",
                    icon: "success",
                    buttons: [false,"Continuar"],
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      window.location.href = "nuevo-producto"
                    }
                  });
                </script>';
            } else {
                echo '<div class="alert alert-primary">No se pudo registrar el producto, recargue e intente de nuevo</div>';
            }
        }
    }

    public static function ctrEditarProductos()
    {
        if (isset($_POST['btnEditarProducto'])) {
            //echo '<pre>', print_r($_POST), '</pre>';

            // Validaciones 



            // 

            $nuevoProducto = ProductosModelos::mdlEditarProducto(array(
                'pdt_sku' => $_POST['editar_sku_producto'],
                'pdt_estante' => $_POST['editar_estante_producto'],
                'pdt_vendedor' => $_POST['editar_vendedor_producto'],
                'pdt_descripcion' => $_POST['editar_descripcion_producto'],
                'pdt_categoria' => $_POST['editar_categoria_producto'],
                'pdt_cantidad' => $_POST['editar_cantidad_producto'],
                'pdt_um' => $_POST['editar_um_producto'],
                'pdt_costo' => $_POST['editar_costo_producto'],
                'pdt_id' => $_POST['editar_id_producto'],


            ));

            //var_dump($nuevoProducto);
            if ($nuevoProducto) {

                $url = AppControlador::ctrRutaApp();

                echo '<script>
                swal({
                    title: "¡Muy bien!",
                    text: "Producto actualizado con éxito",
                    icon: "success",
                    buttons: [false,"Continuar"],
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      window.location.href = "' . $url . 'lista-productos"
                    }
                  });
                </script>';
            } else {
                // echo '<div class="alert alert-primary">No se pudo actualizar el producto, recargue e intente de nuevo</div>';
            }
        }
    }

    public static function ctrEliminarProducto()
    {

        if (isset($_POST['btnEliminarProducto'])) {

            $eliminarProducto = ProductosModelos::mdlEliminarProducto($_POST['pdt_sku']);

            // var_dump($eliminarProducto);
            if ($eliminarProducto) {
                return array(
                    'status' => 1,
                    'mensaje' => 'Producto eliminado con éxito',
                    'direccion' => 'window.location.href="lista-productos"'
                );
            } else {
                return array(
                    'status' => 0,
                    'mensaje' => 'No fue posible eliminar el producto, intente de nuevo',
                    'direccion' => 'window.history.back();'
                );
            }
        }
    }
}
