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
            $varContrasena = $_POST['contrasena'];
            $varHuella = $_POST['huella'];

        //nuevo objeto corredor
        $objetoCorredor = new Corredor();

        $objetoCorredor->setNombre($varNombre);
        $objetoCorredor->setApellido($varApellido);
        $objetoCorredor->setHuella($varHuella);
        $objetoCorredor->setContrasena($varContrasena);

        MySQLPDO::connect();
        $result = MySQLPDO::insertCorredor($objetoCorredor);

        if ($result != 0) {
            echo 'Corredor introducida correctamente';
        } else {
            echo 'ERROR: No se ha podido introducir el corredor';
        }
    ?>
</body>
</html>