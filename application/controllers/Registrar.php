<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "Esto no muestra nadaa";
    }
    
    public function registrar() {
        
            $this->template_light('Registrar/registrar');
            $x = $this->input->post('PrimerApellido');
            
            
        
        
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