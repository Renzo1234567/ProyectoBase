<?php

class MY_Model extends CI_Model
{

    protected $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn = pg_connect("host=localhost port=5432 dbname=candy_ucab user=postgres password=1234");
        if (!$this->conn) {
            echo "Ocurrió un error de conexion con la base de datos.\n";
            exit;
        }
    }

    

}