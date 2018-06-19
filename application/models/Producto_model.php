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

    public function view(){

        /*
        $email=$this->input->post('email');
        $contraseña=$this->input->post('pass');
        $result= pg_query($dbconn3, "SELECT email,pass  FROM login WHERE email='" . $email . "' AND pass='" . $contraseña . "' ;" );
        $row = pg_fetch_assoc($result);
        if (!$result) {
                echo "Ocurrió un error.\n";
                    
                    }
                    else{
                            if($email=$row['email'] && $contraseña=$row['pass'] ){
                                return true;
                            }
                                else{
                                    return false;
                                }
                            }		
                        
                        }

                    **/
                    }
            
    }
	


