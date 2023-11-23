<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>
    <?php
    include_once '../persistence/MySQLPDO.class.php';
    include_once '../entity/Vuelta.class.php';
    ?>
    <table border="1px">
        <tr>
            <th>ID de vuelta</th>
            <th>Tiempo</th>
            <th>Vuelta nº</th>
            <th>Id del corredor</th>
        </tr>
        <tr>
            <td><?php echo $ID_V; ?></td>
            <td><?php echo $TIEMPO; ?></td>
            <td><?php echo $N_VUELTAS; ?></td>
            <td><?php echo $CORREDOR_ID; ?></td>
            <td>
                <form method="POST" action="vuelta_borrada.php">
                    <input type="hidden" name="id" value="<?php echo $ID_C; ?>" />
                    <input type="submit" name="btn_borrar" value="Borrar" />
                </form>
            </td>
        </tr>
    </table>
</body>
</html>