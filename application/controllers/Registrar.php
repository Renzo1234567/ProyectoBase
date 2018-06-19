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
           
            
            
        
        
    }
    
    public function comoregistrarse() 
    {
        $this->template_light('Registrar/comoregistrarse');
            
    }

         public function registrarjuridica() 
    {
        $this->template_light('Registrar/registrarjuridica');
            
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