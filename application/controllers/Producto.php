<?php

/**
 * Controloador de Ejemplo de como crear el maestro detalle
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//Extends of MY_Controller
class Producto extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('producto_model');
    }

    /**
     * Load the master detail
     */
    public function index()
    {
        $this->template_light('producto/index');
    }

    /**
     * Get all items
     */
    public function get_list() 
    {
        $productos = $this->producto_model->get_list();
        $this->load->view('producto/list', array('productos' => $productos));
    }

    /**
     * Create form in detail
     */
    public function create()
    {
        if ($this->input->post())
        {
            $has_error = $this->producto_model->insert();
            
            if($has_error)
                echo 'Hubo un error: Insersión fallida';
        }
        else
        {
            $this->load->view('producto/create');
        }
    }

    /**
     * View item in detail
     */
    public function view($id)
    {
        $producto = $this->producto_model->get_where_id($id);
        $this->load->view('producto/view', $producto);
    }

    /**
     * Edit one item in detail
     */
    public function edit($id)
    {
        if ($this->input->post())
        {
            $id = $this->input->post('prod_id');
            $has_error = $this->producto_model->update($id);
            
            if($has_error)
                echo 'Hubo un error: Actualización fallida';
        }
        else
        {
            $producto = $this->producto_model->get_where_id($id);
            $this->load->view('producto/edit', $producto);
        }
    }

    /**
     * Delete one item
     */
    public function delete($id)
    {
        $this->crud_model->delete($id);
        redirect('/producto/index');
    }

}
