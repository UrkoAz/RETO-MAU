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

}
?>