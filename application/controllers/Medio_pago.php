<?php
/**
 * Controloador de Ejemplo de como crear el maestro detalle
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Medio_pago extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cliente_model');
        $this->load->model('medio_pago_model');
    }
    
    public function index() {
        $bancos = $this->medio_pago_model->get_bancos();
        $tarjetas = $this->medio_pago_model->get_mis_tarjetas();
        $cheques = $this->medio_pago_model->get_mis_cheques();
        
        $data = array(
            'bancos' => $bancos,
            'tarjetas' => $tarjetas,
            'cheques' => $cheques
        );

        $this->template_light('medio_pago/administrar', $data);
    }

    public function anadir_tarjeta() {
        $has_error = false;

        //Añado la tarjeta
        $has_error = $this->medio_pago_model->insertar_tarjeta();
        if($has_error) {
            echo "Lo sentimos ha ocurrido un error insertando la tarjeta :(";
            return;
        }

        //Añado en la relacion n a n
        $has_error = $this->medio_pago_model->insertar_medio_pago('t');
        if($has_error) {
            echo "Lo sentimos ha ocurrido un error vinculando su tarjeta :(";
            return;
        }

        //redirect to index function
        redirect('medio_pago');
    }

    public function anadir_chequera() {
        $has_error = false;

        //Añado la chequera
        $has_error = $this->medio_pago_model->insertar_chequera();
        if($has_error) {
            echo "Lo sentimos ha ocurrido un error insertando la chequera :(";
            return;
        }

        //Añado en la relacion n a n
        $has_error = $this->medio_pago_model->insertar_medio_pago('c');
        if($has_error) {
            echo "Lo sentimos ha ocurrido un error vinculando su chequera :(";
            return;
        }

        //redirect to index function
        redirect('medio_pago');
    }

    /**
     * Elimina por GET un medio de pago
     * 
     * Nota: Solo desvinculamos porque (no es el caso) podríamos tener mas de una tarjeta
     * vinculada a distintos clientes, no nos interesa borrar las tarjetas o cheques.
     * Esto generaría errores con la clave foranea
     * @param int $medio_clave Medio de pago
     */
    public function desvincular($medio_clave) {        
        $has_error = false;
        
        $has_error = $this->medio_pago_model->delete_medio_pago($medio_clave);
        if($has_error) {
            echo "Lo sentimos ha ocurrido un error desvinculando su medio de pago :(";
            return;
        }

        //redirect to index function
        redirect('medio_pago');
    }

    

}
