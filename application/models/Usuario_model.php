<?php

class Usuario_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna la lista total de usuarios ordenados descendente
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
                FROM rol_bd 
                    LEFT JOIN permiso_rol ON rol_codigo = cf_perm_rol_rol 
                    LEFT JOIN permiso_bd ON cf_perm_rol_permiso = perm_clave
                WHERE rol_codigo = $rol;";
                    
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
     * Retorna 1 usuario dada su clave primaria
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
    
        
    //CRUD ROLES

    /**
     * Retorna todos los roles ordenados
     * 
     * @param string $where Condicion para retornar algunos roles (si hace falta filtrar por usuario)
     * @return array lista de permisos
     */
    public function get_list_of_roles($where = ' 1 = 1 ') {
        $sql = 'SELECT * 
                FROM rol_bd 
                WHERE ' . $where . ' ' . '
                ORDER BY rol_codigo DESC;';

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
     * Retorna todos los permisos disponibles
     * 
     * @param string $where Condicion para retornar algunos permisos (si hace falta filtrar por usuario)
     * @return array lista de permisos
     */
    public function get_list_of_permisos($where = ' 1 = 1 ') {
        $sql = 'SELECT * 
                FROM permiso_bd 
                WHERE ' . $where . ' ' . '
                ORDER BY perm_clave DESC;';

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
     * Obtiene el id del ultimo rol insertado
     * @return int
     */
    private function get_last_rol() {
        $sql = 'SELECT MAX(rol_codigo) FROM rol_bd';
        $result = pg_query($this->conn, $sql);

        return (int) pg_fetch_assoc($result)['max'];
    }

    /**
     * Inserta un rol
     * @param $_POST['nombre']
     * @param $_POST['descripcion']
     */
    public function insertar_rol() {
        $nombre = $this->input->post('rol_nombre');
        $descripcion = $this->input->post('rol_descripcion');
        
        $sql = "INSERT INTO rol_bd (rol_nombre, rol_descripcion)
                VALUES ('$nombre', '$descripcion');";
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }

    /**
     * Vincula el ultimo rol con los permisos pasados por POST
     */
    public function vincular_rol_permisos($rol_id = null) {
        
        $permisos = $this->input->post('permisos');
        if(count($permisos) === 0) {
            //Retorna TRUE => have_error . SI no hay permisos
            return TRUE;
        }

        if($rol_id === null)
            $cf_rol = $this->get_last_rol();
        else 
            $cf_rol = $rol_id;

        $sql = '';
        foreach($permisos as $cf_permiso) {
            $sql .= "INSERT INTO permiso_rol (cf_perm_rol_permiso, 	cf_perm_rol_rol)
                    VALUES ($cf_permiso, $cf_rol);";
        }

        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }

    /**
     * Actualiza los datos basicos del rol
     */
    public function update_rol($id) {
        $nombre = $this->input->post('rol_nombre');
        $descripcion = $this->input->post('rol_descripcion');
        
        $sql = "UPDATE rol_bd 
                SET rol_nombre = '$nombre', 
                    rol_descripcion = '$descripcion'
                WHERE rol_codigo = $id;";      
        
        $return = pg_query($this->conn, $sql);
        
        //Return false if have error
        return !$return;
    }

    /**
     * Desvincula todos los permisos de un rol
     */
    public function desvincular_rol_permisos($rol_id = null) {
        if($rol_id === null)
            $cf_rol = $this->input->post('codigo');
        else 
            $cf_rol = $rol_id;

        $sql = "DELETE FROM permiso_rol WHERE cf_perm_rol_rol = $cf_rol;";

        $return = pg_query($this->conn, $sql);

        //Return false if have error
        return !$return;
    }
    
    /**
     * Elimina un rol basico
     */
    public function delete_rol($rol_id = null) {
        if($rol_id === null)
            $cf_rol = $this->input->post('codigo');
        else 
            $cf_rol = $rol_id;

        $sql = "DELETE FROM rol_bd WHERE rol_codigo = $cf_rol;";

        $return = pg_query($this->conn, $sql);

        //Return false if have error
        return !$return;
    }

    //END CRUD ROLES


}
	


