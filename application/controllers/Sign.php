<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "Esto no muestra nada";
    }
    
    public function in() {
        
        if($this->input->post('email') !== null) {
            $this->load->model('Sigin');
            $resp=$this->Sigin->view();
            if ($resp){

                $this->load->model('usuario_model');
                $this->load->model('cliente_model');

                $where = "usua_correo = '" . $this->input->post('email') . "'";
                $user_data = $this->usuario_model->get_where($where)[0];

                $rol_permisos = $this->usuario_model->get_rol_permisos($user_data['cf_usua_rol']);
                unset($rol_permisos['descripcion']);

                if(isset($user_data['cf_usua_empleado'])) {
                    //Tiene privilegio sobre los empleados
                    //Do something
                    //...
                    $tipo = "trabajador";
                } else if(isset($user_data['cf_usua_natural'])) {
                    //En segundo orden los clientes naturales
                    $cliente = $this->cliente_model->get_natural_where_id($user_data['cf_usua_natural']);
                    $nombre = $cliente['natu_nombre1'];
                    $tipo = "cliente natural";
                    $data_id = $cliente['natu_rif'];
                } else if(isset($user_data['cf_usua_juridico'])) {
                    //Por ultimo clientes juridicos
                    $cliente = $this->cliente_model->get_juridico_where_id($user_data['cf_usua_juridico']);
                    $nombre = $cliente['juri_rif'];
                    $tipo = "cliente juridico";
                    $data_id = $cliente['juri_rif'];
                } else {
                    echo "No se enconctraron datos del usuario";
                    return;
                }

                $_SESSION['email'] = $this->input->post('email');
                $_SESSION['usua_token'] = $user_data['usua_token'];
                $_SESSION['rol'] = $rol_permisos;
                $_SESSION['nombre_usuario'] = $nombre;
                $_SESSION['tipo'] = $tipo;
                $_SESSION['data_id'] = $data_id;

            
            
            }
            else {
               echo"error";
            }
               
            
        } else {
            
            $this->template_light('sign/signin');
            
            
        }
        
            }
            
        
    
    
    public function up() 
    {
        echo "Sign up";
    }
    
    /**
     * Destroy all session data
     */
    public function out() 
    {
        $this->session->sess_destroy();
        redirect(base_url());
    } 
    
    public function remember() {
        echo "Remember";
    }

}