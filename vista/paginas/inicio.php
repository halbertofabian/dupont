<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">

            </div>
            <div class="ml-3 mr-3">
                <div class="bg-white p-3 mini-stats-desc rounded">
                    <h5 class=" mt-0">
                        <?php
                        $pdo_pendientes = PedidosModelo::mdlConsultarPedidosPendientes();
                        echo "<strong class='text-primary'>$pdo_pendientes[pdo_pendientes]</strong>";

                        ?>

                    </h5>
                    <h6 class="mt-0 mb-3">Pedidos pendientes</h6>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">

            </div>
            <div class="ml-3 mr-3">
                <div class="bg-white p-3 mini-stats-desc rounded">
                    <h5 class=" mt-0">
                        <?php
                        $pdo_total_pendientes = PedidosModelo::mdlConsultarTotalPedidosPendientes();

                        $pdo_total_pendientes =  number_format($pdo_total_pendientes['pdo_total_pendientes'],2);
                        echo "<strong class='text-primary'>$ $pdo_total_pendientes</strong>";

                        ?>
                    </h5>
                   
                    <a href="<?php echo $url ?>lib/tcpdf/pdf/reporte-pedidos.php" target="_blank" class="btn btn-dark mb-4 ">Monto total pedidos <i class="fa fa-file-pdf-o"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">

            </div>
            <div class="ml-3 mr-3">
                <div class="bg-white p-3 mini-stats-desc rounded">
                    <h5 class=" mt-0">
                        <?php
                        $pdt_cantidades = ProductosModelos::mdlConsultarSumProductos();

                        $pdt_cantidades =  number_format($pdt_cantidades['pdt_cantidades']);
                        echo "<strong class='text-primary'>$pdt_cantidades</strong>";

                        ?>
                    </h5>
                    <h6 class="mt-0 mb-3">Total de productos</h6>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stats">
            <div class="p-3 mini-stats-content">

            </div>
            <div class="ml-3 mr-3">
                <div class="bg-white p-3 mini-stats-desc rounded">
                    <h5 class=" mt-0">
                        <?php
                        $productos = ProductosModelos::mdlConsultarTotalInv();

                        $total = 0;

                        foreach ($productos as $key => $value) {
                            $total += $value['pdt_cantidad'] * $value['pdt_costo'];
                        }

                        $total = number_format($total, 2);
                        echo "<strong class='text-primary'> $  $total</strong>";

                        ?>
                    </h5>
                    
                    <a href="<?php echo $url ?>lib/tcpdf/pdf/reporte-inventario.php" target="_blank" class="btn btn-dark mb-4 ">Monto total inventario <i class="fa fa-file-pdf-o"></i></a>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- end row -->

<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Ultimos (5)</h4>
                <div class="table-responsive">
                    <table class="table tablaPedidos tablas table-light  table-bordered table-striped">
                        <thead class="thead-light text-center">
                            <tr>
                                <th>NÚMERO DE PEDIDO</th>
                                <th>USUARIO</th>
                                <th>FECHA DE PEDIDO</th>
                                <th>ESTADO</th>
                                <th>TOTAL</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $pedidos = PedidosModelo::mdlConsultarPedidoFecha();
                            foreach ($pedidos as $key => $pdo) :
                            ?>
                                <tr>
                                    <td>
                                        <strong>

                                            <a href="<?php echo $url . 'lib/tcpdf/pdf/pedidos.php?pdo_numero=' . $pdo['pdo_numero'] ?>" target="_blank" class="btn btn-dark"><i class="fa fa-file-pdf-o"></i>
                                                <?php echo $pdo['pdo_numero'] ?>
                                            </a>
                                        </strong>

                                    </td>
                                    <td>
                                        <!-- <img src="<?php echo $url ?>vista/assets/images/users/avatar-2.jpg" alt="" class="thumb-sm rounded-circle mr-2"> -->
                                        <?php echo $pdo['pdo_usuario'] ?>
                                    </td>

                                    <td><?php echo $pdo['pdo_fecha'] ?></td>
                                    <td><?php echo $pdo['pdo_estado'] ?></td>

                                    <td>$ <?php echo number_format($pdo['pdo_total'],2) ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NÚMERO DE PEDIDO</th>
                                <th>USUARIO</th>
                                <th>FECHA DE PEDIDO</th>
                                <th>ESTADO</th>
                                <th>TOTAL</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>