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
/*
    public function get($params = null) {
        $idTask = $params[':ID'];
        $task = $this->model->get($idTask);
        if ($task) {
            $this->view->response($task, 200);
        } else {
            $this->view->response("La tarea no existe(creo)", 404);
        }
    }

    public function delete($params = null) {
        $idTask = $params[':ID'];
        $success = $this->model->remove($idTask);

        if ($success) {
            $this->view->response("La tarea se borro exitosamente", 200);
        } else {
            $this->view->response("La tarea no existe", 404);
        }
    }

    public function add($params = null) {
        $body = $this->getData();

        $titulo = $body->titulo;
        $descripcion = $body->descripcion;
        $prioridad = $body->prioridad;

        $id = $this->model->insert($titulo, $descripcion, $prioridad);

        if ($id > 0) {
            $this->view->response("La tarea se agrego con exito", 200);
        } else {
            $this->view->response("La tarea no se pudo insertar", 500);
        }
    }

    public function update($params = null) {
        $idTask = $params[':ID'];
        $body = $this->getData();

        $titulo = $body->titulo;
        $descripcion = $body->descripcion;
        $prioridad = $body->prioridad;

        $success = $this->model->update($titulo, $descripcion, $prioridad, $idTask);

        if ($success) {
            $this->view->response("La tarea se actualizo con exito", 200);
        } else {
            $this->view->response("La tarea no se pudo actualizar", 500);
        }
    }*/
}

?>