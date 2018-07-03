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

    public function set_inventario($p, $t) {
        $sql = 'INSERT INTO inventario_bd (inve_cantidad, cf_inv_tienda, cf_inv_producto_tipo)
                VALUES <br>';

        foreach($t as $tienda) {
            $cf_inv_tienda = $tienda['tien_clave'];
            foreach($p as $producto) {
                $cf_inv_producto_tipo = $producto['prod_id'];
                $cantidad = rand(100000, 50000000);
                $sql .= "($cantidad, $cf_inv_tienda, $cf_inv_producto_tipo), <br>";
            }
        }
        
        echo $sql; die;

        //$return = pg_query($this->conn, $sql);
    }


}
	


