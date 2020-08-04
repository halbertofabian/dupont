<?php

// Requerir controladores

require_once 'controlador/app.controlador.php';
require_once 'controlador/productos.controlador.php';
require_once 'controlador/pedidos.controlador.php';
require_once 'controlador/usuarios.controlador.php';



// Requerir Modelos

require_once 'modelo/estantes.modelo.php';
require_once 'modelo/vendedores.modelo.php';
require_once 'modelo/productos.modelo.php';
require_once 'modelo/pedidos.modelo.php';
require_once 'modelo/usuarios.modelo.php';





$iniciarApp = new AppControlador();
$iniciarApp->ctrIniciarApp();
