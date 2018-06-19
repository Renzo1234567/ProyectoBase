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
        $sql = 'SELECT * FROM producto_bd ORDER BY prod_id DESC;';
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
        $sql = "SELECT * FROM producto_bd WHERE prod_id = $id";
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        else
            return pg_fetch_assoc($result);            
    }
    
    /**
     * Inserta un producto
     */
    public function insert() {
        $nombre = $this->input->post('prod_nombre');
        $descripcion = $this->input->post('prod_descripcion');
        
        $sql = "INSERT INTO producto_bd (prod_nombre, prod_descripcion, prod_imagen)
                VALUES ('$nombre', '$descripcion', null);";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Inserta un producto
     */
    public function update($id) {
        $nombre = $this->input->post('prod_nombre');
        $descripcion = $this->input->post('prod_descripcion');
        
        $sql = "UPDATE producto_bd SET 
                prod_nombre = '$nombre', 
                prod_descripcion = '$descripcion', 
                prod_imagen = null;";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
}
	


