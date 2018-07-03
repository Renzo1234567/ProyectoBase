<?php

class Compra_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    
    
    /**
     * Inserta una compra
     * @param int $monto_total
     * @param int $cf__comp_comp_fisica Direccion de la tienda fisica de esta compra (n a n)
     */
     public function insert($monto_total, $cf__comp_comp_fisica = 0) {

        $cf_cliente_value = $_SESSION['data_id'];
        $cf_cliente_fild = ($_SESSION['tipo'] === "cliente natural") ?
                                'cf_comp_natural' : 'cf_comp_juridico';

        if($cf__comp_comp_fisica === 0) {
            $sql = "INSERT INTO compra_bd (comp_montotal, $cf_cliente_fild)
                    VALUES ($monto_total, $cf_cliente_value);";
        } else {
            $sql = "INSERT INTO compra_bd (comp_montotal, $cf_cliente_fild, cf__comp_comp_fisica)
                    VALUES ($monto_total, $cf_cliente_value, $cf__comp_comp_fisica);";
        }
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    
    
}
	


