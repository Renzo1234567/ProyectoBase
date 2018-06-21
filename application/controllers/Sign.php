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
                $where = "usua_correo = '" . $this->input->post('email') . "'";
                
                $user_data = $this->usuario_model->get_where($where)[0];
                /*$data = [
                    "email" => $this->input->post('email'),
                    'usua_token' => $user_data['usua_token']
                    //Insertar datos del cliente
                ];*/
                $_SESSION['email'] = $this->input->post('email');
                $_SESSION['usua_token'] = $user_data['usua_token'];
                //$this->session->set_userdata($data);
            
            
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