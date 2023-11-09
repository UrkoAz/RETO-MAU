<html>
<head></head>
<body>
    <?php
    include_once '../entity/Corredor.class.php';
    include_once '../persistence/MySQLPDO.class.php';
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido']; 
    $contrasena = $_POST['contrasena'];
    $huella = $_POST['huella']; 
    $equipo_id = $_POST['equipo_id'];
    $objetoCorredor  = new Corredor();
    $objetoCorredor->setNombre($nombre);
    $objetoCorredor->setApellido($apellido);
    $objetoCorredor->setContrasena($contrasena);
    $objetoCorredor->setHuella($huella);
    $objetoCorredor->setEquipo_id($equipo_id);
    
    MySQLPDO::connect();
    $result = MySQLPDO::modificarCorredor($objetoCorredor);
    if ($result != 0){
        echo "Corredor modificado correctamente";
    } else{
        echo "ERROR: No se ha podido modificar el corredor";
    }
    ?>
</body>
</html>