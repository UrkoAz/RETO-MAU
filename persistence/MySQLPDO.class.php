<?php
class MySQLPDO {
    private static $host = "localhost"; //o la IP del servidor de BBBDD remoto
    private static $database = "WEBRETO";
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
        $sql = "INSERT INTO CORREDOR (NOMBRE_C, APELLIDO, USUARIO_C, CONTRASENA, EQUIPO_ID) VALUES (?, ?, ?, ?, ?)";
        $params = array(
            $objetoCorredor->getNombre(),
            $objetoCorredor->getApellido(),
            $objetoCorredor->getUsuario(),
            $objetoCorredor->getContrasena(),
            $objetoCorredor->getEquipo_id()
        );
        $result = MySQLPDO::exec($sql, $params);
        return $result;
    }
    //INSERTAR UN EQUIPO
    public static function insertEquipo($objetoEquipo){
        $sql = "INSERT INTO EQUIPO (ID_E, NOMBRE_E) VALUES (?, ?)";
        $params = array(
            $objetoEquipo->getId(),
            $objetoEquipo->getNombre()
        );
        $result = MySQLPDO::exec($sql, $params);
        return $result;
    }

    //INSERTAR UN TIEMPO
    public static function insertVuelta($objetoVuelta){
        $sql = "INSERT INTO VUELTA (TIEMPO, N_VUELTAS, CORREDOR_ID) VALUES (?, ?, ?)";
        $params = array(
            $objetoVuelta->getTiempo(),
            $objetoVuelta->getN_vuelta(),
            $objetoVuelta->getId_corredor()
        );
        $result = MySQLPDO::exec($sql, $params);
        return $result;
    }

    //BUSCAR UN TIEMPO
    public static function buscarVuelta(){
        $sql = "SELECT * FROM VUELTA";
        $params = array();
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }
    

    //BUSCAR UN EQUIPO CONECTADO CON EL FORMULARIO DE CORREDOR PARA QUE SALGAN LOS EQUIPOS EN EL DESPLEGABLE.
    public static function buscarEquipos(){
        $sql = "SELECT * FROM EQUIPO";
        $params = array();
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }
    //BUSCAR CORREDOR
    public static function buscarCorredor($buscar){
        $sql = "SELECT * FROM CORREDOR WHERE NOMBRE_C LIKE ? OR APELLIDO LIKE ? OR USUARIO_C LIKE ?";
        $params = array("%" . $buscar, $buscar, $buscar . "%");
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }

    //OBTENER CORREDOR PARA MODIFICARLO DESPUÉS
    public static function obtenerCorredor($id){
        $sql = "SELECT * FROM CORREDOR WHERE ID_C = ?";
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
            $objetoCorredor->setUsuario($USUARIO_C);
            $objetoCorredor->setApellido($APELLIDO);
            $objetoCorredor->setContrasena($CONTRASENA);
            $objetoCorredor->setEquipo_id($EQUIPO_ID);

            return $objetoCorredor;

        } else {
            //NO EXISTE el id en la tabla corredor
            return null;
        }
    }

    //MODIFICAR CORREDOR
    public static function modificarCorredor($objetoCorredor){
        $sql = "UPDATE CORREDOR SET NOMBRE_C = ?, APELLIDO = ?, USUARIO_C = ?, CONTRASENA = ?, EQUIPO_ID = ? WHERE ID_C = ?";
        $params = array(
            $objetoCorredor->getNombre(),
            $objetoCorredor->getApellido(),
            $objetoCorredor->getUsuario(),
            $objetoCorredor->getContrasena(),
            $objetoCorredor->getEquipo_id(),
            $objetoCorredor->getId()
        );
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }

    //BORRAR CORREDOR
    public static function borrarCorredor($id){
        $sql = "DELETE FROM CORREDOR WHERE ID_C = ?";
        $params = array($id);
        $resultado = MySQLPDO::select($sql, $params);
        return $resultado;
    }

    //VALIDAR USUARIO
    public static function validarUsuario($objetoUsuario){
        $sql = "SELECT * FROM CORREDOR WHERE USUARIO_C = ? AND CONTRASENA = ?";
        $params = array(
            $objetoUsuario->getUsuario(),
            $objetoUsuario->getContrasena()
    );
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }

    //CLASIFICACION POR CORREDOR
    public static function mostrarClasificacion(){
        $sql = "SELECT C.USUARIO_C, SUM(TIME_TO_SEC(V.TIEMPO)) AS 'TIEMPO_TOTAL', E.NOMBRE_E 
                FROM VUELTA V 
                INNER JOIN CORREDOR C ON V.CORREDOR_ID = C.ID_C 
                INNER JOIN EQUIPO E ON E.ID_E = C.EQUIPO_ID
                GROUP BY C.USUARIO_C 
                ORDER BY V.TIEMPO asc";
        $params = array();
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }

    //CLASIFICACION POR EQUIPOS
    public static function mostrarClasificacionEquipo(){
        $sql = "SELECT E.NOMBRE_E, C.USUARIO_C, SUM(TIME_TO_SEC(V.TIEMPO)) AS 'TIEMPO_TOTAL', COUNT(*) AS 'VUELTAS_TOTALES'
                FROM CORREDOR C 
                INNER JOIN EQUIPO E ON E.ID_E = C.EQUIPO_ID
                INNER JOIN VUELTA V ON V.CORREDOR_ID = C.ID_C
                GROUP BY C.EQUIPO_ID 
                ORDER BY TIEMPO_TOTAL ASC, VUELTAS_TOTALES DESC";
        $params = array();
        $result = MySQLPDO::select($sql, $params);
        return $result;
    }

}
?>