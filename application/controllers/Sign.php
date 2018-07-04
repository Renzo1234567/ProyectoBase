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
        
        if($this->input->post('email') !== null) {
            $this->load->model('Sigin');
            $resp=$this->Sigin->view();
            if ($resp){

                $this->load->model('usuario_model');
                $this->load->model('cliente_model');
                $this->load->model('empleado_model');

                $where = "usua_correo = '" . $this->input->post('email') . "'";
                $user_data = $this->usuario_model->get_where($where)[0];

                $rol_permisos = $this->usuario_model->get_rol_permisos($user_data['cf_usua_rol']);
                unset($rol_permisos['descripcion']);

                if(isset($user_data['cf_usua_empleado'])) {
                    //Empleados
                    $empleado = $this->empleado_model->get_where_id($user_data['cf_usua_empleado']);
                    $data_id = $empleado['empl_ci'];
                    $user_name = $empleado['empl_nombre1'];
                    $tipo = "empleado";
                } else if(isset($user_data['cf_usua_natural'])) {
                    //En segundo orden los clientes naturales
                    $cliente = $this->cliente_model->get_natural_where_id($user_data['cf_usua_natural']);
                    $nombre1 = $cliente['natu_nombre1'];
                    $nombre2=$cliente['natu_nombre2'];
                    $apellido1=$cliente['natu_apellido1'];
                    $apellido2=$cliente['natu_apellido2'];
                    $cedula=$cliente['natu_cedula'];
                    $tipo = "cliente natural";
                    $data_id = $cliente['natu_rif'];
                    $correo1=$cliente['natu_correo'];
                    $contraseña=$user_data['usua_contraseña'];
                    
                    $_SESSION['natu_nombre1'] = $nombre1;
                    $user_name = $nombre1;
                    $_SESSION['natu_rif']=$data_id;
                    $_SESSION['natu_nombre2']=$nombre2;
                    $_SESSION['natu_apellido1']=$apellido1;
                    $_SESSION['natu_apellido2']=$apellido2;
                    $_SESSION['natu_cedula']=$cedula;
                    $_SESSION['natu_correo']=$correo1;
                    $_SESSION['contraseña']=$contraseña;

                } else if(isset($user_data['cf_usua_juridico'])) {
                    //Por ultimo clientes juridicos
                    $cliente = $this->cliente_model->get_juridico_where_id($user_data['cf_usua_juridico']);
                    $user_name = $cliente['juri_rif'];
                    $tipo = "cliente juridico";
                    $data_id = $cliente['juri_rif'];
                } else {
                    echo "No se enconctraron datos del usuario";
                    return;
                }

                $_SESSION['email'] = $this->input->post('email');
                $_SESSION['usua_token'] = $user_data['usua_token'];
                $_SESSION['rol'] = $rol_permisos;
                $_SESSION['tipo'] = $tipo;
                $_SESSION['data_id'] = $data_id;
                $_SESSION['nombre_usuario']=$user_name;
            
            
            }
            else {
               echo"error";
            }
               
            
        } else {
            
            $this->template_light('sign/signin');
            
            
        }
        
    }
            
        
    
    
    public function up() 
    {
        echo "Sign up";
    }
    
    /**
     * Destroy all session data
     */
    public function out() 
    {
        $this->session->sess_destroy();
        redirect(base_url());
    } 
    
    public function remember() {
        echo "Remember";
    }
     public function perfil(){
        $data=$this->session->userdata();
        $this->template_light('sign/perfil',$data);

      }

      public function perfil_update(){
            
            $data1=$this->session->userdata();
            $this->load->model('usuario_model');
            $resp=$this->usuario_model->perfil_update($data1);
           echo "<script>
           
                alert('cambios realizados');
                </script>";
           $data=$this->session->userdata();
              $this->template_light('sign/perfil',$data);
}
}
