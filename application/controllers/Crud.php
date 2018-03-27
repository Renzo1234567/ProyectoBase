<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('crud_model');
    }

    public function index()
    {
        $messages = $this->crud_model->get();
        $this->load->view('crud/index', array('messages' => $messages));
    }

    public function create()
    {
        if ($this->input->post())
        {
            $this->crud_model->insert();
            redirect('/crud/index');
        }
        else
        {
            $this->load->view('crud/create');
        }
    }

    public function view($id)
    {
        $message = $this->crud_model->get_where($id);
        $this->load->view('crud/view', $message[0]);
    }

    public function edit($id)
    {
        if ($this->input->post())
        {
            $this->crud_model->update($id);
            redirect('/crud/index');
        }
        else
        {
            $message = $this->crud_model->get_where($id);
            $this->load->view('crud/edit', $message[0]);
        }
    }

    public function delete($id)
    {
        $this->crud_model->delete($id);
        redirect('/crud/index');
    }

}
