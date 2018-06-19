<?php

class Producto_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_list() {
        $sql = 'SELECT * FROM producto_bd;';
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        
        $return = array();
        while($row = pg_fetch_assoc($result))
            $return[] = $row;

        return $return;
    }

    
    public function insert() {
        $sql = 'INSERT INTO producto_bd (column1, column2, column3, ...)
                VALUES (value1, value2, value3, ...);';
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        
        $return = array();
        while($row = pg_fetch_assoc($result))
            $return[] = $row;

        return $return;
    }
	


