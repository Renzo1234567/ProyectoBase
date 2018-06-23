<?php

class Usuario_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna la lista total de productos ordenados descendente
     */
    public function get_list() {
        $sql = 'SELECT * FROM usuario_bd ORDER BY prod_id DESC;';
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
     * Retorna una lista de usuarios dada una condicion en SQL
     */
    public function get_where($where) {
        $sql = "SELECT * FROM usuario_bd WHERE $where";
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
     * Obtener los permisos de un rol de usuario
     * @param int $rol clave primaria del rol
     * @return array vector asociativo con los datos del rol
     */
    public function get_rol_permisos($rol) {
        $sql = "SELECT * 
                FROM rol_bd, permiso_bd, permiso_rol
                WHERE rol_codigo = cf_perm_rol_rol 
                    AND cf_perm_rol_permiso = perm_clave 
                    AND rol_codigo = $rol";

        $result = pg_query($this->conn, $sql);

        $return = array();

        if($result) {
            $first = TRUE;
            while($row = pg_fetch_assoc($result)) {
                //Todas las filas tienen los datos del rol (solo tomamos la primera)
                if($first) {
                    $return = array(
                        'codigo' => $row['rol_codigo'],
                        'nombre' => $row['rol_nombre'],
                        'descripcion' => $row['rol_descripcion'],
                        'permisos' => array()
                    );
                    $first = FALSE;
                }
                //Tomamos el resto de los permisos
                $return['permisos'][] = array(
                    'clave' => $row['perm_clave'],
                    'accion' => $row['perm_accion']
                );
            }
        }

        return $return;
    }
    
    /**
     * Retorna 1 producto dada su clave primaria
     */
    public function get_where_id($id) {
        $sql = "SELECT * FROM usuario_bd WHERE usua_token = $id";
        $result = pg_query($this->conn, $sql);

        //Si no hay resultados devuelve un arreglo vacio
        if(!$result)
            return array();
        else
            return pg_fetch_assoc($result);            
    }
    
    /**
     * Inserta un producto
     */
    public function insert() {
        $nombre = $this->input->post('prod_nombre');
        $descripcion = $this->input->post('prod_descripcion');
        $img = $_FILES['imagen']['name'];
        
        $sql = "INSERT INTO usuario_bd (prod_nombre, prod_descripcion, prod_imagen)
                VALUES ('$nombre', '$descripcion', '$img');";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Inserta un producto
     */
    public function update($id) {
        $nombre = $this->input->post('prod_nombre');
        $descripcion = $this->input->post('prod_descripcion');
        
        if($_FILES && count($_FILES) === 1) {
            $img = $_FILES['imagen']['name'];
            $sql = "UPDATE usuario_bd SET 
                prod_nombre = '$nombre', 
                prod_descripcion = '$descripcion', 
                prod_imagen = '$img'
                WHERE prod_id = $id;";
        } else {
            $sql = "UPDATE usuario_bd SET 
                prod_nombre = '$nombre', 
                prod_descripcion = '$descripcion'
                WHERE prod_id = $id;";
        }        
        
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
    /**
     * Inserta un producto
     */
    public function delete($id) {        
        $sql = "DELETE FROM usuario_bd WHERE prod_id = '$id'";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }
    
}
	


