<?php
session_start();
require_once '../modelo/usuarios.modelo.php';
require_once '../controlador/usuarios.controlador.php';
class UsuariosAjax
{
    public $usr_id;

    public function borrarUsuariosAjax()
    {
        $respuesta = UsuariosControlador::ctrEliminarUsuario($this->usr_id);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['btnBorrarUsuario'])) {
    $borrarUsuario = new UsuariosAjax();
    $borrarUsuario->usr_id = $_POST['usr_id'];
    $borrarUsuario->borrarUsuariosAjax();
}
