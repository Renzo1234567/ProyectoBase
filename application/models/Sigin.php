<?php

class Sigin extends CI_Model
{

public function __construct()
    {
        parent::__construct();
       
       
    }

public function view(){
	$dbconn3 = pg_connect("host=localhost port=5432 dbname=candy_ucab user=postgres password=1234");
	if (!$dbconn3) {
  		echo "An error occurred.\n";
  		exit;
		}
		else{

	  $email=$this->input->post('email');
	  $contraseña=$this->input->post('pass');
	  $result= pg_query($dbconn3, "SELECT usua_nombre, usua_contrasena  FROM usuario_bd WHERE usua_nombre='" . $email . "' AND usua_contrasena='" . $contraseña . "' ;" );
	  $row=pg_fetch_assoc($result);
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

				}
		
    }
	


