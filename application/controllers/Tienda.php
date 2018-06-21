<?php

/**
 * Controloador de Ejemplo de como crear el maestro detalle
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//Extends of MY_Controller
class Tienda extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tienda_model');
    }

    /**
     * Load the master detail
     */
    public function index()
    {
        $this->template_light('tienda/index');
    }

    /**
     * Get all items
     */
    public function get_list() 
    {
        $tiendas = $this->tienda_model->get_list();
        $this->load->view('tienda/list', array('tiendas' => $tiendas));
    }

    /**
     * Create form in detail
     */
    public function create()
    {
        if ($this->input->post())
        {            
                   
            $has_error = $this->tienda_model->insert();
            if($has_error) {
                echo 'Hubo un error: Insersión fallida';
                return;
            }
                
        }
        else
        {
            $this->load->model('Lugar_model');
            
            $estados = $this->Lugar_model->get_where("luga_tipo = 'Estado'");            
            $municipio = $this->Lugar_model->get_where("luga_tipo = 'Municipio'");
            $parroquia = $this->Lugar_model->get_where("luga_tipo = 'Parroquia'");
            
            $data = array(
                'estados' => $estados,
                'municipios' => $municipio,
                'parroquias' => $parroquia
            );
        
        
            $this->load->view('tienda/create', $data);
        }
    }

    /**
     * View item in detail
     */
    public function view($id)
    {
        $tienda = $this->tienda_model->get_where_id($id);
        $this->load->view('tienda/view', $tienda);
    }

    /**
     * Edit one item in detail
     */
    public function edit($id = null)
    {
        if ($this->input->post())
        {
            $id = $this->input->post('tien_clave');
            
            
            $has_error = $this->tienda_model->update($id);
            if($has_error) {
                echo 'Hubo un error: Actualización fallida';
                return;
            }
        }
        else if(isset($id) && $id > 0)
        {

             $this->load->model('Lugar_model');
            
            $estados = $this->Lugar_model->get_where("luga_tipo = 'Estado'");            
            $municipio = $this->Lugar_model->get_where("luga_tipo = 'Municipio'");
            $parroquia = $this->Lugar_model->get_where("luga_tipo = 'Parroquia'");
             $tienda = $this->tienda_model->get_where_id($id);
            $data = array(
                'estados' => $estados,
                'municipios' => $municipio,
                'parroquias' => $parroquia,
                'tienda' => $tienda
            );
           
           
            $this->load->view('tienda/edit', $data);
        }
    }
    /**
     * Delete one item
     */
    public function delete($id)
    {
        $has_error = $this->tienda_model->delete($id);
        if($has_error)
                echo 'Hubo un error: Eliminación fallida';
    }
    
   
}
