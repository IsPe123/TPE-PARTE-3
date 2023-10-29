<?php
    require_once 'libs/Router.php';
    require_once 'app/api/APIProductosController.php';

    $router = new Router();

    $router->addRoute('productos', 'GET', 'APIProductosController', 'getProductos');
    $router->addRoute('productos/:ID', 'GET', 'APIProductosController', 'getProducto');

    $router->addRoute('productos', 'POST', 'APIProductosController', 'addProducto');
    $router->addRoute('productos/:ID', 'PUT', 'APIProductosController', 'updateProducto');

    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>