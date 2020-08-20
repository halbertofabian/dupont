<?php

class AppControlador
{
    public function ctrIniciarApp()
    {
        $url = AppControlador::ctrRutaApp();
        include_once 'vista/app.php';
    }

    public static function ctrRutaApp()
    {
        return 'http://localhost/dupont/';
    }
}
