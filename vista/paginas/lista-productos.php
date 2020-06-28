<div class="row">
    <div class="col-12">
        <a class="btn btn-dark mb-4 float-right" href="nuevo-producto">Agregar nuevo</a>
    </div>

    <div class="col-12">
        <table class="table table-light tablas table-bordered table-striped dt-responsive">
            <thead class="thead-light">
                <tr>
                    <th>SKU</th>
                    <th>ESTANTE</th>
                    <th>VENDEDOR</th>
                    <th>DESCRIPCION</th>
                    <th>CATEGORIA</th>
                    <th>CANTIDAD</th>
                    <th>UM</th>
                    <th>COSTO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $productos = ProductosModelos::mdlConsultarProductos();
                foreach ($productos as $key => $pdt) :
                ?>
                    <tr>
                        <td><?php echo $pdt['pdt_sku'] ?></td>
                        <td><?php echo $pdt['pdt_estante'] ?></td>
                        <td><?php echo $pdt['pdt_vendedor'] ?></td>
                        <td><?php echo $pdt['pdt_descripcion'] ?></td>
                        <td><?php echo $pdt['pdt_categoria'] ?></td>
                        <td><?php echo $pdt['pdt_cantidad'] ?></td>
                        <td><?php echo $pdt['pdt_um'] ?></td>
                        <td><?php echo $pdt['pdt_costo'] ?></td>
                        <td>Botones</td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>SKU</th>
                    <th>ESTANTE</th>
                    <th>VENDEDOR</th>
                    <th>DESCRIPCION</th>
                    <th>CATEGORIA</th>
                    <th>CANTIDAD</th>
                    <th>UM</th>
                    <th>COSTO</th>
                    <th>ACCIONES</th>

                </tr>
            </tfoot>
        </table>
    </div>
</div>