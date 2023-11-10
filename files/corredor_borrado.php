<!DOCTYPE html>
<head></head>
<body>
    <?php
    include_once '../persistence/MySQLPDO.class.php';
    if (!isset($_POST['id'])) {
        die("ERROR: No ha llegado el id");
    }
        $id = $_POST['id'];
        MySQLPDO::connect();
        $result = MySQLPDO::borrarCorredor($id);
        if ($result != 0) { 
            echo "Corredor borrado correctamente";
        } else {
            echo "ERROR: No se ha podido borrar el corredor";
        }
    ?>
</body>
</html>