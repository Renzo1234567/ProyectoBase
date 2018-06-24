<?php
/**
 * Controloador de Ejemplo de como crear el maestro detalle
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Medio_pago extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cliente_model');
        $this->load->model('medio_pago_model');
    }
    
    public function index() {
        $this->medio_pago_model->get_list_tarjeta();
        
        $this->template_light('medio_pago/administrar');
    }

}
