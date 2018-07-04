<?php

class Compra_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    
    
    /**
     * Inserta una compra Cabecera de la compra o factura
     * NOTA: Falata cargar la fecha de esta compra
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

    /**
     * Inserta el pago de la ultima compra
     * @param int $monto_total
     * @param int $cf_pago_mediospago
     */
    public function insertar_pago($monto_total, $cf_pago_mediospago) {

        $cf_pago_compra = $this->get_last_compra();

        $sql = "INSERT INTO pago_bd (pago_monto, cf_pago_mediospago, cf_pago_compra)
                    VALUES ($monto_total, $cf_pago_mediospago, $cf_pago_compra);";

        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }

    /**
     * Inserta el detalle de una compra
     * Recorre cada valor del carrito y lo va insertando a la ultima compra registrada
     * @param array $carrito lita de productos a insertar (Se toma de la variable de sesion)
     * @return void En este caso no retorna nada
     */
    public function insertar_detalle($carrito) {
        $sql1 = 'INSERT INTO presupuesto_producto_bd (pre_pro_cantidad, cf_pre_pro_producto_tipo, cf_pre_pro_compra)
                VALUES ';

        $cf_pre_pro_compra = $this->get_last_compra();

        foreach($carrito as $producto) {
            $cf_pre_pro_producto_tipo = $producto['id'];
            $cantidad = $producto['cantidad'];
            $sql2 = "($cantidad, $cf_pre_pro_producto_tipo, $cf_pre_pro_compra);";
            
            $result = pg_query($this->conn, $sql1 . $sql2);
        }
    }

    /**
     * Obtiene el id de la ultima compra
     */
    public function get_last_compra() {
        $sql = 'SELECT MAX(comp_id) FROM compra_bd';
        $result = pg_query($this->conn, $sql);

        return (int) pg_fetch_assoc($result)['max'];
    }
    
    
    
}
	


