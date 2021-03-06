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
            if($_FILES && count($_FILES) === 1) {
                $has_error = $this->guardar_imagen();
                if($has_error) {
                    echo 'Hubo un error: Problema con la imagen';
                    return;
                }
            } else {
                echo 'Hubo un error: La imagen es requerida';
                return;
            }  
            
            $has_error = $this->producto_model->insert_producto();
            if($has_error) {
                echo 'Hubo un error: Insersión fallida de producto';
                return;
            }

            $has_error = $this->producto_model->insert_producto_tipo();
            if($has_error) {
                echo 'Hubo un error: Insersión fallida del producto con el tipo solicitado';
                return;
            }
                
        }
        else
        {
            $tipos_posibles = $this->producto_model->get_types();
            $this->load->view('producto/create', array('tipos_posibles' => $tipos_posibles));
        }
    }

    /**
     * View item in detail
     */
    public function view($id)
    {
        $producto = $this->producto_model->get_where_id($id);
        var_dump($producto);
        $this->load->view('producto/view', $producto);
    }

    /**
     * Edit one item in detail
     */
    public function edit($id = null)
    {
        //Si ha vendiado datos (Los guarda)
        if ($this->input->post())
        {
            $id = $this->input->post('prod_id');
            
            if($_FILES && count($_FILES) === 1) {
                $has_error = $this->guardar_imagen();
                if($has_error) {
                    echo 'Hubo un error: Problema con la imagen archivo';
                    return;
                }
            }   
            
            $has_error = $this->producto_model->update($id);
            if($has_error) {
                echo 'Hubo un error: Actualización fallida';
                return;
            }
        }
        //Carga el formulario (Si es primera vez que ingresa)
        else if(isset($id) && $id > 0)
        {
            $producto = $this->producto_model->get_where_id($id);
            $producto['tipos_posibles'] = $this->producto_model->get_types();
            $this->load->view('producto/edit', $producto);
        }
    }

    /**
     * Delete one item
     */
    public function delete($id)
    {
        $has_error = $this->producto_model->delete($id);
        if($has_error)
                echo 'Hubo un error: Eliminación fallida';
    }
    
    private function guardar_imagen() {
        
        if($_FILES && count($_FILES) === 1) {
            $ruta = $_SERVER['DOCUMENT_ROOT'] . '/proyectobase/public/img/producto/' . $_FILES['imagen']['name'];
            return !move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        }
        return !false;
    }

}
