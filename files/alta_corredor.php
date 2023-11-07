<!DOCTYPE html>
<head></head>
<body>
    <?php
        include_once '../persistence/MySQLPDO.class.php';
        include_once '../entity/Corredor.class.php';

        $varNombre = $_POST['nombre'];
        $varApellido = $_POST['apellido'];
        $varContrasena = $_POST['contrasena'];
        $varHuella = $_POST['huella'];
    ?>
</body>
</html>