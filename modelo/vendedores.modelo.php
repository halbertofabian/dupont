<?php
require_once 'conexion.modelo.php';


class VendedoresModelo
{
    public static function mdlConsultarVendedores()
    {
        try {

            $sql = "SELECT * FROM tbl_vendedor_vdr";
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
