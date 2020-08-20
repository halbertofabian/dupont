<?php

$rutas = explode("/", $_GET['ruta']);

//var_dump($rutas);

$pedido = PedidosModelo::mdlConsultarPedidoId($rutas[1]);

$detalle = PedidosModelo::mdlConsultarPedidoDetalle($pedido['pdo_id']);


?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo $url ?>">Dupont</a></li>
        <li class="breadcrumb-item active" aria-current="page">Salida número <strong><?php echo $rutas[1] ?></strong></li>
    </ol>
</nav>

<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>Nombre del solicitante</th>
            <th>Fecha</th>
            <th>Número de salida</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <td><strong><?php echo $pedido['pdo_usuario'] ?></strong></td>
            <td><strong><?php echo $pedido['pdo_fecha'] ?></strong></td>
            <td>
                <strong></strong>
                <a href="<?php echo $url . 'lib/tcpdf/pdf/pedidos.php?pdo_numero=' . $pedido['pdo_numero'] ?>" target="_blank" class="btn btn-dark">
                    <?php echo $pedido['pdo_numero'] ?>
                    <i class="fa fa-file-pdf-o"></i>
                </a>
                <a href="<?php echo $url . 'lib/tcpdf/pdf/etiqueta-pedido.php?pdo_numero=' . $pedido['pdo_numero'] ?>" target="_blank" class="btn btn-light"><i class="fa fa-qrcode"></i></a>
                <form method="post">
                    <div class="form-group">
                        <label for="actu_pdo_estado">Estado</label>
                        <select name="pdo_estado" id="actu_pdo_estado" pdo_numero="<?php echo $pedido['pdo_numero'] ?>" class="form-control">
                            <option value="<?php echo $pedido['pdo_estado'] ?>"><?php echo $pedido['pdo_estado'] ?></option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Autorizado">Autorizado</option>
                            <!-- <option value="Rechazado">Rechazado</option> -->
                            <option value="Entregado">Entregado</option>
                        </select>
                    </div>
                </form>

            </td>

        </tr>

    </tbody>
</table>


<table class="table table-light">
    <thead>
        <tr>
            <th>SKU</th>
            <th>Descripción</th>
            <th>Piezas</th>
            <th>Costo unit.</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detalle as $key => $value) : ?>
            <tr>
                <td><?php echo $value['pdt_sku'] ?></td>
                <td><?php echo str_replace('"', '', $value['pdt_descripcion']) ?></td>
                <td><?php echo $value['dpdo_cantidad'] ?></td>
                <td><?php echo $value['dpdo_precio'] ?></td>
                <td><?php echo $value['dpdo_total'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>
<strong class="float-right mb-5" style="font-size: 26px;">Total: $ <?php echo number_format($pedido['pdo_total'], 2) ?> </strong>