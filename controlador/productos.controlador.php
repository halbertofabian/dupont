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
}
