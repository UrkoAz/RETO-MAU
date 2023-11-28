<?php
include_once '../persistence/MySQLPDO.class.php';
include_once '../entity/Corredor.class.php';

$varUsuarioVal = $_POST ['usuariologin'];
$varContrasenaVal = $_POST ['contralogin'];

$objetoUsuario = new Corredor();
$objetoUsuario->setUsuario($varUsuarioVal);
$objetoUsuario->setContrasena($varContrasenaVal);

MySQLPDO::connect();
$result = MySQLPDO::validarUsuario($objetoUsuario);

session_start(); // Inicia la sesión
    // Verifica las credenciales (esto puede variar según tu lógica de autenticación)
if ($result!=null){
    foreach ($result as $filas){
        extract ($filas);
    
        if ($varUsuarioVal == $USUARIO_C && $varContrasenaVal == $CONTRASENA) {
            $_SESSION["loggedin"] = true;
            $_SESSION["usuariologin"] = $result['USUARIO_C'];
            header("location: cronometro.php");
            exit();
        
        } 
    }
} else {
    echo 'No tienes cuenta, hazte una si quieres';

}
if ($varUsuarioVal === 'admin' && $varContrasenaVal === 'passmau'){
    header("location: menuadmin.php");
}
?>