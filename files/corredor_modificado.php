<html>
<head></head>
<body>
    <?php
    include_once '../entity/Corredor.class.php';
    include_once '../persistence/MySQLPDO.class.php';
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido']; 
    $contrasena = $_POST['contrasena'];
    $equipo_id = $_POST['equipo_id'];
    $objetoCorredor  = new Corredor();
    $objetoCorredor->setId($id);
    $objetoCorredor->setNombre($nombre);
    $objetoCorredor->setApellido($apellido);
    $objetoCorredor->setContrasena($contrasena);
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