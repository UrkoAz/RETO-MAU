<!DOCTYPE html>
<head></head>
<body>
    <?php
        //incluimos 
        include_once '../persistence/MySQLPDO.class.php';
        include_once '../entity/Corredor.class.php';

            //variables
            $varNombre = $_POST['nombre'];
            $varApellido = $_POST['apellido'];
            $varUsuario = $_POST['usuario'];
            $varContrasena = $_POST['contrasena'];
            $varEquipoId = $_POST['fk_equipo_id'];

        //nuevo objeto corredor
        $objetoCorredor = new Corredor();

        $objetoCorredor->setNombre($varNombre);
        $objetoCorredor->setApellido($varApellido);
        $objetoCorredor->setUsuario($varUsuario);
        $objetoCorredor->setContrasena($varContrasena);
        $objetoCorredor->setEquipo_id($varEquipoId);

        MySQLPDO::connect();
        $result = MySQLPDO::insertCorredor($objetoCorredor);

        if ($result != 0) {
            echo 'Corredor introducido correctamente';
        } else {
            echo 'ERROR: No se ha podido introducir el corredor';
        }
    ?>
</body>
</html>