<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Dupont</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nueva salida</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                Productos
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form id="formScanProducto">
                            <div class="form-group">

                                <input id="inputScanProducto" autofocus class="form-control" style="border: none; border-bottom: 2px solid #000;" placeholder="Escanee o dígite el producto" type="text" name="inputScanProducto">
                            </div>
                        </form>
                    </div>


                    <div class="col-12 d-none d-md-block" style="overflow: scroll; height: 700px;">
                        <div class="row" id="card-productos">

                        </div>
                    </div>



                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    Datos de la salida
                </div>

                <div class="card-body">
                    <h5 class="card-title">Nombre del solicitante</h5>
                    <div class="form-group">
                        <input id="pdo_usuario" class="form-control" type="text" name="pdo_usuario"  required>
                    </div>
                    <div class="form-group">
                        <label for="pdo_numero">Número de pedido</label>
                        <?php
                        $numeroP = PedidosControlador::ctrGenerarNumeroPedido();
                        ?>
                        <input id="pdo_numero" class="form-control" type="text" value="<?php echo $numeroP ?>" readonly>
                    </div>

                    <!-- <div class="row">



                        <div class="col-2">
                            <label class="text-center">SKU</label>
                        </div>
                        <div class="col-6">
                            <label class="text-center">Nombre</label>
                        </div>
                        <div class="col-2">
                            <label class="text-center">Número de piezas</label>
                        </div>
                        <div class="col-2">
                            <label class="text-center">Quitar</label>
                        </div>



                    </div> -->
                    <div class="row ">
                        <div class="col-12">
                            <table class="table table-light">
                                <thead class="thead-light with">
                                    <tr>
                                        <th width="20%">#SKU</th>
                                        <th width="50%">Descripción</th>
                                        <th width="10%">Piezas</th>
                                        <th width="10%">Quitar</th>
                                    </tr>
                                </thead>
                                <tbody id="card-productos-carrito">
                                    <?php if (empty($_SESSION['carrito'])) : ?>
                                        <tr>
                                            <td width="100%">

                                                <div class=" col-12 text-center alert alert-light" role="alert">
                                                    No hay productos agregados
                                                </div>

                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button class="float-right btn btn-dark" type="submit" name="btnAgregarPedido">Crear</button>
                </div>

            </div>
            <?php
            $agregarPedido = new  PedidosControlador();
            $agregarPedido->ctrAgregarPedido();
            ?>
        </form>
    </div>

</div>