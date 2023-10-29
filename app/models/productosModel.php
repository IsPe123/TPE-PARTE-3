<?php

require_once './app/helpers/db.helper.php';

class productosModel {

    private $db;
    private $dbHelper;

    function __construct() {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

	public function getProductos($parametros) {
        $sql = 'SELECT productos.*, categorias.nombre AS categoria
        FROM productos
        INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria;';

        if (isset($parametros['order'])) {
            $sql .= ' ORDER BY '.$parametros['order'];
            if (isset($parametros['sort'])) {
                $sql .= ' '.$parametros['sort'];
            }
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }
/*
    public function get($id) {
        $query = $this->db->prepare( "select * from tarea where id = ?");
        $query->execute([$id]);
        $tarea = $query->fetchAll(PDO::FETCH_OBJ);

        return $tarea;
    }

    public function remove($id) {
        $query = $this->db->prepare( "delete from tarea where id = ?");
        $query->execute([$id]);
        return $query->rowCount();
    }

    public function insert($titulo, $descripcion, $prioridad) {
        $query = $this->db->prepare( "INSERT INTO tarea (titulo, descripcion, prioridad) VALUES (?, ?, ?)");
        $query->execute([$titulo, $descripcion, $prioridad]);
        return $this->db->lastInsertId();
    }

    public function update($titulo, $descripcion, $prioridad, $id) {
        $query = $this->db->prepare( "UPDATE tarea SET titulo = ?, descripcion = ?, prioridad = ? WHERE id = ?");
        return $query->execute([$titulo, $descripcion, $prioridad, $id]);
    }*/
}

?>