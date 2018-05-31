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
        
        if(isset($_POST['email'])) {
            
            $session_data = array(
                'email' => $_POST['email']
            );
            $this->session->set_userdata($session_data);
            redirect(base_url());
            
        } else {
            
            $this->template_light('sign/signin');
            
        }
        
    }
    
    public function up() {
        echo "Sign up";
    }
    
    public function out() {
        echo "Sig out";
    } 
    
    public function remember() {
        echo "Remember";
    }

}