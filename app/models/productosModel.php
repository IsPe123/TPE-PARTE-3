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
        INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria';

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

    public function getProducto($id) {
        $query = $this->db->prepare('SELECT productos.*, categorias.nombre AS categoria
        FROM productos
        INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE id_producto = ?');
        $query->execute([$id]);
        $producto = $query->fetchAll(PDO::FETCH_OBJ);

        return $producto;
    }

    function removeProducto($id) {
        $query = $this->db->prepare('DELETE FROM lista WHERE id_producto = ?; DELETE FROM productos WHERE id_producto = ?');
        $query->execute([$id, $id]);
        return $query->rowCount();
    }

    public function insertProducto($nombre, $descripcion, $id_categoria) {
        $query = $this->db->prepare('INSERT INTO productos (nombre, descripcion, id_categoria) VALUES (?, ?, ?)');
        $query->execute([$nombre, $descripcion, $id_categoria]);
        return $this->db->lastInsertId();
    }

    public function updateProductos($nombre, $descripcion, $id_categoria, $id) {
        $query = $this->db->prepare('UPDATE productos SET nombre = ?, descripcion = ?, id_categoria = ? WHERE id_producto = ?');
        return $query->execute([$nombre, $descripcion, $id_categoria, $id]);
    }

}

?>