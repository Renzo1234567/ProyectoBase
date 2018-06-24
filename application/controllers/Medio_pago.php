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
        $bancos = $this->medio_pago_model->get_bancos();
        
        $data = array(
            'bancos' => $bancos
        );

        $this->template_light('medio_pago/administrar', $data);
    }

    public function anadir_tarjeta() {
        //Añado la tarjeta
        $has_error = $this->medio_pago_model->insertar_tarjeta();
        if($has_error) {
            echo "Lo sentimos ha ocurrido un error insertando la tarjeta :(";
            return;
        }

        //Añado en la relacion n a n
        $has_error = $this->medio_pago_model->insertar_medio_pago('t');
        if($has_error) {
            echo "Lo sentimos ha ocurrido un error vinculando su tarjeta :(";
            return;
        }

        //redirect to index function
        redirect('medio_pago');
    }

}
