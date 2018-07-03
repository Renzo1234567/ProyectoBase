<?php

class Make_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function update_inventario_to($num) {
        $sql = "UPDATE inventario_bd
                SET inve_cantidad = $num";

        $return = pg_query($this->conn, $sql);
    }


}
	


