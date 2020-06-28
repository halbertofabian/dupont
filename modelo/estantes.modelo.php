<?php
require_once 'conexion.modelo.php';
class EstantesModelo
{

    public static function mdlConsultarEstantes()
    {
        try {

            $sql = "SELECT * FROM tbl_estante_est";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll();
        } catch (\PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
