<?php

class Medio_pago_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna un medio de pago simple
     */
    public function get_medio_pago($id) {
        $sql = "SELECT * FROM mediospago WHERE medi_clave = $id";

        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        else
            return pg_fetch_assoc($result);  
    }
    
    /**
     * Retorna la lista total de tarjetas de un cliente
     */
    public function get_mis_tarjetas() {

        $persona_id = (int) $_SESSION['data_id'];

        //Tipo de cliente
        if($_SESSION['tipo'] === "trabajador") {
            //Problema. Los empleados no pueden insertar medios de pago
            return TRUE;
        } else if($_SESSION['tipo'] === "cliente natural") {
            $columna_persona = "cf_clie_medi_natural";            
        } else if($_SESSION['tipo'] === "cliente juridico") {
            $columna_persona = "cf_clie_medi_juridico";            
        } else {
            //Problemas en la variable de session
            return TRUE;
        }
        
        $sql = "SELECT medi_clave, tarj_codigo, tarj_numero, tarj_tipo, banc_nombre
                FROM mediospago, tarjeta_bd, banco_bd
                WHERE tarj_codigo = cf_clie_medi_tarjeta 
                    AND cf_tarj_banco = banc_codigo
                    AND $columna_persona = $persona_id;";
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
     * Retorna la lista total de cheques de un cliente
     */
    public function get_mis_cheques() {

        $persona_id = (int) $_SESSION['data_id'];

        //Tipo de cliente
        if($_SESSION['tipo'] === "trabajador") {
            //Problema. Los empleados no pueden insertar medios de pago
            return TRUE;
        } else if($_SESSION['tipo'] === "cliente natural") {
            $columna_persona = "cf_clie_medi_natural";            
        } else if($_SESSION['tipo'] === "cliente juridico") {
            $columna_persona = "cf_clie_medi_juridico";            
        } else {
            //Problemas en la variable de session
            return TRUE;
        }
        
        $sql = "SELECT medi_clave, cheq_codigo, cheq_numero, banc_nombre
                FROM mediospago, cheque_bd, banco_bd
                WHERE cheq_codigo = cf_clie_medi_cheque 
                    AND cf_cheq_banco = banc_codigo
                    AND $columna_persona = $persona_id;";
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
     * Inserta una chequera
     * LIKE $this->insertar_tarjeta
     */
    public function insertar_chequera() {
        $numero = $this->input->post('numero');
        $banco = $this->input->post('banco');
        
        $sql = "INSERT INTO cheque_bd (cheq_numero, cf_cheq_banco)
                VALUES ('$numero', $banco);";
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
        $columna_persona = "";

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
            $columna_persona = "cf_clie_medi_natural";            
        } else if($_SESSION['tipo'] === "cliente juridico") {
            $columna_persona = "cf_clie_medi_juridico";            
        } else {
            //Problemas en la variable de session
            return TRUE;
        }
        

        $sql = "INSERT INTO mediospago ($columan_medio, $columna_persona)
                VALUES ($medio_id, $persona_id);";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }

    /**
     * Elimina la vinculacion del cliente con el medio de pago
     */
    public function delete_medio_pago($id) {
        $sql = "DELETE FROM mediospago WHERE medi_clave = $id";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }

    /**
     * Elimina una tarjeta
     */
    public function delete_tarjeta($id) {
        $sql = "DELETE FROM tarjeta_bd WHERE tarj_codigo = $id";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }


}
