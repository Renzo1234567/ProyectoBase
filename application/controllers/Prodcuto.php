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
        //Usamos este modelo de ejemplo
        $this->load->model('crud_model');
    }

    /**
     * Load the master detail
     */
    public function index()
    {
        $this->template_light('master_detail/index');
    }

    /**
     * Get all items
     */
    public function list() 
    {
        $data = $this->crud_model->get();
        $this->load->view('master_detail/list', array('data' => $data));
    }

    /**
     * Create form in detail
     */
    public function create()
    {
        if ($this->input->post())
        {
            $this->crud_model->insert();
            redirect('/master_detail/index');
        }
        else
        {
            $this->load->view('master_detail/create');
        }
    }

    /**
     * View item in detail
     */
    public function view($id)
    {
        $message = $this->crud_model->get_where($id);
        $this->load->view('master_detail/view', $message[0]);
    }

    /**
     * Edit one item in detail
     */
    public function edit($id)
    {
        if ($this->input->post())
        {
            $this->crud_model->update($id);
            redirect('/master_detail/index');
        }
        else
        {
            $message = $this->crud_model->get_where($id);
            $this->load->view('master_detail/edit', $message[0]);
        }
    }

    /**
     * Delete one item
     */
    public function delete($id)
    {
        $this->crud_model->delete($id);
        redirect('/master_detail/index');
    }

}
