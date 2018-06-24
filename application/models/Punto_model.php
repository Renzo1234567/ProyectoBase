<?php

class Punto_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna la lista total de puntos ordenados descendente
     */
    public function get_list() {
        $sql = 'SELECT * FROM punto_bd ORDER BY punt_clave DESC;';
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
        $sql = "SELECT * FROM punto_bd WHERE $where";
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
     * Retorna 1 punto dada su clave primaria
     */
    public function get_where_id($id) {
        $sql = "SELECT * FROM punto_bd WHERE punt_clave = $id";
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        else
            return pg_fetch_assoc($result);            
    }
    
    /**
     * Inserta un punto
     */
    public function insert() {
        $valor = $this->input->post('punt_valor');
        
        $sql = "INSERT INTO punto_bd (punt_valor)
                VALUES ('$valor');";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Inserta un punto
     */
    public function update($id) {
        $valor = $this->input->post('punt_valor');
        
        
        $sql = "UPDATE punto_bd SET 
            punt_valor = '$valor'
            WHERE punt_clave = $id;";
            
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Inserta un punto
     */
    public function delete($id) {        
        $sql = "DELETE FROM punto_bd WHERE punt_clave = '$id'";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
}
	




