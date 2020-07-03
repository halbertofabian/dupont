<?php

class ConexionDupont
{

    static public function conectar()
    {

        try {
            //code...
            $link = new PDO(
                "mysql:host=localhost;dbname=db_dupont",
                "root",
                ""
            );

            $link->exec("set names utf8");

            return $link;
        } catch (PDOException $th) {
            throw $th;
            return false;
        }
    }
}
