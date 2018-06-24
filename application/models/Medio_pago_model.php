<?php

class Medio_pago_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Retorna la lista total de tarjetas de un cliente ordenados descendente
     */
    public function get_list_tarjeta() {
        $sql = 'SELECT * 
                FROM tarjeta_bd, banco_bd 
                WHERE cf_tarj_banco = banc_codigo
                ORDER BY tarj_codigo DESC;';
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        
        $return = array();
        while($row = pg_fetch_assoc($result))
            $return[] = $row;

        return $return;
    }

    /**
     * Restorna toda la lista de bancos ordenados por nombre
     */
    public function get_bancos() {
        $sql = 'SELECT * FROM banco_bd ORDER BY banc_nombre;';
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        
        $return = array();
        while($row = pg_fetch_assoc($result))
            $return[] = $row;

        return $return;
    }

    /**
     * Obtiene el id de la ultima tarjeta insertada
     * @return int id de la ultima tarjeta insertada
     */
    private function get_last_tarjeta() {
        $sql = 'SELECT MAX(tarj_codigo) FROM tarjeta_bd';
        $result = pg_query($this->conn, $sql);

        return (int) pg_fetch_assoc($result)['max'];
    }
    
    /**
     * Obtiene el id de la ultima cehquera insertada
     * @return int id de la ultima tarjeta insertada
     */
    private function get_last_chequera() {
        $sql = 'SELECT MAX(cheq_codigo) FROM cheque_bd';
        $result = pg_query($this->conn, $sql);

        return (int) pg_fetch_assoc($result)['max'];
    }

    /**
     * Inserta una tarjeta
     * @param array $_POST datos enviados por ajax medio_pago.js
     * @return boolean TRUE si tiene un error
     */
    public function insertar_tarjeta() {
        $numero = $this->input->post('numero');
        $tipo = $this->input->post('tipo');
        $banco = $this->input->post('banco');
        
        $sql = "INSERT INTO tarjeta_bd (tarj_numero, tarj_tipo, cf_tarj_banco)
                VALUES ('$numero', '$tipo', $banco);";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }

    /**
     * Inserta 1 en la N a N de medios de pago
     * 
     * Agrega la ultima tarjeta o cheque añadida al usuario con la session actual
     * Nota: Este algoritmo puede presentar fallos de seguridad cuando muchos 
     * usuarios agregan tarjetas al mismo tiempo
     * @param char $tipo "t", "c", "e" Especifica que se insertó, una tarjeta, cheque o efectivo
     * @param array $_SESSION 
     * @return boolean TRUE si tiene un error
     */
    public function insertar_medio_pago($tipo) {

        //Datos
        $persona_id = (int) $_SESSION['data_id'];
        $medio_id = 0;
        $columan_medio = "";
        $columna_perona = "";

        //Tipo de medio de pago
        if($tipo === "t") {
            $columan_medio = "cf_clie_medi_tarjeta";
            $medio_id = (int) $this->get_last_tarjeta();
        } else if($tipo === "c") {
            $columan_medio = "cf_clie_medi_cheque";
            $medio_id = (int) $this->get_last_chequera();
        } else if($tipo === "e") {
            $columan_medio = "efecivo";
            $medio_id = 1;
        } else {
            //Problemas en con el tipo
            return TRUE;
        }

        //Tipo de cliente
        if($_SESSION['tipo'] === "trabajador") {
            //Problema
            //Los empleados no pueden insertar medios de pago
            return TRUE;
        } else if($_SESSION['tipo'] === "cliente natural") {
            $columna_perona = "cf_clie_medi_natural";            
        } else if($_SESSION['tipo'] === "cliente juridico") {
            $columna_perona = "cf_clie_medi_juridico";            
        } else {
            //Problemas en la variable de session
            return TRUE;
        }
        

        $sql = "INSERT INTO mediospago ($columan_medio, $columna_perona)
                VALUES ($medio_id, $persona_id);";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }


}
