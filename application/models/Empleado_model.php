<?php
/**
 * Maneja todo lo relacionado a los clientes, tanto naturales como los juridicos
 */
class Empleado_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Retorna un cliente natural dada su clave primaria
     */
    public function get_where_id($id) {
        $sql = "SELECT * FROM empleado_bd, departamento_tienda
                WHERE empl_ci = $id
                    AND cf_empl_depa_tien = depa_tien_clave";
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        else
            return pg_fetch_assoc($result);            
    }    
    
    
}
	
