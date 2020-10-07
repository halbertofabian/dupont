<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Dupont</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nuevo usuario</li>
    </ol>
</nav>
<form id="formTblUsuarioUsr" method="post">

    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="usr_id">Identificador de usuario</label>
                <input id="usr_id" class="form-control" type="text" name="usr_id" required>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="form-group">
                <label for="usr_nombre">Nombre completo</label>
                <input id="usr_nombre" class="form-control" type="text" name="usr_nombre" required>
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label for="usr_tel">Teléfono</label>
                <input id="usr_tel" class="form-control" type="text" name="usr_tel">
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label for="usr_correo">Correo electrónico</label>
                <input id="usr_correo" class="form-control" type="text" name="usr_correo">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="usr_clave">Contraseña</label>
                <input id="usr_clave" class="form-control" type="password" name="usr_clave" required>
            </div>
        </div>
        <!-- <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="usr_perfil">Rol de acceso</label>
                <select name="usr_perfil" id="usr_perfil" class="form-control">
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

                <button type="submit" class="btn btn-dark float-right mt-4" name="btnAgregarUsuario">Guardar usuario</button>
            </div>
        </div>
    </div>

    <?php
    $agregarUsuario = new UsuariosControlador();
    $agregarUsuario->ctrAgregarUsuarios();

    ?>
</form>