<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('producto_model');
        $productos = $this->producto_model->get_list(); //next step: Solo tomar 9
        
        if(count($productos) < 9 ) {
            echo 'No existen suficientes productos';
            die;
        }
        $data = array(
            'productos' => $productos
        );

        $this->template('home/index', $data);
    }

    public function admin() {
        //$this->template_light();
        echo "Hola";
    }

}