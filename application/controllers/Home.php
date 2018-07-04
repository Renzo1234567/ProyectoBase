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
        $this->load->model('tienda_model');

        $productos = $this->producto_model->get_list(); //next step: Solo tomar 9
        $tienda = $this->tienda_model->get_where_id(1);
        $_SESSION['tienda'] = $tienda;
        
        //Cuestiones de diseño de la pagina
        if(count($productos) < 9 ) {
            echo 'No existen suficientes productos';
            die;
        }
        $data = array(
            'productos' => $productos
        );

        //var_dump($productos); die;
        $this->template('home/index', $data);
    }

    public function admin() {
        $this->template_light('home/admin');        
    }

    /**
     * Script que inyecta SQL para crecer la base de datos
     */
    public function make_stronger() {
        
        $this->load->model('make_model');
        $this->load->model('producto_model');
        $this->load->model('tienda_model');

        //Aumentar a 50.000.000 en el inventario
        //$this->make_model->update_inventario_to(50000000);


        //Script para vincular crear bastantes productos en todas las tiendas
        $productos = $this->producto_model->get_list();
        $tiendas = $this->tienda_model->get_list();
        $this->make_model->set_inventario($productos, $tiendas);
    }

}