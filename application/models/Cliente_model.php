<?php
/**
 * Maneja todo lo relacionado a los clientes, tanto naturales como los juridicos
 */
class Cliente_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Retorna una lista de prodcutos dada una condicion en SQL
     *
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
    }/* */
    
    /**
     * Retorna un cliente natural dada su clave primaria
     */
    public function get_natural_where_id($id) {
        $sql = "SELECT * FROM natural_bd WHERE natu_rif = $id";
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        else
            return pg_fetch_assoc($result);            
    }
    
    /**
     * Retorna un cliente juridico dada su clave primaria
     */
    public function get_juridico_where_id($id) {
        $sql = "SELECT * FROM juridico_bd WHERE juri_rif = $id";
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        else
            return pg_fetch_assoc($result);            
    }
    
    
    
}
	
