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
                'consulta-1' => 'consulta 1',
                'consulta-2' => 'consulta 2',
                'consulta-3' => 'consulta 3',
            )
        );
        $this->template_light('consulta/index', $data);
    }
    
    public function ejecutar() {
        $consulta = $this->input->post('consulta');
        
        $result = $this->consulta_model->ejecutar($consulta);
        
        var_dump($result);
        
    }
    
}
