<?php

class registrar_model extends CI_Model
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
	  $rif=$this->input->post('Rif');
	  $correo=$this->input->post('CorreoElectronico');
	  $cedula=$this->input->post('Cedula');
	  $primernombre=$this->input->post('PrimerNombre');
	  $segundonombre=$this->input->post('SegundoNombre');
	  $primerapellido=$this->input->post('PrimerApellido');
	  $segundoapellido=$this->input->post('SegundoApellido');
	  $telefonomovil=$this->input->post('TelefonoMovil');
	  $telefonofijo=$this->input->post('TelefonoFijo');
	  $cf_natu_lugar=$this->input->post('lugar');
	  $cf_natu_tienda=1;
	  $contraseña=$this->input->post('Contraseña');
	  $fecha='2018/06/21';
	  $rol=1;
	  $result= pg_query($dbconn3, "INSERT INTO natural_bd(natu_rif,natu_correo,natu_cedula,natu_nombre1,natu_nombre2,natu_apellido1,natu_apellido2,cf_natu_tienda,cf_natu_lugar)VALUES ('$rif', '$correo', '$cedula','$primernombre','$segundonombre','$primerapellido','$segundoapellido','$cf_natu_tienda','$cf_natu_lugar');");

	  $result2=pg_query($dbconn3,"INSERT INTO 
	  	usuario_bd(usua_correo,usua_contraseña,usua_token,usua_fecharegistro,cf_usua_rol,cf_usua_natural ) VALUES ('$correo','$contraseña','$rif','$fecha','$rol','$rif');");
	  $row=pg_fetch_assoc($result);
	  		
                     return true;
                      }

				}
		
    }