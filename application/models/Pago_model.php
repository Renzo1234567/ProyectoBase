<?php

class Pago_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    
    
    /**
     * Inserta un pago
     * @param $_POST['nombre']
     * @param $_POST['descripcion']
     */
    public function insert() {
        $nombre = $this->input->post('prod_nombre');
        $descripcion = $this->input->post('prod_descripcion');
        
        $sql = "INSERT INTO pago_bd (prod_nombre, prod_descripcion)
                VALUES ('$nombre', '$descripcion');";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    
    
}
	


