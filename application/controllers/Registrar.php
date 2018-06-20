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
            $this->load->model('Lugar_model');
            
            $estados = $this->Lugar_model->get_where("luga_tipo = 'Estado'");            
            $municipio = $this->Lugar_model->get_where("luga_tipo = 'Municipio'");
            $parroquia = $this->Lugar_model->get_where("luga_tipo = 'Parroquia'");
            
            $data = array(
                'estados' => $estados,
                'municipios' => $municipio,
                'parroquias' => $parroquia
            );
        
            $this->template_light('Registrar/registrar', $data);
        
    }
    
    public function comoregistrarse() 
    {
        $this->template_light('Registrar/comoregistrarse');
            
    }

         public function registrarjuridica() 
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
        
            
        $this->template_light('Registrar/registrarjuridica',$data);
            
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