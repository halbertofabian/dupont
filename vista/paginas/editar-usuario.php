<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Dupont</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
    </ol>
</nav>



<?php

$rutas = $_GET['ruta'];

$rutas = explode("/", $rutas);

$usr = UsuariosModelo::mdlConsultarUsuarioID($rutas[1]);



?>

<form id="formTblUsuarioUsr" method="post">

    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="usr_id">Identificador de usuario</label>
                <input id="usr_id" class="form-control" type="text" readonly name="usr_id" value="<?php echo $usr['usr_id'] ?>" required>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="form-group">
                <label for="usr_nombre">Nombre completo</label>
                <input id="usr_nombre" class="form-control" type="text" name="usr_nombre" value="<?php echo $usr['usr_nombre'] ?>" required>
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label for="usr_tel">Teléfono</label>
                <input id="usr_tel" class="form-control" type="text" value="<?php echo $usr['usr_tel'] ?>" name="usr_tel">
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label for="usr_correo">Correo electrónico</label>
                <input id="usr_correo" class="form-control" type="text" value="<?php echo $usr['usr_correo'] ?>" name="usr_correo">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="usr_clave">Contraseña</label>
                <input id="usr_clave" class="form-control" type="password" placeholder="Dejar en blanco en caso de no querer cambiar la contraseña" name="usr_clave">
            </div>
        </div>
        <!-- <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="usr_perfil">Rol de acceso</label>
                <select name="usr_perfil" id="usr_perfil" class="form-control">
                    <option value="<?php echo $usr['usr_perfil'] ?>"></option>
                    <option value=""></option>
                </select>
            </div>
        </div> -->
        <input type="hidden" value="" name="usr_perfil" >
        <!-- <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="usr_img">Imagen de usuario</label>
                <input type="file" class="form-control" name="usr_img" id="usr_img">
            </div>
        </div> -->
        <div class="col-md-2 col-12">
            <div class="form-group">

                <button type="submit" class="btn btn-dark float-right mt-4" name="btnActualizarUsuario">Actualizar usuario</button>
            </div>
        </div>
    </div>

    <?php
        $actualizarUsuario = new UsuariosControlador();
        $actualizarUsuario->ctractualizarUsuarios();
    ?>
</form>