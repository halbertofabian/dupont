<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Dupont</a></li>
        <li class="breadcrumb-item active" aria-current="page">Administración de usuarios</li>
    </ol>
</nav>
<div class="row">
    <div class="col-12">
        <a href="<?php echo $url ?>nuevo-usuario" class="btn btn-dark  mb-4 float-right "><i class="fa fa-plus"></i> Crear nuevo usuario</a>
    </div>
    <?php
    $usuarios = UsuariosModelo::mdlConsultarUsuarios();
    ?>
    <div class="col-12">
        <table class="tablaUsuarios table table-light tablas table-bordered table-striped dt-responsive">
            <thead class="thead-light">
                <tr>
                    <th>#Número de empleado</th>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo electrónico</th>
                    <!-- <th>Perfil</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $key => $usr) : ?>
                    <tr>
                        <td><?php echo $usr['usr_id'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo $url . 'editar-usuario/' . $usr['usr_id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-primary btnEliminarUsuario" idUsuario="<?php echo $usr['usr_id']  ?>"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                        <td><?php echo $usr['usr_nombre'] ?></td>
                        <td><?php echo $usr['usr_tel'] ?></td>
                        <td><?php echo $usr['usr_correo'] ?></td>
                        <!-- <td><?php echo $usr['usr_perfil'] ?></td> -->

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#Número de empleado</th>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo electrónico</th>
                    <!-- <th>Perfil</th> -->

                </tr>
            </tfoot>
        </table>
    </div>
</div>