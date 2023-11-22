<?php
class MySQLPDO {
    private static $host = "localhost"; //o la IP del servidor de BBBDD remoto
    private static $database = "webreto";
    private static $username = "user_mau";
    private static $password = "pass_mau";
    private static $base;

    public static function connect() {
        if (MySQLPDO::$base != null) {
            MySQLPDO::$base = null;
        }
        try {
            $dsn = "mysql:host=" . MySQLPDO::$host . ";dbname=" . MySQLPDO::$database;
            MySQLPDO::$base = new PDO($dsn, MySQLPDO::$username, MySQLPDO::$password);
            MySQLPDO::$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return MySQLPDO::$base;
        } catch (Exception $e) {
            die ("Error connecting: {$e->getMessage()}");
        }
    }
    
    //ejecuta sentencias INSERT, UPDATE y DELETE
    public static function exec($sql, $params) {
        $stmt = MySQLPDO::$base->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->rowCount();
        return $result; //devuelve el n� de filas afectadas por la sentencia
    }
    
    //ejecuta sentencias SELECT
    public static function select($sql, $params) {
        $stmt = MySQLPDO::$base->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll();
        return $result; //devuelve el conjunto de datos de la consulta
    }
    //INSERTAR UN CORREDOR
    public static function insertCorredor($objetoCorredor){
        $sql = "INSERT INTO corredor (NOMBRE_C, APELLIDO, USUARIO_C, CONTRASENA, HUELLA, EQUIPO_ID) VALUES (?, ?, ?, ?, ?, ?)";
        $params = array(
            $objetoCorredor->getNombre(),
            $objetoCorredor->getApellido(),
            $objetoCorredor->getUsuario(),
            $objetoCorredor->getContrasena(),
            $objetoCorredor->getHuella(),
            $objetoCorredor->getEquipo_id()
        );
        $result = MySQLPDO::exec($sql, $params);
        return $result;
    }
    //INSERTAR UN EQUIPO
    public static function insertEquipo($objetoEquipo){
        $sql = "INSERT INTO equipo (ID_E, NOMBRE_E) VALUES (?, ?)";
        $params = array(
            $objetoEquipo->getId(),
            $objetoEquipo->getNombre()
        );
        $result = MySQLPDO::exec($sql, $params);
        return $result;
    }

    //INSERTAR UN TIEMPO
    public static function insertVuelta($objetoVuelta){
        $sql = "INSERT INTO equipo (ID_V, TIEMPO, N_VUELTAS, CORREDOR_ID) VALUES (?, ?, ?)";
        $params = array(
            $objetoVuelta->getid_v(),
            $objetoVuelta->getTiempo(),
            $objetoVuelta->getN_vuelta(),
            $objetoVuelta->getId_corredor()
        );
        $result = MySQLPDO::exec($sql, $params);
        return $result;
    }

    //BUSCAR UN TIEMPO
    public static function buscarVuelta(){
        $sql = "SELECT * FROM vuelta";
        $params = array();
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }
    

    //BUSCAR UN EQUIPO CONECTADO CON EL FORMULARIO DE CORREDOR PARA QUE SALGAN LOS EQUIPOS EN EL DESPLEGABLE.
    public static function buscarEquipos(){
        $sql = "SELECT * FROM equipo";
        $params = array();
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }
    //BUSCAR CORREDOR
    public static function buscarCorredor($buscar){
        $sql = "SELECT * FROM corredor WHERE NOMBRE_C LIKE ? OR APELLIDO LIKE ? OR USUARIO_C LIKE ?";
        $params = array("%" . $buscar, $buscar, $buscar . "%");
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }

    //OBTENER CORREDOR PARA MODIFICARLO DESPUÉS
    public static function obtenerCorredor($id){
        $sql = "SELECT * FROM corredor WHERE ID_C = ?";
        $params = array($id);
        $result = MySQLPDO::select($sql, $params);
        if(sizeof($result) != 0){
            //existe el id en la tabla corredor
            //extrae la primera fila devuelta por el SELECT
            //crea variables con los nombres de las COLUMNAS DE BBDD
            extract($result[0]); 

            $objetoCorredor = new Corredor();

            $objetoCorredor->setId($ID_C);
            $objetoCorredor->setNombre($NOMBRE_C);
            $objetoCorredor->getUsuario($USUARIO_C);
            $objetoCorredor->setApellido($APELLIDO);
            $objetoCorredor->setContrasena($CONTRASENA);
            $objetoCorredor->setHuella($HUELLA);
            $objetoCorredor->setEquipo_id($EQUIPO_ID);

            return $objetoCorredor;

        } else {
            //NO EXISTE el id en la tabla corredor
            return null;
        }
    }

    //MODIFICAR CORREDOR
    public static function modificarCorredor($objetoCorredor){
        $sql = "UPDATE corredor SET NOMBRE_C = ?, APELLIDO = ?, USUARIO_C = ?, CONTRASENA = ?, HUELLA = ?, EQUIPO_ID = ? WHERE ID_C = ?";
        $params = array(
            $objetoCorredor->getNombre(),
            $objetoCorredor->getApellido(),
            $objetoCorredor->getUsuario(),
            $objetoCorredor->getContrasena(),
            $objetoCorredor->getHuella(),
            $objetoCorredor->getEquipo_id(),
            $objetoCorredor->getId()
        );
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }

    //BORRAR CORREDOR
    public static function borrarCorredor($id){
        $sql = "DELETE FROM corredor WHERE ID_C = ?";
        $params = array($id);
        $resultado = MySQLPDO::select($sql, $params);
        return $resultado;
    }

    /*//LOGIN
    public static function login($user, $contra){
        $sql = "SELECT * FROM corredor WHERE USUARIO_C = ? AND CONTRASENA = ?";
        $params = array($user, $contra);
        $result = MySQLPDO::select($sql, $params);
        if (sizeof($result) != 0) {
            return self::generarCorredor($result[0]); 
        } else {
            return null;
        }
    }*/
}
?>