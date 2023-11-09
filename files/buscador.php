<!DOCTYPE html>
<head></head>
<body>
    <form method="POST" action="<?php echo $_SERVER ['PHP_SELF']; ?>">
        Corredor:<input type="text" name="buscarCor"/>
        <input type="submit" value="Buscar" name="btnBuscar"/></br>
    </form>
    <?php
        include_once '../persistence/MySQLPDO.class.php';
        include_once '../entity/Corredor.class.php';
        include_once '../entity/Equipo.class.php';
        
        if (isset($_POST['btnBuscar'])){
            $buscar = $_POST ['buscarCor'];
            //BBDD
            MySQLPDO::connect();
            $corredoresDevueltos = MySQLPDO::buscarCorredor($buscar);
        
            if (sizeof($corredoresDevueltos) !=0 ) {
    ?>
    <table border="1px">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Huella</th>
            <th>Equipo</th>
        </tr>
        <?php
        foreach ($corredoresDevueltos as $fila){
            //crea variables de forma automática, con EL MISMO nombre que las columnas en la BBDD
            extract($fila); 
        ?>
        <tr>
            <td><a href="modificar_corredor.php?id=<?php echo $ID_C; ?>"><?php echo $ID_C; ?></a></td>
            <td><?php echo $NOMBRE_C; ?></td>
            <td><?php echo $APELLIDO; ?></td>
            <td><?php echo $HUELLA; ?></td>
            <td><?php echo $EQUIPO_ID; ?></td>
            <td>
                <form method="POST" action="producto_borrado.php">
                    <input type="hidden" name="id" value="<?php echo $ID; ?>" />
                    <input type="submit" name="btn_borrar" value="Borrar" />
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
        } else {
            echo "<p>ERROR: no se han encontrado corredores (array vac&iacute;o)</p>";
        } 
        }
    ?>

</body>
</html>