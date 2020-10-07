<div class="row">
    <div class="col-12">
        <a class="btn btn-dark mb-4 float-right" href="nuevo-producto">Agregar nuevo</a>
    </div>

    <?php $pedidos = PedidosModelo::mdlConsultarPedido(); ?>

    <div class="col-12">
        <?php var_dump($pedidos); ?>
        <table class="table tablaPedidos table-light tablas table-bordered table-striped dt-responsive">
            <thead class="thead-light">
                <tr>
                    <th>NÚMERO DE SALIDA</th>
                    <th>ACCIONES</th>
                    <th>FECHA DE PEDIDO</th>
                    <th>ESTADO</th>
                    <th>USUARIO</th>
                    <th>TOTAL</th>

                </tr>
            </thead>
            <tbody>
                <?php
                
                foreach ($pedidos as $key => $pdo) :
                ?>
                    <tr>
                        <td>
                            <a href="<?php echo $url . "pedido/" . $pdo['pdo_numero'] ?>" class="btn btn-success"> <i class="fa fa-opencart" aria-hidden="true"></i> <?php echo $pdo['pdo_numero'] ?> </a>



                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo $url . 'lib/tcpdf/pdf/pedidos.php?pdo_numero=' . $pdo['pdo_numero'] ?>" target="_blank" class="btn btn-dark"><i class="fa fa-file-pdf-o"></i></a>
                                <a href="<?php echo $url . 'lib/tcpdf/pdf/etiqueta-pedido.php?pdo_numero=' . $pdo['pdo_numero'] ?>" target="_blank" class="btn btn-light"><i class="fa fa-qrcode"></i></a>
                                <?php if ($pdo['pdo_estado'] != "Entregado") : ?>
                                    <button class="btn btn-primary btnEliminarPedido" pdo_numero="<?php echo $pdo['pdo_id'] ?>"><i class="fa fa-trash"></i></button>
                                <?php endif; ?>

                                <!-- <a href="<?php echo $url . 'editar-producto/' . $pdo['pdo_numero'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-primary btnEliminarProducto" idProducto="<?php echo $pdo['pdo_numero']  ?>"><i class="fa fa-trash"></i></button> -->
                            </div>
                        </td>
                        <td><?php echo $pdo['pdo_fecha'] ?></td>
                        <td><?php echo $pdo['pdo_estado'] ?></td>
                        <td><?php echo $pdo['pdo_usuario'] ?></td>
                        <td><?php echo $pdo['pdo_total'] ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>NÚMERO DE SALIDA</th>
                    <th>ACCIONES</th>
                    <th>FECHA DE PEDIDO</th>
                    <th>ESTADO</th>
                    <th>USUARIO</th>
                    <th>TOTAL</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>