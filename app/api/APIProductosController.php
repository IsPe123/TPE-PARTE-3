<?php

require_once './app/models/productosModel.php';
require_once './app/api/APIView.php';

class ApiProductosController {

    private $model;
    private $view;
    private $data;

    function __construct() {
        $this->model = new productosModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData(){
        return json_decode($this->data);
    }

    public function getProductos($params = null) {
        $parametros = [];

        if (isset($_GET['sort'])) {
            $parametros['sort'] = $_GET['sort'];
        }

        if (isset($_GET['order'])) {
            $parametros['order'] = $_GET['order'];
        }

        $productos = $this->model->getProductos($parametros);
        $this->view->response($productos, 200);
    }

    public function getProducto($params = null) {
        $idProducto = $params[':ID'];
        $producto = $this->model->getProducto($idProducto);
        if ($producto) {
            $this->view->response($producto, 200);
        } else {
            $this->view->response("El producto no existe", 404);
        }
    }

    public function deleteProducto($params = null) {
        $idProducto = $params[':ID'];
        $success = $this->model->removeProducto($idProducto);
        if (var_dump($success)) {
            $this->view->response("El producto se borró exitosamente", 200);
        }
        else {
            $this->view->response("El producto que se intentó borrar no existe", 404);
        }
    }

    public function addProducto($params = null) {
        $body = $this->getData();

        $nombre = $body->nombre;
        $descripcion = $body->descripcion;
        $id_categoria = $body->id_categoria;

        $id = $this->model->insertProducto($nombre, $descripcion, $id_categoria);

        if ($id > 0) {
            $this->view->response("El producto se agrego con exito", 200);
        } else {
            $this->view->response("El producto no se pudo agregar", 500);
        }
    }

    public function updateProducto($params = null) {
        $idProducto = $params[':ID'];
        $body = $this->getData();

        $nombre = $body->nombre;
        $descripcion = $body->descripcion;
        $id_categoria = $body->id_categoria;

        $success = $this->model->updateProductos($nombre, $descripcion, $id_categoria, $idProducto);

        if ($success) {
            $this->view->response("El producto se actualizo con exito", 200);
        } else {
            $this->view->response("El producto no se pudo actualizar", 500);
        }
    }
}

?>