

<!DOCTYPE html>
<head></head>
<body>
    <?php
        //incluimos 
        include_once '../persistence/MySQLPDO.class.php';
        include_once '../entity/Vuelta.class.php';
        include_once '../JS/script.js';

            //variables
            $varIdV= $_POST['id_v'];
            $varTiempo = $_POST['valorCronometro'];
            $varNVuelta = $_POST[''];



        //nuevo objeto corredor
        $objetoVuelta = new Vuelta();

        $objetoVuelta->setid_v($varIdV);
        $objetoVuelta->setTiempo($varTiempo);
        $objetoVuelta->setN_vuelta($varNVuelta);
        $objetoVuelta->setId_corredor();



        MySQLPDO::connect();
        $result = MySQLPDO::insertVuelta($objetoVuelta);

        if ($result != 0) {
            echo 'Vuelta introducida correctamente';
        } else {
            echo 'ERROR: No se ha podido introducir la vuelta';
        }
    ?>
</body>
</html>