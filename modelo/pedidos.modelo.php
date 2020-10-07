<?php
require_once 'conexion.modelo.php';
class PedidosModelo
{
    public static function mdlAgregarPedido($pdo)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_pedido_pdo (pdo_numero, pdo_fecha, pdo_usuario, pdo_total) VALUES(?,?,?,?)";

            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $pdo['pdo_numero']);
            $pps->bindValue(2, $pdo['pdo_fecha']);
            $pps->bindValue(3, $pdo['pdo_usuario']);
            $pps->bindValue(4, $pdo['pdo_total']);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            //throw $th;
            return null;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlAgregarDetallePedido($pdo)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_detalle_dpdo (dpdo_pedido, dpdo_producto, dpdo_precio, dpdo_cantidad, dpdo_total) VALUES(?,?,?,?,?)";

            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $pdo['dpdo_pedido']);
            $pps->bindValue(2, $pdo['dpdo_producto']);
            $pps->bindValue(3, $pdo['dpdo_precio']);
            $pps->bindValue(4, $pdo['dpdo_cantidad']);
            $pps->bindValue(5, $pdo['dpdo_total']);


            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            //throw $th;
            return null;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarPedido()
    {
        try {

            $sql = "SELECT * FROM tbl_pedido_pdo";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;

        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarPedidoFecha()
    {
        try {

            $sql = "SELECT * FROM tbl_pedido_pdo ORDER BY tbl_pedido_pdo.pdo_fecha DESC ";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;

        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarPedidoDetalle($id_pedido)
    {
        try {

            $sql = "SELECT d.*, p.* FROM tbl_detalle_dpdo d JOIN tbl_producto_pdt p ON d.dpdo_producto = p.pdt_id WHERE d.dpdo_pedido = ?";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $id_pedido);

            $pps->execute();

            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;

        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarPedidoId($id_pedido)
    {
        try {

            $sql = "SELECT * FROM tbl_pedido_pdo WHERE pdo_numero = ?";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $id_pedido);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            $con = null;
            $pps = null;
        }
    }


    public static function mdlConsultarPedidosPendientes()
    {
        try {

            $sql = "SELECT  COUNT(pdo_id) AS pdo_pendientes FROM tbl_pedido_pdo WHERE pdo_estado != 'Entregado'";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;

        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarTotalPedidosPendientes()
    {
        try {

            $sql = "SELECT SUM(tbl_pedido_pdo.pdo_total) as pdo_total_pendientes FROM `tbl_pedido_pdo` WHERE tbl_pedido_pdo.pdo_estado != 'Entregado' ";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;

        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlConsultarPedidoDetallePendientes()
    {
        try {

            $sql = "SELECT d.*, p.*, pd.* FROM tbl_detalle_dpdo d JOIN tbl_producto_pdt p ON d.dpdo_producto = p.pdt_id JOIN tbl_pedido_pdo pd ON d.dpdo_pedido = pd.pdo_id WHERE pd.pdo_estado != 'Entregado'";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();

            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;

        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlCambiarEstadoPedido($pdo_numero, $pdo_estado)
    {
        try {

            $sql = "UPDATE tbl_pedido_pdo SET pdo_estado = ? WHERE pdo_numero = ?";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pdo_estado);
            $pps->bindValue(2, $pdo_numero);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            $con = null;
            $pps = null;
        }
    }

    public static function mdlEliminarPedido($id_pedido)
    {
        try {

            $sql = "DELETE  FROM tbl_pedido_pdo WHERE pdo_id = ?";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $id_pedido);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;

        } finally {
            $con = null;
            $pps = null;
        }
    }
}
