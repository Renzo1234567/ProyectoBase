<?php

/**
 * Controloador de Ejemplo de como crear el maestro detalle
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//Extends of MY_Controller
class Punto extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('punto_model');
    }

    /**
     * Load the master detail
     */
    public function index()
    {
        $this->template_light('punto/index');
    }

    /**
     * Get all items
     */
    public function get_list() 
    {
        $puntos = $this->punto_model->get_list();
        $this->load->view('punto/list', array('puntos' => $puntos));
    }

    /**
     * Create form in detail
     */
    public function create()
    {
        if ($this->input->post())
        {          
            
            $has_error = $this->punto_model->insert();
            if($has_error) {
                echo 'Hubo un error: Insersión fallida';
                return;
            }
                
        }
        else
        {
            $this->load->view('punto/create');
        }
    }

    /**
     * View item in detail
     */
    public function view($id)
    {
        $punto = $this->punto_model->get_where_id($id);
        $this->load->view('punto/view', $punto);
    }

    /**
     * Edit one item in detail
     */
    public function edit($id = null)
    {
        if ($this->input->post())
        {
            $id = $this->input->post('punt_clave'); 
            
            $has_error = $this->punto_model->update($id);
            if($has_error) {
                echo 'Hubo un error: Actualización fallida';
                return;
            }
        }
        else if(isset($id) && $id > 0)
        {
            $punto = $this->punto_model->get_where_id($id);
            $this->load->view('punto/edit', $punto);
        }
    }

    /**
     * Delete one item
     */
    public function delete($id)
    {
        $has_error = $this->punto_model->delete($id);
        if($has_error)
                echo 'Hubo un error: Eliminación fallida';
    }

}
