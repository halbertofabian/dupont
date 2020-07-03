<?php

$rutas = $_GET['ruta'];

$rutas = explode("/", $rutas);

//var_dump($rutas);

if (isset($rutas[1])) :
    $pdt = ProductosModelos::mdlConsultarProducto($rutas[1]);
    // var_dump($pdt);
?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Dupont</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar producto</li>
        </ol>
    </nav>
    <form id="form_tbl_productos_pdt" method="post">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="editar_sku_producto">SKU</label>
                    <input id="editar_sku_producto" class="form-control" type="text" name="editar_sku_producto" value="<?php echo $pdt['pdt_sku'] ?>" required>
                    <input type="hidden" value="<?php echo $pdt['pdt_id'] ?>" name="editar_id_producto">

                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="editar_estante_producto">ID ESTANTE</label>
                    <?php
                    $estantes = EstantesModelo::mdlConsultarEstantes();

                    ?>
                    <select name="editar_estante_producto" id="editar_estante_producto" class="form-control" required>
                        <option value="<?php echo $pdt['pdt_estante'] ?>"><?php echo $pdt['pdt_estante'] ?></option>
                        <?php
                        foreach ($estantes as $key => $est) :
                        ?>
                            <option value="<?php echo $est['est_nombre'] ?>"><?php echo $est['est_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- <a href="#" class="btn btn-link text-danger float-right mt-1 mb-1">Agregar estante</a> -->
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="editar_vendedor_producto">VENDEDOR</label>
                    <?php
                    $vendedores = VendedoresModelo::mdlConsultarVendedores();

                    ?>
                    <select name="editar_vendedor_producto" class="form-control" id="editar_vendedor_producto" required>
                        <option value="<?php echo $pdt['pdt_vendedor'] ?>"><?php echo $pdt['pdt_vendedor'] ?></option>
                        <?php
                        foreach ($vendedores as $key => $vdr) :
                        ?>
                            <option value="<?php echo $vdr['vdr_nombre'] ?>"><?php echo $vdr['vdr_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- <a href="#" class="btn btn-link text-danger float-right mt-1 mb-1">Agregar Vendedor</a> -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="editar_descripcion_producto">DESCRIPCIÓN</label>
                    <input id="editar_descripcion_producto" class="form-control" type="text" name="editar_descripcion_producto" value="<?php echo $pdt['pdt_descripcion'] ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="editar_categoria_producto">CATEGORÍA</label>
                    <!-- <select name="" class="form-control" id="">
            </select> -->
                    <input type="text" class="form-control" name="editar_categoria_producto" id="editar_categoria_producto" value="<?php echo $pdt['pdt_categoria'] ?>">
                    <!-- <a href="#" class="btn btn-link text-danger float-right mt-1 mb-1">Agregar categoría</a> -->
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="editar_cantidad_producto">CANTIDAD</label>
                    <input id="editar_cantidad_producto" class="form-control" type="text" name="editar_cantidad_producto" value="<?php echo $pdt['pdt_cantidad'] ?>" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="editar_um_producto">UM</label>
                    <select name="editar_um_producto" class="form-control" id="editar_um_producto" required>
                        <option value="PIEZAS">PIEZAS</option>
                    </select>
                    <!-- <a href="#" class="btn btn-link text-danger float-right mt-1 mb-1">Agregar UM</a> -->
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="editar_costo_producto">COSTO</label>
                    <input id="editar_costo_producto" class="form-control" type="text" name="editar_costo_producto" value="<?php echo $pdt['pdt_costo'] ?>" required>
                </div>
            </div>


            <div class="col-12">
                <button class="btn btn-dark float-right" name="btnEditarProducto"> Actualizar producto </button>
            </div>

            <?php
            $editarProcuto = new ProductosControlador();
            $editarProcuto->ctrEditarProductos();
            ?>

        </div>
    </form>

<?php else :


    echo '<script>
        window.location.href = "' . $url . 'lista-productos";
    </script>';

endif; ?>