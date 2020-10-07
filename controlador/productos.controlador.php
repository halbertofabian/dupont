<?php
//require_once 'lib/PHPExcel/Classes/PHPExcel/IOFactory.php';
class ProductosControlador
{
    public static function ctrImportarProductosExcel()
    {
        try {


            $nombreArchivo = $_SERVER['DOCUMENT_ROOT'] . '/dupont/exportxlsx/tbl_productos_dupont.xls';

            $extension = explode(".", $nombreArchivo);

            if ($extension[1] != "xls") {
                return array(
                    'status' => false,
                    'mensaje' => "La extension no esta permitida asegurate de que sea '.xls'",
                    'insert' =>  "",
                    'update' => ""
                );
            }



            //var_dump($nombreArchivo);

            // Cargar hoja de calculo
            $objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);

            //var_dump($objPHPExcel);

            $objPHPExcel->setActiveSheetIndex(0);

            $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
            $countInsert = 0;
            $countUpdate = 0;
            //echo "NumRows => ",$objPHPExcel->getActiveSheet()->getCell('B' . 2)->getCalculatedValue();

            for ($i = 2; $i <= $numRows; $i++) {


                $pdt_sku = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                $pdt_estante = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                $pdt_vendedor = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                $pdt_descripcion = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                $pdt_categoria = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                $pdt_cantidad = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                $pdt_um = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                $pdt_costo = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();



                $data = array(
                    'pdt_sku' => $pdt_sku,
                    'pdt_estante' => $pdt_estante,
                    'pdt_vendedor' => $pdt_vendedor,
                    'pdt_descripcion' => $pdt_descripcion,
                    'pdt_categoria' => $pdt_categoria,
                    'pdt_cantidad' => $pdt_cantidad,
                    'pdt_um' => $pdt_um,
                    'pdt_costo' => $pdt_costo,

                );

                //var_dump($data);

                if (ProductosModelos::mdlAgregarProducto($data)) {
                    $countInsert += 1;
                } else {
                    if (ProductosModelos::mdlEditarProductoSku($data)) {
                        $countUpdate += 1;
                    }
                }
            }

            return array(
                'status' => true,
                'mensaje' => "Carga de productos exitosa",
                'insert' =>  $countInsert,
                'update' => $countUpdate
            );
        } catch (Exception $th) {
            $th->getMessage();
            return array(
                'status' => false,
                'mensaje' => "No se encuentra el archivo solicitado, por favor carga el archivo correcto",
                'insert' =>  "",
                'update' => ""
            );
        }
    }
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
