<?php

/**
 * Controloador de Ejemplo de como crear el maestro detalle
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//Extends of MY_Controller
class Rol extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    /**
     * Load the master detail
     */
    public function index()
    {
        $this->template_light('rol/index');
    }

    /**
     * Get all items
     */
    public function get_list() 
    {
        $roles = $this->usuario_model->get_list_of_roles();
        $this->load->view('rol/list', array('roles' => $roles));
    }

    /**
     * Create form in detail
     */
    public function create()
    {
        if ($this->input->post())
        {          
            $has_error = $this->usuario_model->insertar_rol();
            if($has_error) {
                echo 'Hubo un error: Insersión fallida';
                return;
            }  

            $has_error = $this->usuario_model->vincular_rol_permisos();
            if($has_error) {
                echo 'Hubo un error: Vinculacion con los permisos fallida';
                return;
            }
                
        }
        else
        {
            $permisos = $this->usuario_model->get_list_of_permisos();
            $data = array(
                'permisos' => $permisos
            );
            $this->load->view('rol/create', $data);
        }
    }

    /**
     * View item in detail
     */
    public function view($id)
    {
        $rol = $this->usuario_model->get_rol_permisos($id);
        $this->load->view('rol/view', $rol);
    }

    /**
     * Edit one item in detail
     */
    public function edit($id = null)
    {
        if ($this->input->post())
        {
            $id = $this->input->post('punt_clave'); 
            
            $has_error = $this->usuario_model->update($id);
            if($has_error) {
                echo 'Hubo un error: Actualización fallida';
                return;
            }
        }
        else if(isset($id) && $id > 0)
        {
            $punto = $this->usuario_model->get_where_id($id);
            $this->load->view('punto/edit', $punto);
        }
    }

    /**
     * Delete one item
     */
    public function delete($id)
    {
        $has_error = $this->usuario_model->delete($id);
        if($has_error)
                echo 'Hubo un error: Eliminación fallida';
    }

}
