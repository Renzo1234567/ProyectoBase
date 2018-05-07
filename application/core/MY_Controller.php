<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Load a basic template
     * 
     * @param $view strig       Dir of the view
     * @param $data object      Data to display
     * @return  void
     */
    protected function template($view, $data = NULL)
    {
        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view($view, $data);
        $this->load->view('template/footer', $data);
    }

    

}