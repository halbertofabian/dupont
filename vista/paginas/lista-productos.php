<div class="row">
    <div class="col-12">
        <button type="button" class="btn btn-success btnImportarProductos">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
            Importar productos
        </button>
        <a class="btn btn-dark mb-4 float-right" href="nuevo-producto">Agregar nuevo</a>
    </div>


    <?php

    $productos = ProductosModelos::mdlConsultarProductos();
    //var_dump($productos);
    ?>

    <?php if (sizeof($productos) > 0) : ?>

        <div class="col-12">



            <table class="table tablaProductos table-light tablas table-bordered table-striped dt-responsive">
                <thead class="thead-light">
                    <tr>
                        <th>SKU</th>
                        <th>ACCIONES</th>
                        <th>ESTANTE</th>
                        <th>VENDEDOR</th>
                        <th>DESCRIPCION</th>
                        <!-- <th>CATEGORIA</th> -->
                        <th>CANTIDAD</th>
                        <th>UM</th>
                        <th>COSTO</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($productos as $key => $pdt) :
                    ?>
                        <tr>

                            <td><?php echo $pdt['pdt_sku'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo $url . 'lib/tcpdf/pdf/etiquetaQR.php?pdt_sku=' . $pdt['pdt_sku'] ?>" target="_blank" class="btn btn-dark"><i class="fa fa-qrcode"></i></a>
                                    <a href="<?php echo $url . 'editar-producto/' . $pdt['pdt_sku'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-primary btnEliminarProducto" idProducto="<?php echo $pdt['pdt_sku']  ?>"><i class="fa fa-trash"></i></button>

                                </div>

                            </td>
                            <td><?php echo $pdt['pdt_estante'] ?></td>
                            <td><?php echo $pdt['pdt_vendedor'] ?></td>
                            <td><?php echo str_replace('"', '', $pdt['pdt_descripcion']) ?></td>
                            <!-- <td><?php //echo $pdt['pdt_categoria'] 
                                        ?></td> -->
                            <td><?php echo $pdt['pdt_cantidad'] ?></td>
                            <td><?php echo $pdt['pdt_um'] ?></td>
                            <td><?php echo $pdt['pdt_costo'] ?></td>
                            <!-- <td>
                             <button class="btn btn-dark" ><i class="fa fa-eye"></i></button> 
                            
                        </td> -->
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>SKU</th>
                        <th>ACCIONES</th>
                        <th>ESTANTE</th>
                        <th>VENDEDOR</th>
                        <th>DESCRIPCION</th>
                        <!-- <th>CATEGORIA</th> -->
                        <th>CANTIDAD</th>
                        <th>UM</th>
                        <th>COSTO</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php else : /* echo "<pre>", print_r($_SERVER), "</pre>";*/  ?>
        <div class="col-12">
            <div class="card">


                <div class="card-body">
                    <h4 class="card-title">Exporta tu lista de productos</h4>
                    <p class="card-text">Instrucciones</p>
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <ol>
                                <li>
                                    Descarga el archivo de ejemplo
                                    <a href="<?php echo $url . 'exportxlsx/tbl_productos_dupont_ejemplo.xls' ?>" class="btn btn-link">Descargar ejemplo</a>
                                </li>
                                <li>Llena tu Excel siguiendo el ejemplo</li>
                                <li>Guardalo con el nombre <strong class="text-primary">tbl_productos_dupont.xls</strong> </li>
                                <li>Guardalo en el siguiente directorio: <?php echo $_SERVER['DOCUMENT_ROOT'] . '/dupont/exportxlsx' ?> </li>
                                <li>Una vez realizado estos pasos, da click en el botón Importar productos</li>

                                <?php

                                // echo "<pre>", print_r($_SERVER), "</pre>";


                                ?>
                            </ol>
                        </div>
                        <div class="col-md-4 col-12">
                            <button type="button" class="btn btn-success btnImportarProductos">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                Importar productos
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php endif; ?>
</div>