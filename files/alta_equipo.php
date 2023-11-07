<!DOCTYPE html>
<head></head>
<body>
    <?php
        //incluimos 
        include_once '../persistence/MySQLPDO.class.php';
        include_once '../entity/Equipo.class.php';

            //variables
            $varId = $_POST['id'];
            $varNombre = $_POST['nombre'];

        //nuevo objeto equipo
        $objetoEquipo = new Equipo();

        $objetoEquipo->setId($varId);
        $objetoEquipo->setNombre($varNombre);

        MySQLPDO::connect();
        $result = MySQLPDO::insertEquipo($objetoEquipo);

        if ($result != 0) {
            echo 'Equipo introducida correctamente';
        } else {
            echo 'ERROR: No se ha podido introducir el Equipo';
        }
    ?>
</body>
</html>