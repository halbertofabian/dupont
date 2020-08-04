<?php
class UsuariosControlador
{
  public static function ctrAgregarUsuarios()
  {
    if (isset($_POST['btnAgregarUsuario'])) {

      // Encriptar contraseña
      $_POST['usr_clave'] = password_hash($_POST['usr_clave'], PASSWORD_DEFAULT);

      $guardarUsuario = UsuariosModelo::mdlAgregarUsuarios($_POST);

      if ($guardarUsuario) {
        $url = AppControlador::ctrRutaApp();

        echo '<script>
                swal({
                    title: "¡Muy bien!",
                    text: "Usuario registrado con éxito",
                    icon: "success",
                    buttons: [false,"Continuar"],
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      window.location.href = "' . $url . 'lista-usuarios"
                    }
                  });
                </script>';
      } else {
      }
    }
  }

  public static function ctrActualizarUsuarios()
  { 
    if (isset($_POST['btnActualizarUsuario'])) {



      // Encriptar contraseña
      if ($_POST['usr_clave'] == "") {
        $usuario = UsuariosModelo::mdlConsultarUsuarioID($_POST['usr_id']);
        $_POST['usr_clave'] = $usuario['usr_clave'];
      } else {
        $_POST['usr_clave'] = password_hash($_POST['usr_clave'], PASSWORD_DEFAULT);
      }


      $actualizarUsuario = UsuariosModelo::mdlActualizarUsuarios($_POST);
      $url = AppControlador::ctrRutaApp();

      if ($actualizarUsuario) {


        echo '<script>
                swal({
                    title: "¡Muy bien!",
                    text: "Usuario actualizado con éxito",
                    icon: "success",
                    buttons: [false,"Continuar"],
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      window.location.href = "' . $url . 'lista-usuarios"
                    }
                  });
                </script>';
      } else {
        echo

          '
              <script>
                  window.location.href = "' . $url . 'lista-usuarios"
              </script>
            
            ';
      }
    }
  }


  public static function ctrAccederSistema()
  {
    if (isset($_POST['btnAccederSistema'])) {

      $usr = UsuariosModelo::mdlConsultarUsuarioID($_POST['usr_id']);

      if (!$usr  || !password_verify($_POST['usr_clave'], $usr['usr_clave'])) {
        echo
          '<br>
            <div class=" mt-4 alert alert-primary text-center" role="alert">
                Usuario o contraseña incorrecto, intenta de nuevo
            </div>
          ';
        return;
      }

      $_SESSION['session'] = true;
      $_SESSION['session_usr'] = $usr;

      echo
        '
            <script>
                window.location.href = "./inicio";
            </script>';
    }
  }


  


  public static function ctrEliminarUsuario()
    {

        if (isset($_POST['btnBorrarUsuario'])) {

            $eliminarUsuario = UsuariosModelo::mdlEliminarUsuario($_POST['usr_id']);


            if ($eliminarUsuario) {
                return array(
                    'status' => 1,
                    'mensaje' => 'Usuario eliminado con éxito',
                    'direccion' => 'window.location.href="lista-usuarios"'
                );
            } else {
                return array(
                    'status' => 0,
                    'mensaje' => 'No fue posible eliminar el usuario, intente de nuevo',
                    'direccion' => 'window.history.back();'
                );
            }
        }
    }
}
