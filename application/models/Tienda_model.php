<?php

class Tienda_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna la lista total de productos ordenados descendente
     */
    public function get_list() {
        $sql = 'SELECT * FROM tienda_bd ORDER BY tien_clave DESC;';
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
        $sql = "SELECT * FROM tienda_bd WHERE $where";
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
        $sql = "SELECT * FROM tienda_bd WHERE tien_clave = $id";
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
        $nombre = $this->input->post('tien_nombre');
        $lugar="Mini Candy Shop";
        $lugar2=$this->input->post('tien_lugar');
        $sql = "INSERT INTO tienda_bd (tien_nombre,tien_tipo,cf_tien_lugar)
                VALUES ('$nombre','$lugar','$lugar2');";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Inserta un producto
     */
  public function update($id) {
        $nombre = $this->input->post('tien_nombre');
        $lugar3=$this->input->post('tien_lugar');
        
        
            $sql = "UPDATE tienda_bd SET 
                tien_nombre = '$nombre',
                cf_tien_lugar ='$lugar3'
                WHERE tien_clave = $id;";
              
        
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Inserta un producto
     */
    public function delete($id) {        
        $sql = "DELETE FROM tienda_bd WHERE tien_clave = '$id'";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
}
	


