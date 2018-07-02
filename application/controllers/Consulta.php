<?php

/**
 * Todas las consultas estan precargadas en el modelo
 * 
 * Todas las posibles consultas deben verse en el select
 */
class Consulta extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('consulta_model');
    }
    
    public function index() {
        $data = array(
            'consultas' => array(
                'consulta-1' => 'Ingresos Vs Egresos',
                'consulta-2' => 'Reporte de asistencia',
                'consulta-3' => 'Reporte de empleados',
                'consulta-4' => 'Los 10 clientes frecuentes por tienda',
                'consulta-5' => 'Los 5 mejores clientes segun monto total en compras',
                'consulta-6' => 'Clientes con mayor cantidad de puntos',
                'consulta-7' => 'Marca más común de tarjetas de crédito',
                'consulta-8' => 'Las tiendas que más recibieron pagos con puntos',
                'consulta-9' => 'Mejores clientes en base a la suma de compras en línea y las compras físicas',
                'consulta-10' => 'Ingrediente más utilizado en los productos',
                'consulta-11' => 'Productos más vendido por tienda',
                'consulta-12' => 'Ranking de Productos más vendido por tienda',
                'consulta-13' => 'Listado por tiendas de clientes con presupuestos efectivos',
            )
        );
        $this->template_light('consulta/index', $data);
    }
    
    public function ejecutar() {
        $consulta = $this->input->post('consulta');
        $rows = $this->consulta_model->ejecutar($consulta);

        if(count($rows) > 0) {
            $cols = array();
            foreach($rows[0] as $col => $no_me_ineresa) {
                $cols[] = $col;
            }

            $data = array(
                'rows' => $rows,
                'cols' => $cols
            );

            $this->template_light('consulta/ejecutar', $data);
        }

        
        
    }
    
}
