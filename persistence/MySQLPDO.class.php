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
        $sql = "INSERT INTO corredor (NOMBRE_C, APELLIDO, CONTRASENA, HUELLA, EQUIPO_ID) VALUES (?, ?, ?, ?, ?)";
        $params = array(
            $objetoCorredor->getNombre(),
            $objetoCorredor->getApellido(),
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
    //BUSCAR UN EQUIPO CONECTADO CON EL FORMULARIO DE CORREDOR PARA QUE SALGAN LOS EQUIPOS EN EL DESPLEGABLE.
    public static function buscarEquipos(){
        $sql = "SELECT * FROM equipo";
        $params = array();
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }
    //BUSCAR CORREDOR
    public static function buscarCorredor($buscar){
        $sql = "SELECT * FROM corredor";
        $params = array();
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }
}
?>