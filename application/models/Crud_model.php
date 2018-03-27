<?php

class Crud_model extends CI_Model
{
    
    public $id;
    public $name;
    public $msg;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $query = $this->db->get('message');
        return $query->result();
    }
    
    public function get_where($id)
    {
        $query = $this->db->get_where('message', array('id' => $id));
        return $query->result();
    }

    public function insert()
    {
        unset($this->id);
        $this->name = $this->input->post('name');
        $this->msg = $this->input->post('msg');
        $this->db->insert('message', $this);
    }
    
    public function update($id)
    {
        unset($this->id);
        $this->name = $this->input->post('name');
        $this->msg = $this->input->post('msg');
        $this->db->update('message', $this, array('id' => $id));
    }
    
    public function delete($id)
    {
        $this->db->delete('message', array('id' => $id));
    }

}
