<?php

class Producto_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna la lista total de productos ordenados descendente
     */
    public function get_list() {
        $sql = 'SELECT * FROM producto_bd, producto_tipo, tipo_bd 
                WHERE cf_prod_tipo_producto = prod_id AND cf_prod_tipo_tipo = tipo_id
                ORDER BY prod_id DESC;';
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        
        $return = array();
        while($row = pg_fetch_assoc($result))
            $return[] = $row;

        return $return;
    }
    
    /**
     * Retorna una lista de prodcutos dada una condicion en SQL
     */
    public function get_where($where) {
        $sql = "SELECT * FROM producto_bd WHERE $where";
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        
        $return = array();
        while($row = pg_fetch_assoc($result))
            $return[] = $row;

        return $return;
    }
    
    /**
     * Retorna 1 producto dada su clave primaria
     */
    public function get_where_id($id) {
        //$sql = "SELECT * FROM producto_bd WHERE prod_id = $id";
        $sql = "SELECT * FROM producto_bd, producto_tipo, tipo_bd 
                 WHERE cf_prod_tipo_producto = prod_id 
                    AND cf_prod_tipo_tipo = tipo_id
                    AND prod_id = $id";
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        else
            return pg_fetch_assoc($result);            
    }

    /**
     * Retorna todo los tipo que existen para añadir a un producto
     */
    public function get_types() {
        $sql = 'SELECT * FROM tipo_bd';
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        
        $return = array();
        while($row = pg_fetch_assoc($result))
            $return[] = $row;

        return $return;
    }

    /**
     * Obtiene el id del ultimo producto insertado
     * @return int id de la ultimo producto insertado
     */
    private function get_last_producto() {
        $sql = 'SELECT MAX(prod_id) FROM producto_bd';
        $result = pg_query($this->conn, $sql);

        return (int) pg_fetch_assoc($result)['max'];
    }
    
    /**
     * Inserta un producto basico
     * @param $_POST['nombre']
     * @param $_POST['descripcion']
     */
    public function insert_producto() {
        $nombre = $this->input->post('prod_nombre');
        $descripcion = $this->input->post('prod_descripcion');
        
        $sql = "INSERT INTO producto_bd (prod_nombre, prod_descripcion)
                VALUES ('$nombre', '$descripcion');";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Inserta un producto con datos especificos
     */
    public function insert_producto_tipo() {
        
        $precio = $this->input->post('prod_tipo_preciounitario');
        $cf_producto = $this->get_last_producto();
        $cf_tipo = $this->input->post('cf_prod_tipo_tipo');
        $img = $_FILES['imagen']['name'];
        
        $sql = "INSERT INTO producto_tipo (prod_tipo_preciounitario, prod_tipo_imagen, cf_prod_tipo_producto, cf_prod_tipo_tipo)
                VALUES ($precio, '$img', $cf_producto, $cf_tipo);";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Actualizar un producto
     */
    public function update($id) {
        $nombre = $this->input->post('prod_nombre');
        $descripcion = $this->input->post('prod_descripcion');
        
        if($_FILES && count($_FILES) === 1) {
            $img = $_FILES['imagen']['name'];
            $sql = "UPDATE producto_bd SET 
                prod_nombre = '$nombre', 
                prod_descripcion = '$descripcion', 
                prod_imagen = '$img'
                WHERE prod_id = $id;";
        } else {
            $sql = "UPDATE producto_bd SET 
                prod_nombre = '$nombre', 
                prod_descripcion = '$descripcion'
                WHERE prod_id = $id;";
        }        
        
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Eliminar un producto
     */
    public function delete($id) {        
        $sql = "DELETE FROM producto_bd WHERE prod_id = '$id'";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
}
	


