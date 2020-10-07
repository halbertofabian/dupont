<?php
require_once 'conexion.modelo.php';
class UsuariosModelo
{
    public static function mdlAgregarUsuarios($usr)
    {
        try {
            $sql = "INSERT INTO tbl_usuario_usr (usr_id,usr_nombre,usr_tel,usr_correo,usr_clave,usr_perfil) VALUES(?,?,?,?,?,?)";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $usr['usr_id']);
            $pps->bindValue(2, $usr['usr_nombre']);
            $pps->bindValue(3, $usr['usr_tel']);
            $pps->bindValue(4, $usr['usr_correo']);
            $pps->bindValue(5, $usr['usr_clave']);
            $pps->bindValue(6, $usr['usr_perfil']);
            // $pps->bindValue(7, $usr['usr_img']);

            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            //throw $th;

        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarUsuarios()
    {
        try {
            $sql = "SELECT * FROM tbl_usuario_usr";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll();
        } catch (\PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlActualizarUsuarios($usr)
    {
        try {
            $sql = "UPDATE  tbl_usuario_usr SET usr_nombre = ?, usr_tel = ?, usr_correo = ?,usr_clave = ?,usr_perfil = ? WHERE usr_id = ?";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $usr['usr_nombre']);
            $pps->bindValue(2, $usr['usr_tel']);
            $pps->bindValue(3, $usr['usr_correo']);
            $pps->bindValue(4, $usr['usr_clave']);
            $pps->bindValue(5, $usr['usr_perfil']);

            $pps->bindValue(6, $usr['usr_id']);


            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            //throw $th;

        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlEliminarUsuario($usr_id)
    {
        try {
            $sql = "DELETE  FROM tbl_usuario_usr WHERE usr_id = ?";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarUsuarioID($usr_id)
    {
        try {
            $sql = "SELECT * FROM tbl_usuario_usr WHERE usr_id";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->execute();
            return $pps->fetch();
        } catch (\PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlAccederSistema($usr_acceso)
    {
        try {
            $sql = "SELECT * FROM tbl_usuario_usr WHERE usr_id = ? AND usr_clave = ?";
            $con = ConexionDupont::conectar();

            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_acceso['usr_id']);
            $pps->bindValue(2, $usr_acceso['usr_clave']);

            $pps->execute();
            return $pps->fetchAll();
        } catch (\PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
