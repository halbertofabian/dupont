<?php

require_once 'conexion.modelo.php';
class ProductosModelos
{
    public static function mdlAgregarProducto($pdt)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_producto_pdt (pdt_id,pdt_sku,pdt_estante,pdt_vendedor,pdt_descripcion,pdt_categoria,pdt_cantidad,pdt_um,pdt_costo)  VALUES(NULL,?,?,?,?,?,?,?,?)";

            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pdt['pdt_sku']);
            $pps->bindValue(2, $pdt['pdt_estante']);
            $pps->bindValue(3, $pdt['pdt_vendedor']);
            $pps->bindValue(4, $pdt['pdt_descripcion']);
            $pps->bindValue(5, $pdt['pdt_categoria']);
            $pps->bindValue(6, $pdt['pdt_cantidad']);
            $pps->bindValue(7, $pdt['pdt_um']);
            $pps->bindValue(8, $pdt['pdt_costo']);

            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarProductos()
    {
        try {

            $sql = "SELECT * FROM tbl_producto_pdt";
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

    public static function mdlConsultarProducto($pdt_sku)
    {
        try {

            $sql = "SELECT * FROM tbl_producto_pdt WHERE pdt_sku = ?";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pdt_sku);
            $pps->execute();
            return $pps->fetch();
        } catch (\PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarProductoStok($pdt_id)
    {
        try {

            $sql = "SELECT * FROM tbl_producto_pdt WHERE pdt_id = ?";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pdt_id);
            $pps->execute();
            return $pps->fetch();
        } catch (\PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlEliminarProducto($pdt)
    {
        try {
            $sql = "DELETE FROM tbl_producto_pdt WHERE pdt_sku = ?";
            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pdt);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlEditarProducto($pdt)
    {
        try {
            //code...
            $sql = "UPDATE  tbl_producto_pdt SET pdt_sku = ?, pdt_estante = ?, pdt_vendedor = ?, pdt_descripcion = ?, pdt_categoria = ?, pdt_cantidad = ?, pdt_um = ?, pdt_costo = ? WHERE pdt_id = ? ";

            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pdt['pdt_sku']);
            $pps->bindValue(2, $pdt['pdt_estante']);
            $pps->bindValue(3, $pdt['pdt_vendedor']);
            $pps->bindValue(4, $pdt['pdt_descripcion']);
            $pps->bindValue(5, $pdt['pdt_categoria']);
            $pps->bindValue(6, $pdt['pdt_cantidad']);
            $pps->bindValue(7, $pdt['pdt_um']);
            $pps->bindValue(8, $pdt['pdt_costo']);
            $pps->bindValue(9, $pdt['pdt_id']);

            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlEditarProductoSku($pdt)
    {
        try {
            //code...
            $sql = "UPDATE  tbl_producto_pdt SET pdt_sku = ?, pdt_estante = ?, pdt_vendedor = ?, pdt_descripcion = ?, pdt_categoria = ?, pdt_cantidad = ?, pdt_um = ?, pdt_costo = ? WHERE pdt_sku = ? ";

            $con = ConexionDupont::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pdt['pdt_sku']);
            $pps->bindValue(2, $pdt['pdt_estante']);
            $pps->bindValue(3, $pdt['pdt_vendedor']);
            $pps->bindValue(4, $pdt['pdt_descripcion']);
            $pps->bindValue(5, $pdt['pdt_categoria']);
            $pps->bindValue(6, $pdt['pdt_cantidad']);
            $pps->bindValue(7, $pdt['pdt_um']);
            $pps->bindValue(8, $pdt['pdt_costo']);
            $pps->bindValue(9, $pdt['pdt_sku']);

            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlFitrarProductos($pdt_filtro)
    {
        try {

            if ($pdt_filtro == "") {
                $sql = "SELECT * FROM tbl_producto_pdt ";
            } elseif ($pdt_filtro != "") {
                $sql = "SELECT * FROM tbl_producto_pdt WHERE pdt_sku LIKE '%$pdt_filtro%' OR pdt_descripcion LIKE '%$pdt_filtro%' ";
            }

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

    public static function mdlActualizarStok($pdt_sku, $pdt_cantidad)
    {
        try {
            //code...
            $sql = "UPDATE tbl_producto_pdt SET pdt_cantidad = ? WHERE pdt_sku = ? ";
            $con = ConexionDupont::conectar();

            $pps = $con->prepare($sql);
            $pps->bindValue(1, $pdt_cantidad);
            $pps->bindValue(2, $pdt_sku);

            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlConsultarSumProductos()
    {
        try {

            $sql = "SELECT SUM(pdt_cantidad) as pdt_cantidades FROM tbl_producto_pdt";
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

    public static function mdlConsultarTotalInv()
    {
        try {

            $sql = "SELECT * FROM tbl_producto_pdt WHERE pdt_cantidad > 0";
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
