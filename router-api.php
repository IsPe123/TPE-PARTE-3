<?php
    require_once 'libs/Router.php';
    require_once 'app/api/APIProductosController.php';

    $router = new Router();

    $router->addRoute('productos', 'GET', 'APIProductosController', 'getProductos');
    /*$router->addRoute('tareas/:ID', 'GET', 'ApiTaskController', 'get');
    $router->addRoute('tareas/:ID', 'DELETE', 'ApiTaskController', 'delete');

    $router->addRoute('tareas', 'POST', 'ApiTaskController', 'add');
    $router->addRoute('tareas/:ID', 'PUT', 'ApiTaskController', 'update');
    */
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>