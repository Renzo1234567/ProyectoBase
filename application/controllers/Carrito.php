<?php

/**
 * Controloador de Ejemplo de como crear el maestro detalle
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//Extends of MY_Controller
class Carrito extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('producto_model');
    }
    
    public function agregar() {
        
        if(!isset($_SESSION['carrito'])) {
            $carrito = array(
                    array(
                        'id' => $this->input->post('producto-id'),
                        'cantidad' => $this->input->post('cantidad'),
                        'nombre' => $this->input->post('producto-nombre')
                    )
                )
            ;
            $_SESSION['carrito'] = $carrito;
        } else {
            $estaba = FALSE;
            foreach($_SESSION['carrito'] as &$cart) {
                if($cart['id'] === $this->input->post('producto-id')) {
                    $cart['cantidad'] = $this->input->post('cantidad');
                    $estaba = true;
                }
            }
            if(!$estaba) {
                $item = array(
                        'id' => $this->input->post('producto-id'),
                        'cantidad' => $this->input->post('cantidad'),
                        'nombre' => $this->input->post('producto-nombre')
                    );
                $_SESSION['carrito'][] = $item;
            }
        }
    }

    /**
     * Ver detalle del carrtio
     */
    public function index()
    {
        $this->template('carrito/index');
    }

    /**
     * Cargar los medios de pago de un cliente
     */
    public function pagar() {
        if(isset($_SESSION['usua_token']) && isset($_SESSION['carrito'])) {
            $this->template('carrito/pagar');
        } else {
            redirect(base_url('#acceso-denegado'));
        }        
    }
    
    /**
     * Cargar los medios de pago de un cliente
     */
    public function recibo() {
        $this->template('carrito/recibo');
    }

    public function debug_session() {
        var_dump($_SESSION);
}

}
