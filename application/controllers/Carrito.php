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
                        'cantidad' => $this->input->post('cantidad')
                    )
                )
            ;
            $_SESSION['carrito'] = $carrito;
        } else {
            $estaba = FALSE;
            foreach($_SESSION['carrito'] as &$car) {
                if($car['id'] === $this->input->post('producto-id')) {
                    $car['cantidad'] = $this->input->post('cantidad');
                    $estaba = true;
                }
            }
            if(!$estaba) {
                $item = array(
                        'id' => $this->input->post('producto-id'),
                        'cantidad' => $this->input->post('cantidad')
                    );
                $_SESSION['carrito'][] = $item;
            }
        }
    }

    /**
     * Load the master detail
     */
    public function index()
    {
        var_dump($_SESSION);
    }

    

}
