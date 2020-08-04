<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Dupont</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo producto</li>
    </ol>
</nav>
<form id="form_tbl_productos_pdt" method="post">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="nuevo_sku_producto">SKU</label>
                <input id="nuevo_sku_producto" class="form-control" type="text" name="nuevo_sku_producto" required>

            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="nuevo_estante_producto">ID ESTANTE</label>
                <?php
                $estantes = EstantesModelo::mdlConsultarEstantes();

                ?>
                <select name="nuevo_estante_producto" id="nuevo_estante_producto" class="form-control" required>
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
                <label for="nuevo_vendedor_producto">VENDEDOR</label>
                <?php
                $vendedores = VendedoresModelo::mdlConsultarVendedores();

                ?>
                <select name="nuevo_vendedor_producto" class="form-control" id="nuevo_vendedor_producto" required>
                    <?php
                    foreach ($vendedores as $key => $vdr) :
                    ?>
                        <option value="<?php echo $vdr['vdr_nombre'] ?>"><?php echo $vdr['vdr_nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- <a href="#" class="btn btn-link text-danger float-right mt-1 mb-1">Agregar Vendedor</a> -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="nuevo_descripcion_producto">DESCRIPCIÓN</label>
                <input id="nuevo_descripcion_producto" class="form-control" type="text" name="nuevo_descripcion_producto" required >
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <!-- <label for="nuevo_categoria_producto">CATEGORÍA</label> -->
                <!-- <select name="" class="form-control" id="">
            </select> -->
                <input type="hidden" class="form-control" name="nuevo_categoria_producto" value="" id="nuevo_categoria_producto">
                <!-- <a href="#" class="btn btn-link text-danger float-right mt-1 mb-1">Agregar categoría</a> -->
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="nuevo_cantidad_producto">CANTIDAD</label>
                <input id="nuevo_cantidad_producto" class="form-control" type="text" name="nuevo_cantidad_producto" required >
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="nuevo_um_producto">UM</label>
                <select name="nuevo_um_producto" class="form-control" id="nuevo_um_producto" required >
                    <option value="PIEZAS">PIEZAS</option>
                </select>
                <!-- <a href="#" class="btn btn-link text-danger float-right mt-1 mb-1">Agregar UM</a> -->
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="nuevo_costo_producto">COSTO</label>
                <input id="nuevo_costo_producto" class="form-control" type="text" name="nuevo_costo_producto" required >
            </div>
        </div>


        <div class="col-12">
            <button class="btn btn-dark float-right" name="btnAgregarProducto"> Guardar producto </button>
        </div>

        <?php
        $nuevoProcuto = new ProductosControlador();
        $nuevoProcuto->ctrAgregarProductos();
        ?>
        
    </div>
</form>