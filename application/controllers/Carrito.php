<?php

/**
 * Controloador de Ejemplo de como crear el maestro detalle
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//Extends of MY_Controller
class Carrito extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('producto_model');
    }
    
    public function agregar() {
        
        if(!isset($_SESSION['carrito'])) {
            $carrito = array(
                    array(
                        'id' => $this->input->post('producto-id'),
                        'cantidad' => $this->input->post('cantidad'),
                        'precio' => $this->input->post('producto-precio'),
                        'nombre' => $this->input->post('producto-nombre')
                    )
                )
            ;
            $_SESSION['carrito'] = $carrito;
        } else {
            $estaba = FALSE;
            foreach($_SESSION['carrito'] as &$cart) {
                if($cart['id'] === $this->input->post('producto-id')) {
                    $cart['cantidad'] = $this->input->post('cantidad');
                    $estaba = true;
                }
            }
            if(!$estaba) {
                $item = array(
                        'id' => $this->input->post('producto-id'),
                        'cantidad' => $this->input->post('cantidad'),
                        'precio' => $this->input->post('producto-precio'),
                        'nombre' => $this->input->post('producto-nombre')
                    );
                $_SESSION['carrito'][] = $item;
            }
        }
    }

    /**
     * Ver detalle del carrtio
     */
    public function index()
    {
        $this->template('carrito/index');
    }

    /**
     * Cargar los medios de pago de un cliente
     */
    public function pagar() {
        if(isset($_SESSION['usua_token']) && isset($_SESSION['carrito'])) {

            $this->load->model('medio_pago_model');
            
            $bancos = $this->medio_pago_model->get_bancos();
            $tarjetas = $this->medio_pago_model->get_mis_tarjetas();
            $cheques = $this->medio_pago_model->get_mis_cheques();
            
            $data = array(
                'bancos' => $bancos,
                'tarjetas' => $tarjetas,
                'cheques' => $cheques
            );

            $this->template('carrito/pagar', $data);
        } else {
            redirect(base_url('#acceso-denegado'));
        }        
    }

    public function hacer_pago($id) {
        $this->load->model('medio_pago_model');
        $this->load->model('tienda_model');
        $this->load->model('compra_model');
        $this->load->model('pago_model');

        $tienda_id = $_SESSION['tienda']['tien_clave'];
        $carrito = $_SESSION['carrito'];

        //Chequear suficiencia en inventario
        $inventario = $this->tienda_model->get_inventario($tienda_id);
        if(!$this->check_inventario($carrito, $inventario)) {
            echo "No hay suficientes productos en el inventraio";
            return;
        }
        $has_error = $this->tienda_model->descontar_inventario($carrito, $tienda_id);
        if($has_error) {
            echo "Actualizacion de inventario fallida";
            return;
        }

        //Cargar pago
        $monto_total = 0;
        foreach($carrito as $producto) {
            $monto_total += $producto['precio'] * 1.12; //Precio mas IVA
        }
        $has_error = $this->compra_model->insert($monto_total);
        if($has_error) {
            echo "Hubo un problema al registrar su compra. ";
            return;
        }

        echo "Success"; die; 

        //Cargar compra


        //Añadir a la tabla de compras
        //Añadir primero a la tabla de pago

        $medio_pago = $this->medio_pago_model->get_medio_pago($id);

        //redirect(base_url() . 'carrito/recibo');
    }
    
    /**
     * Cargar los medios de pago de un cliente
     */
    public function recibo($id) {
        //Obtener datos de una compra
        $this->template('carrito/recibo');
    }

    public function destroy_cart() {
        if(isset($_SESSION['carrito'])) {
            unset($_SESSION['carrito']);
        } 
        redirect(base_url() . 'carrito');
    }

    /**
     * Verifica que todos los pedidos del carrito esten en una tienda con suficiente cantidad
     */
    private function check_inventario($carrtio, $inventario) {
        $existe_suficiente = FALSE;
        foreach($carrtio as $deseado) {
            //Decimos de ante mano que no existe
            $existe_suficiente = FALSE;
            foreach($inventario as $haber) {
                //Si el producto del carrito está en la tienda
                if($deseado['id'] == $haber['cf_inv_producto_tipo']) {
                    //Si la cantidad solicitada es menor que la disponibilidad en la tienda
                    if($deseado['cantidad'] <=  $haber['inve_cantidad']) {
                        //Comprobamos que si exite y pasamos al siguiente producto del carrtito
                        $existe_suficiente = TRUE;
                        break;
                    } else {
                        echo 'Lo sentimos, no hay sofucientes ' . $deseado['nombre'] . ' en esta tienda. ';
                        return FALSE;
                    }
                }
            }
            if(!$existe_suficiente) {
                echo 'Lo sentimos, en esta tienda no quedan mas ' . $deseado['nombre'] . '. ';
                return FALSE;
            }
        }
        //En teoria si llega aqui es porque existen suficientes
        return $existe_suficiente;
    }

    public function debug_session() {
        var_dump($_SESSION);
    }

}
