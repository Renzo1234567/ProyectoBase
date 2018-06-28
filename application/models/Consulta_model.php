<?php

/**
 * Todas las consultas deben ser precargadas
 */
class Consulta_model extends MY_Model
{
    
    private $sql;

    public function __construct()
    {
        parent::__construct();
        $this->sql = array(
            'consulta-1' => 'SELECT * FROM lugar_bd',
            'consulta-2' => 'SELECT * FROM producto_bd',
            'consulta-3' => 'SELECT * FROM tipo_bd',
        );
    }
    
    public function ejecutar($consulta_id) {
        
        $sql = $this->sql[$consulta_id];
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        
        $return = array();
        while($row = pg_fetch_assoc($result))
            $return[] = $row;

        return $return;
    }
    
}
	




