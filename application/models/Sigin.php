<?php

class Sigin extends CI_Model
{

public function __construct()
    {
        parent::__construct();
       
       
    }

public function view(){
	$dbconn3 = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=zncvgjn3m");
	if (!$dbconn3) {
  		echo "An error occurred.\n";
  		exit;
		}
		else{

	  $email=$this->input->post('email');
	  $contraseña=$this->input->post('pass');
	  $result= pg_query($dbconn3, "SELECT email,pass  FROM login WHERE email='" . $email . "' AND pass='" . $contraseña . "' ;" );
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
	


